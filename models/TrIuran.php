<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_iuran".
 *
 * @property integer $id
 * @property integer $id_anggota
 * @property integer $id_pemasukan
 * @property integer $id_iuran
 * @property string $jumlah_bayar
 * @property string $tanggal_bayar
 * @property string $tanggal_konfirmasi_pembayaran
 * @property string $tanggal_approval_pembayaran
 * @property integer $approval_by
 * @property integer $id_bank_pengirim
 * @property integer $id_bank_penerima
 * @property integer $status_pembayaran
 * @property string $url_bukti_pembayaran
 * @property string $history_pembayaran
 * @property string $created_at
 * @property string $updated_at
 */
class TrIuran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $nama_iuran;
    public static function tableName()
    {
        return 'tr_iuran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_anggota', 'id_pemasukan', 'id_iuran', 'jumlah_bayar', 'approval_by', 'id_bank_pengirim', 'id_bank_penerima', 'status_pembayaran'], 'integer'],
            [['tanggal_bayar', 'tanggal_konfirmasi_pembayaran', 'tanggal_approval_pembayaran', 'created_at', 'updated_at'], 'safe'],
            [['url_bukti_pembayaran', 'history_pembayaran'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_anggota' => 'Nama Anggota',
            'id_pemasukan' => 'Pemasukan',
            'id_iuran' => 'Nama Iuran',
            'jumlah_bayar' => 'Jumlah Bayar',
            'tanggal_bayar' => 'Tanggal Pembayaran',
            'tanggal_konfirmasi_pembayaran' => 'Tanggal Konfirmasi Pembayaran',
            'tanggal_approval_pembayaran' => 'Tanggal Approval Pembayaran',
            'approval_by' => 'Approval By',
            'id_bank_pengirim' => 'Bank Pengirim',
            'id_bank_penerima' => 'Bank Penerima',
            'status_pembayaran' => 'Status Pembayaran',
            'url_bukti_pembayaran' => 'Bukti Bayar',
            'history_pembayaran' => 'History Pembayaran',
            'created_at' => 'Created At',   
            'updated_at' => 'Updated At',
            'nama_iuran' => 'nama_iuran'
        ];
    }

    public function getNamaAnggota()
    {
        return $this->hasOne(TrAnggota::className(), ['id' => 'id_anggota']);
    }
    public function getNamaApproved()
    {
        return $this->hasOne(TrAnggota::className(), ['id' => 'approval_by']);
    }

    public function getNamaIuran()
    {
        return $this->hasOne(MsIuran::className(), ['id' => 'id_iuran']);
    }
}
