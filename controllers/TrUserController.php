<?php

namespace app\controllers;

use Yii;
use app\models\TrUser;
use app\models\TrUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TrAnggota;
use app\models\MsRole;
use yii\helpers\ArrayHelper;
use app\models\MsPekerjaan;
use app\models\MsJurusan;
use app\models\MsAngkatan;
use app\models\MsPendidikan;
use yii\web\AssetManager;

/**
 * TrUserController implements the CRUD actions for TrUser model.
 */
class TrUserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }	

    /**
     * Lists all TrUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrUser model.
     * @param integer $id
     * @param string $username
     * @param string $email
     * @return mixed
     */
    public function actionView($id)
    {
    	$model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
           	'modelAnggota' =>  TrAnggota::findOne(['id' => $model->id_anggota]),
           	'modelRole' =>  MsRole::findOne(['id' => $model->id_role]),	
        ]);
    }

    /**
     * Creates a new TrUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrUser();
        $optionAnggota = ArrayHelper::map(TrAnggota::find()->all(), 'id', 'nama');
        $optionRole = ArrayHelper::map(MsRole::find()->all(), 'id', 'nama_role');
        
        //set default password
        $model->password = 'password123';
        if ($model->load(Yii::$app->request->post())) {

        	$model->password = md5(Yii::$app->request->post('TrUser')['password']);
        	$model->save();
            return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username, 'email' => $model->email]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'optionAnggota' => $optionAnggota,
                'optionRole' => $optionRole,
            ]);
        }
    }

    /**
     * Updates an existing TrUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $username
     * @param string $email
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       	$optionAnggota = ArrayHelper::map(TrAnggota::find()->all(), 'id', 'nama');
        $optionRole = ArrayHelper::map(MsRole::find()->all(), 'id', 'nama_role');

        if ($model->load(Yii::$app->request->post())){
        	 $model->password = md5(Yii::$app->request->post('TrUser')['password']);
        	 $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username, 'email' => $model->email]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'optionAnggota' => $optionAnggota,
                'optionRole' => $optionRole,
            ]);
        }
    }

    public function actionUpdateAdmin($id)
    {
        $model = $this->findModel($id);
       	$optionAnggota = ArrayHelper::map(TrAnggota::find()->all(), 'id', 'nama');
        $optionRole = ArrayHelper::map(MsRole::find()->all(), 'id', 'nama_role');

        if ($model->load(Yii::$app->request->post())){
        	 $model->password = md5(Yii::$app->request->post('TrUser')['password']);
        	 $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'username' => $model->username, 'email' => $model->email]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'optionAnggota' => $optionAnggota,
                'optionRole' => $optionRole,
            ]);
        }
    }

    public function actionUpdatedatadiri()
    {
    	$session = Yii::$app->session;
        $model = $this->findModel($session->get('id_user'));

        if (Yii::$app->request->post()){
        	$model->save();
        	
        	return $this->redirect(['updatedatadiri', 'id' => $model->id, 'username' => $model->username, 'email' => $model->email]);
        } else {
            return $this->render('gantipassword', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionGantipassword()
    {
    	$session = Yii::$app->session;
        $model = $this->findModel($session->get('id_user'));

        if (Yii::$app->request->post()){
        	
        	$model->password = md5(Yii::$app->request->post('TrUser')['password']);
        	$model->updated_at = date('Y-m-d H:i:s');
        	$model->save();
	        return $this->redirect(['gantipassword', 'id' => $model->id, 'username' => $model->username, 'email' => $model->email]);
        } else {
            return $this->render('gantipassword', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id, $username, $email)
    {
        $this->findModel($id, $username, $email)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TrUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $username
     * @param string $email
     * @return TrUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelAnggota($id)
    {
        if (($model = TrAnggota::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLogout()
    {
        $session = Yii::$app->session;
        Yii::$app->user->logout();
        $session->destroy();
        $session->set('login',  'logout');
        return $this->goHome();
    }

    public function actionManajemenuser()
    {
        $searchModel = new TrUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAssign($id,$username,$email)
    {
        $model = $this->findModel($id);
        $optionRole = ArrayHelper::map(MsRole::find()->all(), 'id', 'nama_role');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('assign', [
                'model' => $model,
                'optionRole' => $optionRole,
            ]);
        }
    }

    public function actionLogin()
    {
        $session = Yii::$app->session;
        $session->open();

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new TrUser();
        if ($model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
}
