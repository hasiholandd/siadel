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
 * @property string $judul_pengumuman
 * @property string $keterangan_pengumuman
 * @property string $url_dokumen_pengumuman
 * @property integer $flag
 * @property integer $id_created
 * @property integer $id_approval
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MsPengumuman $idPengumuman
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
            [['id_pengumuman', 'flag', 'id_created', 'id_approval'], 'integer'],
            [['tanggal_mulai', 'tanggal_selesai', 'created_at', 'updated_at'], 'safe'],
            [['judul_pengumuman', 'keterangan_pengumuman', 'url_dokumen_pengumuman'], 'string'],
            [['id_pengumuman'], 'exist', 'skipOnError' => true, 'targetClass' => MsPengumuman::className(), 'targetAttribute' => ['id_pengumuman' => 'id']],
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
            'judul_pengumuman' => 'Judul Pengumuman',
            'keterangan_pengumuman' => 'Keterangan Pengumuman',
            'url_dokumen_pengumuman' => 'Url Dokumen Pengumuman',
            'flag' => 'Flag',
            'id_created' => 'Id Created',
            'id_approval' => 'Id Approval',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPengumuman()
    {
        return $this->hasOne(MsPengumuman::className(), ['id' => 'id_pengumuman']);
    }

    public function getDataPengumuman()
    {
        $now = date('Y-m-d H:i:s');
        $dataPengumuman = TrPengumuman::find()
                            ->where(['flag' => 1])
                            ->andWhere(['id_pengumuman' => [3, 5]])
                            ->andWhere(['<', 'tanggal_mulai', $now])
                            ->andWhere(['>', 'tanggal_selesai', $now])
                            ->all();
        
        return $dataPengumuman;
    }

    public function getDataBerita()
    {
        $now = date('Y-m-d H:i:s');
        $dataPengumuman = TrPengumuman::find()
                            ->where(['flag' => 1])
                            ->andWhere(['id_pengumuman' => [1,2]])
                            ->andWhere(['<', 'tanggal_mulai', $now])
                            ->andWhere(['>', 'tanggal_selesai', $now])
                            ->all();

        return $dataPengumuman;
    }

    public function getDataAgenda()
    {
        $now = date('Y-m-d H:i:s');
        $dataPengumuman = TrPengumuman::find()
                            ->where(['flag' => 1])
                            ->andWhere(['id_pengumuman' => [4]])
                            ->andWhere(['<', 'tanggal_mulai', $now])
                            ->andWhere(['>', 'tanggal_selesai', $now])
                            ->all();

        return $dataPengumuman;
    }
}
