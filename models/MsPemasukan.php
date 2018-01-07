<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_pemasukan".
 *
 * @property integer $id
 * @property string $nama_pemasukan
 * @property string $created_at
 * @property string $updated_at
 */
class MsPemasukan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_pemasukan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['nama_pemasukan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pemasukan' => 'Nama Pemasukan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
