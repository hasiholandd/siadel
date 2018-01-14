<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_anggota".
 *
 * @property integer $id
 * @property string $nim
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $agama
 * @property integer $jurusan
 * @property integer $pendidikan_terakhir
 * @property integer $pekerjaan
 * @property integer $angkatan
 * @property string $no_hp
 * @property string $email
 * @property string $alamat
 * @property string $alamat_domisili
 * @property integer $status_kawin
 * @property integer $status_hidup
 * @property string $url_foto
 * @property string $created_at
 * @property string $updated_at
 */
class TrAnggota extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_lahir', 'created_at', 'updated_at'], 'safe'],
            [['jurusan', 'pendidikan_terakhir', 'pekerjaan', 'angkatan', 'status_kawin', 'status_hidup'], 'integer'],
            [['url_foto'], 'string'],
            [['nim', 'nama', 'tempat_lahir', 'agama', 'no_hp', 'email', 'alamat', 'alamat_domisili'], 'string', 'max' => 255],
            [['file'],'required'],
            [['file'],'file','extensions'=>'csv','maxSize'=>1024 * 1024 * 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nim' => 'Nim',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'agama' => 'Agama',
            'jurusan' => 'Jurusan',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'pekerjaan' => 'Pekerjaan',
            'angkatan' => 'Angkatan',
            'no_hp' => 'No Hp',
            'email' => 'Email',
            'alamat' => 'Alamat',
            'alamat_domisili' => 'Alamat Domisili',
            'status_kawin' => 'Status Kawin',
            'status_hidup' => 'Status Hidup',
            'url_foto' => 'Url Foto',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'file'=>'Select File',
        ];
    }
}
