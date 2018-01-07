<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_bank".
 *
 * @property integer $id
 * @property string $nama_bank
 * @property string $created_at
 * @property string $updated_at
 */
class MsBank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['nama_bank'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_bank' => 'Nama Bank',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
