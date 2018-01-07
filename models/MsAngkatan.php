<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_angkatan".
 *
 * @property integer $id
 * @property string $tahun_angkatan
 * @property string $nama_angkatan
 * @property string $created_at
 * @property string $updated_at
 */
class MsAngkatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_angkatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['tahun_angkatan'], 'string', 'max' => 4],
            [['nama_angkatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun_angkatan' => 'Tahun Angkatan',
            'nama_angkatan' => 'Nama Angkatan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
