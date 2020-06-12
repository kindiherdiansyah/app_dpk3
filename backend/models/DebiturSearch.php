<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Debitur;

/**
 * DebiturSearch represents the model behind the search form about `app\models\Debitur`.
 */
class DebiturSearch extends Debitur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['debitur_id', 'dpd'], 'integer'],
            [['nodeb', 'lao', 'nama', 'alamat', 'angsuran', 'tgk_angsuran', 'bulan', 'outstanding', 'nama_ptgs'], 'safe'],
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
        $query = Debitur::find();

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
            'debitur_id' => $this->debitur_id,
            'dpd' => $this->dpd,
        ]);

        $query->andFilterWhere(['like', 'nodeb', $this->nodeb])
            ->andFilterWhere(['like', 'lao', $this->lao])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'angsuran', $this->angsuran])
            ->andFilterWhere(['like', 'tgk_angsuran', $this->tgk_angsuran])
            ->andFilterWhere(['like', 'bulan', $this->bulan])
            ->andFilterWhere(['like', 'outstanding', $this->outstanding])
            ->andFilterWhere(['like', 'nama_ptgs', $this->nama_ptgs]);

        return $dataProvider;
    }
}
