<?php

namespace app\controllers;

use Yii;
use app\models\TrIuran;
use app\models\TrIuranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\MsBank;
use app\models\MsIuran;
use app\models\TrPemasukan;

use yii\web\UploadedFile;
/**
 * TrIuranController implements the CRUD actions for TrIuran model.
 */
class TrIuranController extends Controller
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
     * Lists all TrIuran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrIuranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrIuran model.
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
     * Creates a new TrIuran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrIuran();
        $optionBank = ArrayHelper::map(MsBank::find()->all(), 'id', 'nama_bank');
        $optionIuran = ArrayHelper::map(MsIuran::find()->all(), 'id','nama_iuran');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->file = UploadedFile::getInstance($model, 'file');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'optionBank' => $optionBank,
                'optionIuran' => $optionIuran,
            ]);
        }
    }

    /**
     * Updates an existing TrIuran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TrIuran model.
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
     * Finds the TrIuran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrIuran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrIuran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionKonfirmasibayar()
    {
        $model = new TrIuran();
        $optionBank = ArrayHelper::map(MsBank::find()->all(), 'id', 'nama_bank');
        $optionIuran = ArrayHelper::map(MsIuran::find()->all(), 'id','nama_iuran');
        if ($model->load(Yii::$app->request->post())) {


            $model->url_bukti_pembayaran = UploadedFile::getInstance($model, 'url_bukti_pembayaran');
            $session = Yii::$app->session;
            $id = $session->get('id_anggota');
            $model->id_anggota=  $id;
            $model->tanggal_konfirmasi_pembayaran=  date("Y-m-d h:i:sa");

            if ( $model->url_bukti_pembayaran )
            {
                $path = Yii::getAlias('@uploadedimagekonfirmasipembayarandir');
                $time = time();
                $model->url_bukti_pembayaran->saveAs($path .$time. '.' . $model->url_bukti_pembayaran->extension);
                $model->url_bukti_pembayaran = $path .$time. '.' . $model->url_bukti_pembayaran->extension;
            }

            $model->save();


            return $this->redirect(['statusbayar', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'optionBank' => $optionBank,
                'optionIuran' => $optionIuran,
            ]);
        }
    }
    public function actionStatusbayar()
    {
        //$session = Yii::$app->session;
        //$model = $this->findModel($session->get('id_anggota'));

       // if (( $model = $this->findModel($session->get('id_anggota') !== null) {
       //      return $model;
       //  } else {
       //      throw new NotFoundHttpException('The requested page does not exist.');
       //  }
        $searchModel = new TrIuranSearch();
        $dataProvider = $searchModel->searchByAnggota(Yii::$app->request->queryParams);

        return $this->render('statusbayar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        $model->status_pembayaran = 1;
        $model->tanggal_approval_pembayaran = date("Y-m-d h:i:sa");

        $session = Yii::$app->session;
        $id = $session->get('id_anggota');
        $model->approval_by=  $id;
    //    $model->save();

     if ($model->save()) {
            $modeltrpemasukan = new TrPemasukan();
            $modeltrpemasukan->id_pemasukan = 1;
            $modeltrpemasukan->id_user = $model->approval_by;
            $modeltrpemasukan->jumlah_pemasukan = $model->jumlah_bayar;
            $modeltrpemasukan->tanggal_pemasukan = $model->tanggal_approval_pembayaran;
            $modeltrpemasukan->url_bukti_pemasukan = $model->url_bukti_pembayaran;
            $modeltrpemasukan->save();
            
            return $this->redirect(['index', 'id' => $model->id]);
     } else {
     return $this->render('index', [
              'model' => $model,
         ]);
        }
    }

    
}
