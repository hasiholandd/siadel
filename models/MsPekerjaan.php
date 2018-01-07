<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_pekerjaan".
 *
 * @property integer $id
 * @property string $nama_pekerjaan
 * @property string $created_at
 * @property string $updated_at
 */
class MsPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_pekerjaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['nama_pekerjaan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pekerjaan' => 'Nama Pekerjaan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
