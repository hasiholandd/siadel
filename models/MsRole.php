<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ms_role".
 *
 * @property integer $id
 * @property string $nama_role
 * @property string $created_at
 * @property string $updated_at
 */
class MsRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['nama_role'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_role' => 'Nama Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
