<?php

namespace app\models;

use Yii;
use app\models\MsRole;
use app\models\TrAnggota;

/**
 * This is the model class for table "tr_user".
 *
 * @property integer $id
 * @property integer $id_anggota
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $link_reset_password
 * @property integer $id_role
 * @property string $last_login
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MsRole $idRole
 * @property TrAnggota $idAnggota
 */
class TrUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $nama;
    public $nama_role;
    public $re_password;
    public $flag_action;

    public static function tableName()
    {
        return 'tr_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['id_anggota', 'id_role','flag'], 'integer'],
           // [['username', 'email','password'], 'required'],
           // [['password', 'link_reset_password'], 'string'],
         //   [['last_login', 'created_at', 'updated_at'], 'safe'],
         //   [['username', 'email'], 'string', 'max' => 255],
           // [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => MsRole::className(), 'targetAttribute' => ['id_role' => 'id']],
            //[['id_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => TrAnggota::className(), 'targetAttribute' => ['id_anggota' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_anggota' => 'Anggota',
            'username' => 'Username',
            'email' => 'Email / Username',
            'password' => 'Password',
            'link_reset_password' => 'Link Reset Password',
            'id_role' => 'Id Role',
            'last_login' => 'Last Login',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'flag' => 'Flag',
            'nama' => 'Nama Anggota',
            'nama_role' => 'Nama Role',
            're_password' => 'Konfirmasi Ulang Password',
            'flag_action' => 'Flag action',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRole()
    {
        return $this->hasOne(MsRole::className(), ['id' => 'id_role']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnggota()
    {
        return $this->hasOne(TrAnggota::className(), ['id' => 'id_anggota']);
    }

    public function login()
    {
        $session = Yii::$app->session;
        $session->open();
        $userExist = TrUser::find()
                    ->where(['username' => Yii::$app->request->post('TrUser')['email']])
                    ->orWhere(['email' => Yii::$app->request->post('TrUser')['email']])
                    ->andWhere(['password' => md5(Yii::$app->request->post('TrUser')['password'])]) 
                    ->one();

        if(empty($userExist)){
            $this->addError('Incorrect username or password.');
        }else{
            $role = MsRole::find()
                        ->where(['id' => $userExist->id_role])
                        ->one();

            $session->set('rolename',  strtolower($role->nama_role));
            $session->set('username',  $userExist->username);
            $session->set('login',  'login');
            $session->set('id_user',  $userExist->id);
            $session->set('id_anggota',  $userExist->id_anggota);
            $userExist->last_login = date('Y-m-d H:i:s');
            $userExist->save();
            return true;
        }
    }

    public function search($params)
    {
        $query = TrUser::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_anggota' => $this->id_anggota,
            'id_role' => $this->id_role,
            'last_login' => $this->last_login,
            'flag' => $this->flag,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'link_reset_password', $this->link_reset_password]);

        return $dataProvider;
    }
}
