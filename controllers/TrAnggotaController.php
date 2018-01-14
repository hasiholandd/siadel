<?php

namespace app\controllers;

use Yii;
use app\models\TrAnggota;
use app\models\TrAnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * TrAnggotaController implements the CRUD actions for TrAnggota model.
 */
class TrAnggotaController extends Controller
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
     * Lists all TrAnggota models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrAnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrAnggota model.
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
     * Creates a new TrAnggota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrAnggota();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TrAnggota model.
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
     * Deletes an existing TrAnggota model.
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
     * Finds the TrAnggota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TrAnggota the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TrAnggota::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*public function actionCreateBulk()
    {
        $model = new TrAnggota();

        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create-bulk', [
                'model' => $model,
            ]);
        }
    }*/

    /*public function actionCreateBulk(){
        $model = new TrAnggota();

        if($model->load(Yii::$app->request->post())){
            $model->file = UploadedFile::getInstance($model, 'file');
            $uploadExists = 0;
            if($model->file){
                //$model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                //echo $model->file; die;
                //$imagepath = 'uploads/files/';
                //$file_import = $imagepath .rand(10,100).'-'.str_replace('','-',$model->file->name);
                $file_import = $model->file;
                $bulkInsertArray = array();
                //$random_date = Yii::$app->formatter->asDatetime(date("dmyyhis"), "php:dmYHis");
                //$random = $random_date.rand(10,100);
                //$userId = \Yii::$app->user->identity->id;
                $now        = new Expression('NOW()');

                $uploadExists = 1;
            }

            if($uploadExists){
                $model->file->saveAs($file_import);

                $handle = fopen($file_import, 'r');
                if ($handle) {
                    $model->batch     = $random;
                    if($model->save()){
                        #var_dump($model->errors);

                        while( ($line = fgetcsv($handle, 1000, ",")) != FALSE) {
                            $bulkInsertArray[]=[
                                'nim' => $model->year,
                                'nama' => $model->month,
                                'tempat_lahir' => $random,
                                'tanggal_lahir' => $line[0],
                                'agama' => $line[1],
                                'jurusan' => 1,
                                'pendidikan_terakhir' => $userId,
                                'pekerjaan' => $now,
                                'angkatan' => $userId,
                                'no_hp' => $now,
                                'email' => $now,
                                'alamat' => $now,
                                'alamat_domisili' => $now,
                                'status_kawin' => $now,
                                'status_hidup' => $now,
                                'url_foto' => $now,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ];

                        }
                    }
                    fclose($handle);

                    $tableName = 'device';
                    $columnNameArray=['year','month','batch','item_code','price', 'status_id','created_by','created_at','updated_by','updated_at'];
                    Yii::$app->db->createCommand()->batchInsert($tableName, $columnNameArray, $bulkInsertArray)->execute();
                    #print_r($bulkInsertArray);
                }
            }
        }else{
            return $this->render('create-bulk', [
                'model' => $model,
            ]);
        }
    }*/

    public function actionCreateBulk()
    {
        $model = new TrAnggota();

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');

            if ( $model->file )
            {
                $path = Yii::getAlias('@uploadedfilesdir') ;
                //$path = Yii::app()->basePath .'/uploads/csv/';
                $time = time();
                $model->save(false);
                //$model->file->saveAs('uploads/csv/' .$time. '.' . $model->file->extension);
                //$model->file = 'uploads/csv/' .$time. '.' . $model->file->extension;
                $model->file->saveAs($path .$time. '.' . $model->file->extension);
                $model->file = $path .$time. '.' . $model->file->extension;

                $now = new Expression('NOW()');
                $handle = fopen($model->file, "r");

                $count = 0;
                while (($fileop = fgetcsv($handle, 1000, ",")) !== false)
                {
                    $nim = $fileop[0];
                    $nama = $fileop[1];
                    $tempat_lahir = $fileop[2];
                    $tanggal_lahir = $fileop[3];
                    $agama = $fileop[4];
                    $jurusan = $fileop[5];
                    $pendidikan_terakhir = $fileop[6];
                    $pekerjaan = $fileop[7];
                    $angkatan = $fileop[8];
                    $no_hp = $fileop[9];
                    $email = $fileop[10];
                    $alamat = $fileop[11];
                    $alamat_domisili = $fileop[12];
                    $status_kawin = $fileop[13];
                    $status_hidup = $fileop[14];
                    $url_foto = $fileop[15];
                    //$created_at = $now;
                    //$updated_at = $now;

                    //$name = $fileop[0];
                    //$age = $fileop[1];
                    //$location = $fileop[2];
                     // print_r($fileop);exit();
                    $count++;
                    if($count > 1 && $nama != null) {
                        $sql = "INSERT INTO tr_anggota(nim,nama,tempat_lahir,tanggal_lahir,agama,jurusan,pendidikan_terakhir,pekerjaan,angkatan,no_hp
                    ,email,alamat,alamat_domisili,status_kawin,status_hidup,url_foto) VALUES ('$nim', '$nama', '$tempat_lahir',
                    '$tanggal_lahir','$agama','$jurusan','$pendidikan_terakhir','$pekerjaan','$angkatan','$no_hp','$email','$alamat','$alamat_domisili'
                    ,'$status_kawin','$status_hidup','$url_foto')";
                        $query = Yii::$app->db->createCommand($sql)->execute();
                    }
                }

                if ($query)
                {
                    echo "data upload successfully";
                }
            }

            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create-bulk', [
                'model' => $model,
            ]);
        }
    }

}
