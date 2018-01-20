<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proposal".
 *
 * @property integer $id
 * @property integer $nama_proposal
 * @property integer $tanggal
 */
class Proposal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proposal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama_proposal'], 'required'],
            [['id', 'nama_proposal'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_proposal' => 'Nama Proposal',
            'tanggal' => 'Tanggal',
        ];
    }
}
