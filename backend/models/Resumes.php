<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resumes".
 *
 * @property integer $resumes_id
 * @property string $lao
 * @property integer $eom
 * @property integer $bulan
 * @property string $eom_percen
 * @property integer $jml_debitur
 * @property integer $tgt_perpetugas
 * @property string $perpetugas_percen
 * @property integer $tgt_pergeseran
 * @property string $pergeseran_percen
 */
class Resumes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resumes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lao', 'eom', 'jml_debitur', 'tgt_perpetugas', 'persen', 'tgt_pergeseran', 'tgl','gap','gap_baru','pergeseran'], 'required'],
            [['jml_debitur'], 'integer'],
            [['tgl'], 'safe'],
            [['lao'], 'string', 'max' => 10],
            [['pergeseran'], 'string', 'max' => 20],
            [['eom', 'tgt_pergeseran', 'tgt_perpetugas', 'gap_baru','gap'], 'string', 'max' => 40],
            [['persen'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'resumes_id' => 'Resumes ID',
            'lao' => 'Lao',
            'eom' => 'Eom',
            'jml_debitur' => 'Jml Debitur',
            'tgt_perpetugas' => 'Tgt Perpetugas',
            'persen' => 'Persen',
            'tgt_pergeseran' => 'Tgt Pergeseran',
            'tgl' => 'Tgl',
            'gap' => 'Gap',
            'gap_baru' => 'Gap Baru',
            'pergeseran' => 'Pergeseran',
        ];
    }
}
