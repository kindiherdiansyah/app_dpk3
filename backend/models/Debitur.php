<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "debitur".
 *
 * @property integer $debitur_id
 * @property string $nodeb
 * @property string $lao
 * @property string $nama
 * @property string $alamat
 * @property string $angsuran
 * @property string $tgk_angsuran
 * @property integer $dpd
 * @property string $bulan
 * @property string $outstanding
 * @property string $nama_ptgs
 */
class Debitur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'debitur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nodeb', 'lao', 'nama', 'alamat', 'angsuran', 'tgk_angsuran', 'dpd', 'bulan', 'outstanding', 'nama_ptgs'], 'required'],
            [['dpd'], 'integer'],
            [['nodeb'], 'string', 'max' => 20],
            [['lao', 'bulan'], 'string', 'max' => 10],
            [['nama', 'angsuran', 'tgk_angsuran', 'outstanding'], 'string', 'max' => 50],
            [['alamat'], 'string', 'max' => 200],
            [['nama_ptgs'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'debitur_id' => 'Debitur ID',
            'nodeb' => 'Nodeb',
            'lao' => 'Lao',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'angsuran' => 'Angsuran',
            'tgk_angsuran' => 'Tgk Angsuran',
            'dpd' => 'Dpd',
            'bulan' => 'Bulan',
            'outstanding' => 'Outstanding',
            'nama_ptgs' => 'Nama Ptgs',
        ];
    }
}
