<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lao".
 *
 * @property string $lao_id
 * @property string $nama_ptgs
 * @property string $NIP
 */
class Lao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lao_id', 'nama_ptgs', 'NIP'], 'required'],
            [['lao_id'], 'string', 'max' => 10],
            [['nama_ptgs'], 'string', 'max' => 40],
            [['NIP'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lao_id' => 'Lao ID',
            'nama_ptgs' => 'Nama Ptgs',
            'NIP' => 'Nip',
        ];
    }
}
