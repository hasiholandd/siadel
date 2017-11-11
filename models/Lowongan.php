<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lowongan".
 *
 * @property integer $id
 * @property string $nama_pekerjaan
 * @property integer $gaji
 * @property string $lokasi_pekerjaan
 * @property string $tanggal_posting
 * @property string $tanggal_selesai_posting
 * @property string $kebutuhan
 * @property string $tanggung_jawab
 * @property integer $tahun_pengalaman
 * @property string $kualifikasi
 * @property string $keuntungan
 * @property string $created_at
 * @property string $updated_at
 */
class Lowongan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lowongan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'gaji', 'tahun_pengalaman'], 'integer'],
            [['tanggal_posting', 'tanggal_selesai_posting', 'created_at', 'updated_at'], 'safe'],
            [['kebutuhan', 'tanggung_jawab'], 'string'],
            [['nama_pekerjaan', 'lokasi_pekerjaan', 'keuntungan'], 'string', 'max' => 255],
            [['kualifikasi'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pekerjaan' => 'Nama Pekerjaan',
            'gaji' => 'Gaji',
            'lokasi_pekerjaan' => 'Lokasi Pekerjaan',
            'tanggal_posting' => 'Tanggal Posting',
            'tanggal_selesai_posting' => 'Tanggal Selesai Posting',
            'kebutuhan' => 'Kebutuhan',
            'tanggung_jawab' => 'Tanggung Jawab',
            'tahun_pengalaman' => 'Tahun Pengalaman',
            'kualifikasi' => 'Kualifikasi',
            'keuntungan' => 'Keuntungan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
