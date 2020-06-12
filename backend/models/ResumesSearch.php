<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resumes;

/**
 * ResumesSearch represents the model behind the search form about `app\models\Resumes`.
 */
class ResumesSearch extends Resumes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resumes_id', 'jml_debitur'], 'integer'],
            [['eom', 'tgt_pergeseran', 'tgt_perpetugas', 'lao', 'persen', 'tgl','gap','gap_baru','pergeseran'], 'safe'],
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
        $query = Resumes::find();

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
        $query->andFilterWhere([
            'resumes_id' => $this->resumes_id,
            'eom' => $this->eom,
            'jml_debitur' => $this->jml_debitur,
            'tgt_perpetugas' => $this->tgt_perpetugas,
            'tgt_pergeseran' => $this->tgt_pergeseran,
        ]);

        $query->andFilterWhere(['like', 'lao', $this->lao])
            ->andFilterWhere(['like', 'persen', $this->persen])
            ->andFilterWhere(['like', 'tgl', $this->tgl])
            ->andFilterWhere(['like', 'gap', $this->gap])
            ->andFilterWhere(['like', 'gap_baru', $this->gap_baru])
            ->andFilterWhere(['like', 'pergeseran', $this->pergeseran]);

        return $dataProvider;
    }
}
