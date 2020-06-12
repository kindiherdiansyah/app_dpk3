<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monitoring".
 *
 * @property integer $monitoring_id
 * @property string $kode_lao
 * @property string $tgl
 * @property string $posisi_awal
 * @property string $persen
 * @property string $target_awal
 * @property string $target_dua
 * @property string $realisasi
 * @property string $selisih
 */
class Monitoring extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monitoring';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_lao', 'lao', 'tgl', 'posisi_awal', 'persen', 'deb', 'target_awal', 'target_dua', 'realisasi', 'selisih','selisih_before'], 'required'],
            [['deb'], 'integer'],
            [['tgl'], 'safe'],
            [['kode_lao', 'lao'], 'string', 'max' => 10],
            [['persen'], 'string', 'max' => 5],
            [['posisi_awal', 'target_awal', 'target_dua', 'realisasi', 'selisih','selisih_before'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'monitoring_id' => 'Monitoring ID',
            'kode_lao' => 'Kode Lao',
            'lao' => 'Lao',
            'tgl' => 'Tgl',
            'posisi_awal' => 'Posisi Awal',
            'persen' => 'Persen',
            'deb' => 'Deb',
            'target_awal' => 'Target Awal',
            'target_dua' => 'Target Dua',
            'realisasi' => 'Realisasi',
            'selisih' => 'Selisih',
            'selisih_before' => 'Selisih Before',
        ];
    }
}
