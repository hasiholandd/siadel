<?php

namespace app\controllers;

use Yii;
use app\models\TrPemasukan;
use app\models\TrPemasukanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MsBank;
use app\models\MsIuran;
use app\models\MsPemasukan;
use app\models\trIuran;
use yii\helpers\ArrayHelper;
/**
 * TrPemasukanController implements the CRUD actions for TrPemasukan model.
 */
class TrPemasukanController extends Controller
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
     * Lists all TrPemasukan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrPemasukanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrPemasukan model.
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
     * Creates a new TrPemasukan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrPemasukan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TrPemasukan model.
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
     * Deletes an existing TrPemasukan model.
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
     * Finds the TrPemasukan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrPemasukan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrPemasukan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionReport()
    {
      
        $optionBank = ArrayHelper::map(MsBank::find()->all(), 'id', 'nama_bank');
        $optionIuran = ArrayHelper::map(MsIuran::find()->all(), 'id','nama_iuran');

        $modelPemasukan = ArrayHelper::map(MsPemasukan::find()->all(), 'id', 'nama_pemasukan');
    //    print_r($model);die();
        $modelIuran = new MsIuran();
        
            return $this->render('report', [
                'modelPemasukan' =>  $modelPemasukan,
                'optionBank' => $optionBank,
                'optionIuran' => $optionIuran,
                'iuran' => $modelIuran ,
            ]);
        
    }

}
