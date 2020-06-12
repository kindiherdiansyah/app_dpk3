<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property string $lao
 * @property string $persen
 * @property string $eom
 * @property string $tgt_perpetugas
 * @property string $tgt_pergeseran
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lao', 'persen', 'deb', 'eom', 'tgt_perpetugas', 'tgt_pergeseran'], 'required'],
            [['lao'], 'string', 'max' => 10],
            [['persen'], 'string', 'max' => 5],
            [['deb'], 'integer'],
            [['eom', 'tgt_perpetugas', 'tgt_pergeseran'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lao' => 'Lao',
            'persen' => 'Persen',
            'deb' => 'Deb',
            'eom' => 'Eom',
            'tgt_perpetugas' => 'Tgt Perpetugas',
            'tgt_pergeseran' => 'Tgt Pergeseran',
        ];
    }
}
