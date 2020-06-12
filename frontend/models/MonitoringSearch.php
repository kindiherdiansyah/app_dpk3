<?php

namespace frontend\models;

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
            [['monitoring_id'], 'integer'],
            [['kode_lao', 'nama_petugas', 'uraian', 'posisi_awal', 'posisi_target1', 'posisi_target2', 'posisi_target3', 'posisi_target4', 'posisi_target5', 'posisi_target6', 'posisi_target7', 'posisi_target8', 'posisi_target9', 'posisi_target10', 'posisi_target11', 'posisi_target12', 'posisi_target13', 'posisi_target14', 'posisi_target15', 'posisi_target16', 'posisi_target17', 'posisi_target18', 'posisi_target19', 'posisi_target20', 'posisi_target21', 'posisi_target22', 'posisi_target23', 'posisi_target24', 'posisi_target25', 'posisi_target26', 'posisi_target27', 'posisi_target28', 'posisi_target29', 'posisi_target30', 'posisi_target31', 'posisi_akhir'], 'safe'],
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
        ]);

        $query->andFilterWhere(['like', 'kode_lao', $this->kode_lao])
            ->andFilterWhere(['like', 'nama_petugas', $this->nama_petugas])
            ->andFilterWhere(['like', 'uraian', $this->uraian])
            ->andFilterWhere(['like', 'posisi_awal', $this->posisi_awal])
            ->andFilterWhere(['like', 'posisi_target1', $this->posisi_target1])
            ->andFilterWhere(['like', 'posisi_target2', $this->posisi_target2])
            ->andFilterWhere(['like', 'posisi_target3', $this->posisi_target3])
            ->andFilterWhere(['like', 'posisi_target4', $this->posisi_target4])
            ->andFilterWhere(['like', 'posisi_target5', $this->posisi_target5])
            ->andFilterWhere(['like', 'posisi_target6', $this->posisi_target6])
            ->andFilterWhere(['like', 'posisi_target7', $this->posisi_target7])
            ->andFilterWhere(['like', 'posisi_target8', $this->posisi_target8])
            ->andFilterWhere(['like', 'posisi_target9', $this->posisi_target9])
            ->andFilterWhere(['like', 'posisi_target10', $this->posisi_target10])
            ->andFilterWhere(['like', 'posisi_target11', $this->posisi_target11])
            ->andFilterWhere(['like', 'posisi_target12', $this->posisi_target12])
            ->andFilterWhere(['like', 'posisi_target13', $this->posisi_target13])
            ->andFilterWhere(['like', 'posisi_target14', $this->posisi_target14])
            ->andFilterWhere(['like', 'posisi_target15', $this->posisi_target15])
            ->andFilterWhere(['like', 'posisi_target16', $this->posisi_target16])
            ->andFilterWhere(['like', 'posisi_target17', $this->posisi_target17])
            ->andFilterWhere(['like', 'posisi_target18', $this->posisi_target18])
            ->andFilterWhere(['like', 'posisi_target19', $this->posisi_target19])
            ->andFilterWhere(['like', 'posisi_target20', $this->posisi_target20])
            ->andFilterWhere(['like', 'posisi_target21', $this->posisi_target21])
            ->andFilterWhere(['like', 'posisi_target22', $this->posisi_target22])
            ->andFilterWhere(['like', 'posisi_target23', $this->posisi_target23])
            ->andFilterWhere(['like', 'posisi_target24', $this->posisi_target24])
            ->andFilterWhere(['like', 'posisi_target25', $this->posisi_target25])
            ->andFilterWhere(['like', 'posisi_target26', $this->posisi_target26])
            ->andFilterWhere(['like', 'posisi_target27', $this->posisi_target27])
            ->andFilterWhere(['like', 'posisi_target28', $this->posisi_target28])
            ->andFilterWhere(['like', 'posisi_target29', $this->posisi_target29])
            ->andFilterWhere(['like', 'posisi_target30', $this->posisi_target30])
            ->andFilterWhere(['like', 'posisi_target31', $this->posisi_target31])
            ->andFilterWhere(['like', 'posisi_akhir', $this->posisi_akhir]);

        return $dataProvider;
    }
}
