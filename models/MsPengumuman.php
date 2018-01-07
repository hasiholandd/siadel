<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_pengumuman".
 *
 * @property integer $id
 * @property string $nama_pengumuman
 * @property string $created_at
 * @property string $updated_at
 */
class MsPengumuman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_pengumuman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['nama_pengumuman'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pengumuman' => 'Nama Pengumuman',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
