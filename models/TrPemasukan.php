<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_pemasukan".
 *
 * @property integer $id
 * @property integer $id_pemasukan
 * @property integer $id_user
 * @property integer $sumber_pemasukan
 * @property string $tanggal_pemasukan
 * @property string $url_bukti_pemasukan
 * @property string $created_at
 * @property string $updated_at
 */
class TrPemasukan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_pemasukan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pemasukan', 'id_user', 'sumber_pemasukan'], 'integer'],
            [['tanggal_pemasukan', 'created_at', 'updated_at'], 'safe'],
            [['url_bukti_pemasukan'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemasukan' => 'Id Pemasukan',
            'id_user' => 'Id User',
            'sumber_pemasukan' => 'Sumber Pemasukan',
            'tanggal_pemasukan' => 'Tanggal Pemasukan',
            'url_bukti_pemasukan' => 'Url Bukti Pemasukan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
