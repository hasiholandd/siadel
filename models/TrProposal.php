<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_proposal".
 *
 * @property integer $id
 * @property integer $id_proposal
 * @property integer $id_anggota
 * @property integer $approval_by
 * @property string $tujuan_proposal
 * @property string $keterangan
 * @property string $tanggal_pengajuan
 * @property string $tanggal_approval
 * @property integer $status_proposal
 * @property string $url_dokumen_pengeluaran
 * @property string $history_proposal
 * @property string $created_at
 * @property string $updated_at
 */
class TrProposal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_proposal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proposal', 'id_anggota', 'approval_by', 'status_proposal'], 'integer'],
            [['tujuan_proposal', 'keterangan', 'url_dokumen_pengeluaran', 'history_proposal'], 'string'],
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
            'id_proposal' => 'Nama Proposal',
            'id_anggota' => 'Nama Anggota',
            'approval_by' => 'Approval By',
            'tujuan_proposal' => 'Tujuan Proposal',
            'keterangan' => 'Keterangan',
            'tanggal_pengajuan' => 'Tanggal Pengajuan',
            'tanggal_approval' => 'Tanggal Approval',
            'status_proposal' => 'Status Proposal',
            'url_dokumen_pengeluaran' => 'Proposal',
            'history_proposal' => 'History Proposal',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
