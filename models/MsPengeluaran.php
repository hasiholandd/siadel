<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_pengeluaran".
 *
 * @property integer $id
 * @property string $nama_pengeluaran
 * @property string $created_at
 * @property string $updated_at
 */
class MsPengeluaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_pengeluaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['nama_pengeluaran'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pengeluaran' => 'Nama Pengeluaran',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
