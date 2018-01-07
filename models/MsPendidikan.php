<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_pendidikan".
 *
 * @property integer $id
 * @property string $nama_pendidikan
 * @property string $created_at
 * @property string $updated_at
 */
class MsPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['nama_pendidikan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pendidikan' => 'Nama Pendidikan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
