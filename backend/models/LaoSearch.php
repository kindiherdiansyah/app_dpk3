<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lao;

/**
 * LaoSearch represents the model behind the search form about `app\models\Lao`.
 */
class LaoSearch extends Lao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lao_id', 'nama_ptgs', 'NIP'], 'safe'],
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
        $query = Lao::find();

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
        $query->andFilterWhere(['like', 'lao_id', $this->lao_id])
            ->andFilterWhere(['like', 'nama_ptgs', $this->nama_ptgs])
            ->andFilterWhere(['like', 'NIP', $this->NIP]);

        return $dataProvider;
    }
}
