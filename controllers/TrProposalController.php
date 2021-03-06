<?php

namespace app\controllers;

use Yii;
use app\models\TrProposal;
use app\models\TrProposalSearch;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TrProposalController implements the CRUD actions for TrProposal model.
 */
class TrProposalController extends Controller
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
     * Lists all TrProposal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrProposalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrProposal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TrProposal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrProposal();

        if ($model->load(Yii::$app->request->post())) {
            $session = Yii::$app->session;
            $model->id_anggota = $session->get('id_user');

            $model->url_dokumen_pengeluaran = UploadedFile::getInstance($model, 'url_dokumen_pengeluaran');
            $path = Yii::getAlias('@webroot').'/proposal/' ;
            $time = date('Y-m-d')."-".time();
            $model->url_dokumen_pengeluaran->saveAs($path .$time. '.' . $model->url_dokumen_pengeluaran->extension);
            $model->url_dokumen_pengeluaran = $time. '.' . $model->url_dokumen_pengeluaran->extension;

            $model->tanggal_pengajuan = date("Y-m-d H:i:s");
            $model->status_proposal = 0;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TrProposal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $session = Yii::$app->session;
            $model->approval_by = $session->get('id_user');
            $model->tanggal_approval = date("Y-m-d H:i:s");

            if($model->save())
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TrProposal model.
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
     * Finds the TrProposal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrProposal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrProposal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDownloadUploadedFile(){
        $uploaded_file = $_GET['file'];
        $path = Yii::getAlias('@webroot').'/proposal/';
        $file = $path.$uploaded_file;
        if (file_exists($file)) {
            Yii::$app->response->xSendFile($file);
        }
    }

    public function actionLihatProposal()
    {
        $searchModel = new TrProposalSearch();
        $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);
        //$dataProvider = new SqlDataProvider(['sql'=>'SELECT * from tr_proposal WHERE id_anggota='.$session->get('id_anggota')]);

        return $this->render('lihatProposal', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
