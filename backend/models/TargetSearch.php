<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Target;

/**
 * TargetSearch represents the model behind the search form about `app\models\Target`.
 */
class TargetSearch extends Target
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['target_id'], 'integer'],
            [['nama', 'nip', 'eomlalu_deb', 'eomlalu_outs', 'eom_deb', 'eom_outs', 'target_deb', 'target_outs', 'total_deb', 'total_outs', 'selisih_deb', 'selisih_outs', 'persen_deb', 'persen_outs'], 'safe'],
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
        $query = Target::find();

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
            'target_id' => $this->target_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'eomlalu_deb', $this->eomlalu_deb])
            ->andFilterWhere(['like', 'eomlalu_outs', $this->eomlalu_outs])
            ->andFilterWhere(['like', 'eom_deb', $this->eom_deb])
            ->andFilterWhere(['like', 'eom_outs', $this->eom_outs])
            ->andFilterWhere(['like', 'target_deb', $this->target_deb])
            ->andFilterWhere(['like', 'target_outs', $this->target_outs])
            ->andFilterWhere(['like', 'total_deb', $this->total_deb])
            ->andFilterWhere(['like', 'total_outs', $this->total_outs])
            ->andFilterWhere(['like', 'selisih_deb', $this->selisih_deb])
            ->andFilterWhere(['like', 'selisih_outs', $this->selisih_outs])
            ->andFilterWhere(['like', 'persen_deb', $this->persen_deb])
            ->andFilterWhere(['like', 'persen_outs', $this->persen_outs]);

        return $dataProvider;
    }
}
