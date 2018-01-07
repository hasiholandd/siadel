<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_jurusan".
 *
 * @property integer $id
 * @property string $nama_jurusan
 * @property string $created_at
 * @property string $updated_at
 */
class MsJurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_jurusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['nama_jurusan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_jurusan' => 'Nama Jurusan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
