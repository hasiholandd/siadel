<?php

namespace app\controllers;

use Yii;
use app\models\TrLaporanKegiatan;
use app\models\TrLaporanKegiatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TrProposal;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * TrLaporanKegiatanController implements the CRUD actions for TrLaporanKegiatan model.
 */
class TrLaporanKegiatanController extends Controller
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
     * Lists all TrLaporanKegiatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrLaporanKegiatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrLaporanKegiatan model.
     * @param integer $id
     * @return mixed
     */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    /**
     * Creates a new TrLaporanKegiatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrLaporanKegiatan();
        $optionProposal = ArrayHelper::map(TrProposal::find()->where(['status_proposal' => 1])->all(), 'id', 'tujuan_proposal');
        $optionUserApproval = ArrayHelper::map(\app\models\TrUser::find()->where(['id_role' => 1])->all(), 'id', 'username');
        
        if ($model->load(Yii::$app->request->post())) {

            $model->url_dokumen_laporan_kegiatan = UploadedFile::getInstance($model, 'url_dokumen_laporan_kegiatan');
            $filename =  'lapkegiatan' . "_" . date('YmdHis');
            $path = Yii::getAlias('@uploadedlaporankegiatandir') ;
            
            if(!empty($model->url_dokumen_laporan_kegiatan->extension)){
              $model->url_dokumen_laporan_kegiatan->saveAs($path . $filename . '.' . $model->url_dokumen_laporan_kegiatan->extension);
              $model->url_dokumen_laporan_kegiatan = $filename . '.' . $model->url_dokumen_laporan_kegiatan->extension;  
            }
            // else{
            //   $model = $this->findModel($session->get('id_user'));
            //   $model->url_dokumen_laporan_kegiatan = $model->url_dokumen_laporan_kegiatan;
            // }
          $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'optionProposal' => $optionProposal,
                'optionUserApproval' => $optionUserApproval 
            ]);
        }
    }

    /**
     * Updates an existing TrLaporanKegiatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $optionProposal = ArrayHelper::map(TrProposal::find()->where(['status_proposal' => 1])->all(), 'id', 'tujuan_proposal');
        $optionUserApproval = ArrayHelper::map(\app\models\TrUser::find()->where(['id_role' => 1])->all(), 'id', 'username');

        return $this->render('_formUpdate', [
            'model' => $model,
            'optionProposal' => $optionProposal,
            'optionUserApproval' => $optionUserApproval 
        ]);
        
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $optionProposal = ArrayHelper::map(TrProposal::find()->where(['status_proposal' => 1])->all(), 'id', 'tujuan_proposal');
        $optionUserApproval = ArrayHelper::map(\app\models\TrUser::find()->where(['id_role' => 1])->all(), 'id', 'username');
    
        if ($model->load(Yii::$app->request->post())) {
            $model->url_dokumen_laporan_kegiatan = UploadedFile::getInstance($model, 'url_dokumen_laporan_kegiatan');
            $filename =  'lapkegiatan' . "_" . date('YmdHis');
            $path = Yii::getAlias('@uploadedlaporankegiatandir') ;
            
            if(!empty($model->url_dokumen_laporan_kegiatan->extension)){
              $model->url_dokumen_laporan_kegiatan->saveAs($path . $filename . '.' . $model->url_dokumen_laporan_kegiatan->extension);
              $model->url_dokumen_laporan_kegiatan = $filename . '.' . $model->url_dokumen_laporan_kegiatan->extension;  
            }
            else{
              $model = $this->findModel($id);
              $model->url_dokumen_laporan_kegiatan = $model->url_dokumen_laporan_kegiatan;
            }
            $model->updated_at = date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'optionProposal' => $optionProposal,
                'optionUserApproval' => $optionUserApproval 
            ]);
        }
    }

    /**
     * Deletes an existing TrLaporanKegiatan model.
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
     * Finds the TrLaporanKegiatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrLaporanKegiatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrLaporanKegiatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDownloadUploadedFile(){
        $uploaded_file = $_GET['file'];
        $path = Yii::getAlias('@webroot').'/uploads/laporan_kegiatan/';
        $file = $path.$uploaded_file;
        if (file_exists($file)) {
            Yii::$app->response->xSendFile($file);
        }
    }
}
