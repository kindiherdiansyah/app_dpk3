<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resume;

/**
 * ResumeSearch represents the model behind the search form about `app\models\Resume`.
 */
class ResumeSearch extends Resume
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deb'], 'integer'],
            [['lao', 'persen', 'eom', 'tgt_perpetugas', 'tgt_pergeseran'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Resume::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'lao', $this->lao])
            ->andFilterWhere(['like', 'persen', $this->persen])
            ->andFilterWhere(['like', 'deb', $this->deb])
            ->andFilterWhere(['like', 'eom', $this->eom])
            ->andFilterWhere(['like', 'tgt_perpetugas', $this->tgt_perpetugas])
            ->andFilterWhere(['like', 'tgt_pergeseran', $this->tgt_pergeseran]);

        return $dataProvider;
    }
}
