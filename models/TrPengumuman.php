<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_pengumuman".
 *
 * @property integer $id
 * @property integer $id_pengumuman
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $keterangan_pengumuman
 * @property string $url_dokumen_pengumuman
 * @property string $created_at
 * @property string $updated_at
 */
class TrPengumuman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_pengumuman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pengumuman'], 'integer'],
            [['tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at'], 'safe'],
            [['keterangan_pengumuman', 'url_dokumen_pengumuman'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pengumuman' => 'Id Pengumuman',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'keterangan_pengumuman' => 'Keterangan Pengumuman',
            'url_dokumen_pengumuman' => 'Url Dokumen Pengumuman',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
