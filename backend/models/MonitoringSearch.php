<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Monitoring;

/**
 * MonitoringSearch represents the model behind the search form about `app\models\Monitoring`.
 */
class MonitoringSearch extends Monitoring
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monitoring_id', 'deb'], 'integer'],
            [['kode_lao', 'lao', 'tgl', 'posisi_awal', 'persen', 'target_awal', 'target_dua', 'realisasi', 'selisih','selisih_before'], 'safe'],
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
        $query = Monitoring::find();

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
            'monitoring_id' => $this->monitoring_id,
            'deb' => $this->deb,
            'tgl' => $this->tgl,
        ]);

        $query->andFilterWhere(['like', 'kode_lao', $this->kode_lao])
            ->andFilterWhere(['like', 'lao', $this->lao])
            ->andFilterWhere(['like', 'posisi_awal', $this->posisi_awal])
            ->andFilterWhere(['like', 'persen', $this->persen])
            ->andFilterWhere(['like', 'target_awal', $this->target_awal])
            ->andFilterWhere(['like', 'target_dua', $this->target_dua])
            ->andFilterWhere(['like', 'realisasi', $this->realisasi])
            ->andFilterWhere(['like', 'selisih', $this->selisih])
            ->andFilterWhere(['like', 'selisih_before', $this->selisih_before]);


        return $dataProvider;
    }
}
