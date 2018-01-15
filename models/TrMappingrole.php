<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tr_mappingrole".
 *
 * @property integer $id
 * @property string $id_user
 * @property string $id_role
 * @property string $created_at
 * @property string $updated_at
 */
class TrMappingrole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_mappingrole';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['id_user', 'id_role'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_role' => 'Id Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
