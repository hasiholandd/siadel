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
use app\Helper;

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
        $modelIuran = new TrPemasukan();
        $optionBank = ArrayHelper::map(MsBank::find()->all(), 'id', 'nama_bank');
        $optionIuran = ArrayHelper::map(MsIuran::find()->all(), 'id','nama_iuran');

        $modelPemasukan = ArrayHelper::map(MsPemasukan::find()->all(), 'id', 'nama_pemasukan');
        if(Yii::$app->request->post('search') == 1){
            $dataPemasukan = \app\models\TrPemasukan::find()
                ->where(['between', 'tanggal_pemasukan', Yii::$app->request->post('tanggal_awal')." 00:00:00", Yii::$app->request->post('tanggal_akhir')." 23:59:00" ])
                ->andWhere(['id_pemasukan' => Yii::$app->request->post('id_pemasukan') ])
                ->all();

            $msPemasukan = \app\models\MsPemasukan::find()
                ->where(['id' => Yii::$app->request->post('id_pemasukan') ])
                ->one();
            $data = "<h2>Hasil Pencarian : ". $msPemasukan->nama_pemasukan . "</h2>";
            
            $data .= " <table class=\"table table-striped\">
                        <thead>
                          <tr>
                            <th>Jumlah Pemasukan</th>
                            <th>Tanggal Pemasukan</th>
                            <th>Keterangan Pemasukan</th>
                          </tr>
                        </thead>
                        <tbody>";
            foreach ($dataPemasukan as $val) {
                $data .= "<tr>";
                $data .= "<td   style=\"text-align:center\">". number_format($val->jumlah_pemasukan , 0, ".", ",")."</td>";
                $data .= "<td>". $val->tanggal_pemasukan ."</td>";
                $data .= "<td>". $val->tanggal_pemasukan ."</td>";
                $data .= "</tr>";
            }
            $data .= "</tbody></table>";
            $data .= "<h3><b>Jumlah data pencarian : ". count($dataPemasukan)."</b></h3>";
            echo json_encode($data);
        }else{
            return $this->render('report', [
                'modelPemasukan' =>  $modelPemasukan,
                'optionBank' => $optionBank,
                'optionIuran' => $optionIuran,
                'iuran' => $modelIuran ,
            ]);
        }
    }

    public function actionDownload() {
         
        if(Yii::$app->request->post('TrPemasukan')['id'] && Yii::$app->request->post('TrPemasukan')['tanggal_awal'] && Yii::$app->request->post('TrPemasukan')['tanggal_akhir'] ){

            $dataPengeluaran = \app\models\TrPemasukan::find()
                ->where(['between', 'tanggal_pemasukan', Yii::$app->request->post('TrPemasukan')['tanggal_awal']." 00:00:00", Yii::$app->request->post('TrPemasukan')['tanggal_akhir']." 23:59:00" ])
                ->andWhere(['id_pemasukan' => Yii::$app->request->post('TrPemasukan')['id'] ])
                ->all();

            $data = ArrayHelper::toArray($dataPengeluaran, [
                'app\models\TrPemasukan' => [
                    'jumlah_pemasukan',
                    'tanggal_pemasukan',
                    'tanggal_pemasukan',
                ],
            ]);

            $filename = "export_data_pemasukan" . "_" . date("Y-m-d"). ".csv";
            Helper::download_send_headers($filename);

            echo  Helper::array2csv($data);
        } else{
            die;
        }
    }

}
