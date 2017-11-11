<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anggota".
 *
 * @property integer $id
 * @property string $nama
 * @property string $email
 * @property string $tempat
 * @property string $tanggal_lahir
 * @property string $agama
 * @property string $pekerjaan
 * @property string $alamat
 * @property string $angkatan
 * @property string $no_hp
 * @property string $updated_at
 * @property string $created_at
 * @property string $prodi
 * @property string $lulusan
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['tanggal_lahir', 'updated_at', 'created_at'], 'safe'],
            [['nama', 'email', 'agama', 'prodi'], 'string', 'max' => 100],
            [['tempat', 'pekerjaan', 'alamat'], 'string', 'max' => 255],
            [['angkatan'], 'string', 'max' => 4],
            [['no_hp'], 'string', 'max' => 25],
            [['lulusan'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'email' => 'Email',
            'tempat' => 'Tempat',
            'tanggal_lahir' => 'Tanggal Lahir',
            'agama' => 'Agama',
            'pekerjaan' => 'Pekerjaan',
            'alamat' => 'Alamat',
            'angkatan' => 'Angkatan',
            'no_hp' => 'No Hp',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'prodi' => 'Prodi',
            'lulusan' => 'Lulusan',
        ];
    }
}
