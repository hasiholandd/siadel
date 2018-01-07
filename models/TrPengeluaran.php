<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_pengeluaran".
 *
 * @property integer $id
 * @property integer $id_pengeluaran
 * @property string $jumlah_pengeluaran
 * @property string $tanggal_pengeluaran
 * @property string $keterangan_pengeluaran
 * @property string $url_bukti_pengeluaran
 * @property string $created_at
 * @property string $updated_at
 */
class TrPengeluaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_pengeluaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pengeluaran', 'jumlah_pengeluaran'], 'integer'],
            [['tanggal_pengeluaran', 'created_at', 'updated_at'], 'safe'],
            [['keterangan_pengeluaran', 'url_bukti_pengeluaran'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pengeluaran' => 'Id Pengeluaran',
            'jumlah_pengeluaran' => 'Jumlah Pengeluaran',
            'tanggal_pengeluaran' => 'Tanggal Pengeluaran',
            'keterangan_pengeluaran' => 'Keterangan Pengeluaran',
            'url_bukti_pengeluaran' => 'Url Bukti Pengeluaran',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
