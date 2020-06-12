<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "target".
 *
 * @property integer $target_id
 * @property string $nama
 * @property string $nip
 * @property string $eomlalu_deb
 * @property string $eomlalu_outs
 * @property string $eom_deb
 * @property string $eom_outs
 * @property string $target_deb
 * @property string $target_outs
 * @property string $total_deb
 * @property string $total_outs
 * @property string $selisih_deb
 * @property string $selisih_outs
 * @property string $persen_deb
 * @property string $persen_outs
 */
class Target extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'target';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['target_id', 'nama', 'nip', 'eomlalu_deb', 'eomlalu_outs', 'eom_deb', 'eom_outs', 'target_deb', 'target_outs', 'total_deb', 'total_outs', 'selisih_deb', 'selisih_outs', 'persen_deb', 'persen_outs'], 'required'],
            [['target_id'], 'integer'],
            [['nama'], 'string', 'max' => 40],
            [['nip', 'eomlalu_deb', 'eomlalu_outs', 'eom_deb', 'eom_outs', 'target_deb', 'target_outs', 'total_deb', 'total_outs', 'selisih_deb', 'selisih_outs'], 'string', 'max' => 20],
            [['persen_deb', 'persen_outs'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'target_id' => 'Target ID',
            'nama' => 'Nama',
            'nip' => 'Nip',
            'eomlalu_deb' => 'Eomlalu Deb',
            'eomlalu_outs' => 'Eomlalu Outs',
            'eom_deb' => 'Eom Deb',
            'eom_outs' => 'Eom Outs',
            'target_deb' => 'Target Deb',
            'target_outs' => 'Target Outs',
            'total_deb' => 'Total Deb',
            'total_outs' => 'Total Outs',
            'selisih_deb' => 'Selisih Deb',
            'selisih_outs' => 'Selisih Outs',
            'persen_deb' => 'Persen Deb',
            'persen_outs' => 'Persen Outs',
        ];
    }
}
