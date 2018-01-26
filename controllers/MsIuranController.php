<?php

namespace app\controllers;

use Yii;
use app\models\MsIuran;
use app\models\MsIuranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MsBank;
use app\Helper;
/**
 * MsIuranController implements the CRUD actions for MsIuran model.
 */
class MsIuranController extends Controller
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
     * Lists all MsIuran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MsIuranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $counter = '';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'counter' => $counter,
        ]);
    }

    /**
     * Displays a single MsIuran model.
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
     * Creates a new MsIuran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MsIuran();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MsIuran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->updated_at =  date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MsIuran model.
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
     * Finds the MsIuran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MsIuran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MsIuran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBlast($id)
    {
        //get all data anggota
        $anggotas = \app\models\TrAnggota::find()->all();
        $iuran = \app\models\MsIuran::find()->where(['id' => $id])->one();
    
        //sending email
        $arrayTemp = array();
        $arrayTemp['subject'] = "TAGIHAN IURAN - SIADEL";
        $arrayTemp['nama_iuran']  = $iuran->nama_iuran;
        $arrayTemp['jumlah']  = $iuran->jumlah;
        $arrayTemp['tanggal_mulai']  = $iuran->tanggal_mulai;
        $arrayTemp['tanggal_selesai']  = $iuran->tanggal_selesai;
         
        $html_template = 'blast_iuran'; //nama template

        $counter = 0;
        foreach ($anggotas as $anggota) {
            
            $arrayTemp['nama'] = $anggota->nama;
            $arrayTemp['email'] = $anggota->email;

            Helper::sendemail($arrayTemp, $arrayTemp['subject'], $html_template, $arrayTemp['email']);
            $counter++;
        }

        $searchModel = new MsIuranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'counter' => $counter,
        ]);
    }
}
