<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_laporan_kegiatan".
 *
 * @property integer $id
 * @property integer $id_proposal
 * @property integer $approval_by
 * @property string $keterangan_approval
 * @property string $keterangan_kegiatan
 * @property string $tanggal_pengajuan
 * @property string $tanggal_approval
 * @property string $url_dokumen_laporan_kegiatan
 * @property string $history_laporan
 * @property string $created_at
 * @property string $updated_at
 */
class TrLaporanKegiatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_laporan_kegiatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proposal', 'approval_by'], 'integer'],
            [['keterangan_approval', 'keterangan_kegiatan', 'url_dokumen_laporan_kegiatan', 'history_laporan'], 'string'],
            [['tanggal_pengajuan', 'tanggal_approval', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_proposal' => 'Id Proposal',
            'approval_by' => 'Approval By',
            'keterangan_approval' => 'Keterangan Approval',
            'keterangan_kegiatan' => 'Keterangan Kegiatan',
            'tanggal_pengajuan' => 'Tanggal Pengajuan',
            'tanggal_approval' => 'Tanggal Approval',
            'url_dokumen_laporan_kegiatan' => 'Url Dokumen Laporan Kegiatan',
            'history_laporan' => 'History Laporan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
