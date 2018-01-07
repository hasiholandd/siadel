<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_iuran".
 *
 * @property integer $id
 * @property string $nama_iuran
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $jumlah
 * @property string $created_at
 * @property string $updated_at
 */
class MsIuran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_iuran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at'], 'safe'],
            [['jumlah'], 'integer'],
            [['nama_iuran'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_iuran' => 'Nama Iuran',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'jumlah' => 'Jumlah',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
