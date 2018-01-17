<?php

namespace app\controllers;

use Yii;
use app\models\TrPengumuman;
use app\models\TrPengumumanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\MsPengumuman;
use app\models\TrUser;
use yii\web\UploadedFile;
use yii\web\AssetManager;

/**
 * TrPengumumanController implements the CRUD actions for TrPengumuman model.
 */
class TrPengumumanController extends Controller
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
     * Lists all TrPengumuman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrPengumumanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrPengumuman model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelMsPengumuman = MsPengumuman::find()->where(['id' => $model->id_pengumuman])->one();
        $modelMsCreator = TrUser::find()->where(['id' => $model->id_created])->one();
        $modelMsApproval = TrUser::find()->where(['id' => $model->id_approval])->one();

        return $this->render('view', [
            'model' => $model,
            'modelMsPengumuman' => $modelMsPengumuman,
            'modelMsCreator' => $modelMsCreator,
            'modelMsApproval' => $modelMsApproval,
        ]);
    }

    /**
     * Creates a new TrPengumuman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrPengumuman();
        $session = Yii::$app->session;
        $optionPengumuman = ArrayHelper::map(MsPengumuman::find()->all(), 'id', 'nama_pengumuman');

        if ($model->load(Yii::$app->request->post())) {

            $model->url_dokumen_pengumuman = UploadedFile::getInstance($model, 'url_dokumen_pengumuman');

            if($model->url_dokumen_pengumuman){
                $path = Yii::getAlias('@uploadedpengumumanfilesdir') ;
                $time = time();
                $model->url_dokumen_pengumuman->saveAs($path .$time. '.' . $model->url_dokumen_pengumuman->extension);
                $model->url_dokumen_pengumuman = $path .$time. '.' . $model->url_dokumen_pengumuman->extension;
            }
            $model->flag = 0; //belum publish
            $model->id_created = $session->get('id_user'); //belum publish
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'optionPengumuman' => $optionPengumuman,
            ]);
        }
    }

    /**
     * Updates an existing TrPengumuman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;
        $optionPengumuman = ArrayHelper::map(MsPengumuman::find()->all(), 'id', 'nama_pengumuman');

        if ($model->load(Yii::$app->request->post()) ) {
            $model->url_dokumen_pengumuman = UploadedFile::getInstance($model, 'url_dokumen_pengumuman');

            if($model->url_dokumen_pengumuman){
                $path = Yii::getAlias('@uploadedpengumumanfilesdir') ;
                $time = time();
                $model->url_dokumen_pengumuman->saveAs($path .$time. '.' . $model->url_dokumen_pengumuman->extension);
                $model->url_dokumen_pengumuman = $path .$time. '.' . $model->url_dokumen_pengumuman->extension;
            }
            $model->updated_at = date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'optionPengumuman' => $optionPengumuman,
            ]);
        }
    }

    /**
     * Deletes an existing TrPengumuman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TrPengumuman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrPengumuman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrPengumuman::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPengumuman()
    {
        $now = date('Y-m-d H:i:s');
        $dataPengumuman =  TrPengumuman::getDataPengumuman();
        
        return $this->render('pengumuman', [
            'dataPengumuman' => $dataPengumuman
        ]);
    }

    public function actionBerita()
    {
        $now = date('Y-m-d H:i:s');
        $dataPengumuman =  TrPengumuman::getDataBerita();

        return $this->render('berita', [
            'dataPengumuman' => $dataPengumuman
        ]);
    }

    public function actionAgenda()
    {
        $now = date('Y-m-d H:i:s');
        $dataPengumuman =  TrPengumuman::getDataAgenda();

        return $this->render('agenda', [
            'dataPengumuman' => $dataPengumuman
        ]);
    }    

    public function actionDownload(){
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Content-Transfer-Encoding: binary');
            //header('Content-length: 1665');
            header('Content-Type: text/html');
            header('Content-Disposition: attachment; filename=/web/pengumuman/Indo_Newsletter_October.pdf');
                      
            echo stream_get_contents($model->$file_field,-1,0);   
        // $src = "@web/pengumumane/Indo_Newsletter_October.pdf";
        // if(@file_exists($src)) {
        //         $path_parts = @pathinfo($src);
        //         //$mime = $this->__get_mime($path_parts['extension']);
        //         header('Content-Description: File Transfer');
        //         header('Content-Type: application/octet-stream');
        //         header('Content-Disposition: attachment; filename='.basename($src));
        //         header('Content-Transfer-Encoding: binary');
        //         header('Expires: 0');
        //         header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        //         header('Pragma: public');
        //         header('Content-Length: ' . filesize($src));
        //         ob_clean();
        //         flush();
        //         readfile($src);
        // } else {
        //         header("HTTP/1.0 404 Not Found");
        //         exit();
        // }
    }

    public function actionPublish($id)
    {
        $model = $this->findModel($id);
        $id_creator = $model->id_created;
        $session = Yii::$app->session;
        $optionPengumuman = ArrayHelper::map(MsPengumuman::find()->all(), 'id', 'nama_pengumuman');

        if ($model->load(Yii::$app->request->post()) ) {
            $model->id_created = $id_creator;
            $model->id_approval =   $session->get('id_user');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('publish', [
                'model' => $model,
            ]);
        }
    }
}
