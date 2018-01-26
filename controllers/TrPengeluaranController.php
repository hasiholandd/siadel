<?php

namespace app\controllers;

use Yii;
use app\models\TrPengeluaran;
use app\models\TrPengeluaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\Helper;
use app\models\MsPengeluaran;
use yii\web\UploadedFile;

/**
 * TrPengeluaranController implements the CRUD actions for TrPengeluaran model.
 */
class TrPengeluaranController extends Controller
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
     * Lists all TrPengeluaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrPengeluaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrPengeluaran model.
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
     * Creates a new TrPengeluaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrPengeluaran();
        $optionPengeluaran = ArrayHelper::map(MsPengeluaran::find()->all(), 'id','nama_pengeluaran');

        if ($model->load(Yii::$app->request->post())) {
             $model->url_bukti_pengeluaran = UploadedFile::getInstance($model, 'url_bukti_pengeluaran');

            if ( $model->url_bukti_pengeluaran )
            {
                $path = Yii::getAlias('@webroot'.'/uploads/pengeluaran/');
                $time = date('Y-m-d')."-".time();
                $model->url_bukti_pengeluaran->saveAs($path .$time. '.' . $model->url_bukti_pengeluaran->extension);
                $model->url_bukti_pengeluaran = $time. '.' . $model->url_bukti_pengeluaran->extension;
            }

            $model->save();

            return $this->redirect(['index', 'id' => $model->id]);
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'optionPengeluaran' => $optionPengeluaran,
            ]);
        }
    }

    /**
     * Updates an existing TrPengeluaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $optionPengeluaran = ArrayHelper::map(MsPengeluaran::find()->all(), 'id','nama_pengeluaran');

        if ($model->load(Yii::$app->request->post())) {
                $model->url_bukti_pengeluaran = UploadedFile::getInstance($model, 'url_bukti_pengeluaran');


                if ( $model->url_bukti_pengeluaran )
                {
                    $path = Yii::getAlias('@webroot'.'/uploads/pengeluaran/');
                    $time = date('Y-m-d')."-".time();
                    $model->url_bukti_pengeluaran->saveAs($path .$time. '.' . $model->url_bukti_pengeluaran->extension);
                    $model->url_bukti_pengeluaran = $time. '.' . $model->url_bukti_pengeluaran->extension;
                }
                $model->updated_at = date('Y-m-d H:i:s');
                $model->save();

                return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'optionPengeluaran' => $optionPengeluaran,
            ]);
        }
    }

    /**
     * Deletes an existing TrPengeluaran model.
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
     * Finds the TrPengeluaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrPengeluaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrPengeluaran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    
    public function actionReport()
    {
        $model = new TrPengeluaran();
        $optionJenisPengeluaran = ArrayHelper::map(\app\models\MsPengeluaran::find()->all(), 'id', 'nama_pengeluaran');

        //  if (Yii::$app->request->post('id_pengeluaran') != '') {
        //    // $dataPengeluaran = \app\models\TrPengeluaran::find()->all();
           
        //    //  $filename = "export_data_pengeluaran" . "_" . date("Y-m-d"). ".csv";
        //    //  $fp = fopen($filename, 'w');

        //    //  $counter   = 1;
        //    //  $array[0][] = "nomor";
        //    //  $array[0][] = "jumlah_pengeluaran";
        //    //  $array[0][] = "tanggal_pengeluaran";
        //    //  $array[0][] = "keterangan_pengeluaran";
        //    //  foreach ($dataPengeluaran as $data) {
        //    //      $array[$counter][] = $counter;
        //    //      $array[$counter][] = $data->jumlah_pengeluaran;
        //    //      $array[$counter][] = $data->tanggal_pengeluaran;
        //    //      $array[$counter][] = $data->keterangan_pengeluaran;
        //    //      $counter++;   
        //    //  }
        //    //  foreach ($array as $fields) {
        //    //      fputcsv($fp, $fields);
        //    //  }
            
        //    //  fclose($fp);

        //    //  $this->download_send_headers($filename);
        //  }
        if(Yii::$app->request->post('search') == 1){
            $dataPengeluaran = \app\models\TrPengeluaran::find()
                ->where(['between', 'tanggal_pengeluaran', Yii::$app->request->post('tanggal_awal')." 00:00:00", Yii::$app->request->post('tanggal_akhir')." 23:59:00" ])
                ->andWhere(['id_pengeluaran' => Yii::$app->request->post('id_pengeluaran') ])
                ->all();

            $msPengeluaran = \app\models\MsPengeluaran::find()
                ->where(['id' => Yii::$app->request->post('id_pengeluaran') ])
                ->one();
            $data = "<h2>Hasil Pencarian : ". $msPengeluaran->nama_pengeluaran. "</h2>";
            
            $data .= " <table class=\"table table-striped\">
                        <thead>
                          <tr>
                            <th>Jumlah Pengeluaran</th>
                            <th>Tanggal Pengeluaran</th>
                            <th>Keterangan Pengeluaran</th>
                          </tr>
                        </thead>
                        <tbody>";
            foreach ($dataPengeluaran as $val) {
                $data .= "<tr>";
                $data .= "<td   style=\"text-align:center\">". number_format($val->jumlah_pengeluaran , 0, ".", ",")."</td>";
                $data .= "<td>". $val->tanggal_pengeluaran ."</td>";
                $data .= "<td>". $val->keterangan_pengeluaran ."</td>";
                $data .= "</tr>";
            }
            $data .= "</tbody></table>";
            $data .= "<h3><b>Jumlah data pencarian : ". count($dataPengeluaran)."</b></h3>";
            echo json_encode($data);
        }
        else {
            return $this->render('report', [
                'model' => $model,
                'optionJenisPengeluaran' => $optionJenisPengeluaran,
            ]);
        }
    }

    public function actionDownload() {
         
        if(Yii::$app->request->post('TrPengeluaran')['id_pengeluaran'] && Yii::$app->request->post('TrPengeluaran')['tanggal_awal'] && Yii::$app->request->post('TrPengeluaran')['tanggal_akhir'] ){

            $dataPengeluaran = \app\models\TrPengeluaran::find()
                ->where(['between', 'tanggal_pengeluaran', Yii::$app->request->post('TrPengeluaran')['tanggal_awal']." 00:00:00", Yii::$app->request->post('TrPengeluaran')['tanggal_akhir']." 23:59:00" ])
                ->andWhere(['id_pengeluaran' => Yii::$app->request->post('TrPengeluaran')['id_pengeluaran'] ])
                ->all();

            $data = ArrayHelper::toArray($dataPengeluaran, [
                'app\models\TrPengeluaran' => [
                    'jumlah_pengeluaran',
                    'tanggal_pengeluaran',
                    'keterangan_pengeluaran',
                ],
            ]);

            $filename = "export_data_pengeluaran" . "_" . date("Y-m-d"). ".csv";
            Helper::download_send_headers($filename);

            echo  Helper::array2csv($data);
        } else{
            die;
        }
    }

}
