<?php

namespace app\controllers;

use app\models\MsAngkatan;
use app\models\MsJurusan;
use app\models\MsPekerjaan;
use app\models\MsPendidikan;
use Yii;
use app\models\TrAnggota;
use app\models\TrAnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\web\AssetManager;
use app\Helper;
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
        $optionPekerjaan = ArrayHelper::map(MsPekerjaan::find()->all(), 'id', 'nama_pekerjaan');
        $optionPendidikan = ArrayHelper::map(MsPendidikan::find()->all(), 'id', 'nama_pendidikan');
        $optionJurusan = ArrayHelper::map(MsJurusan::find()->all(), 'id', 'nama_jurusan');
        $optionAngkatan = ArrayHelper::map(MsAngkatan::find()->all(), 'id', 'tahun_angkatan');
         if ($model->load(Yii::$app->request->post()) ) {
          
            // $model->url_foto = UploadedFile::getInstance($model, 'url_foto');
            // $filename =  $model->id . "_" . date('YmdHis');
            // $path = Yii::getAlias('@uploadedprofilpicturedir') ;
            
            // if(!empty($model->url_foto->extension)){
            //   $model->url_foto->saveAs($path . $filename . '.' . $model->url_foto->extension);
            //   $model->url_foto = $filename . '.' . $model->url_foto->extension;  
            // }else{
            //   $model = $this->findModel($session->get('id_user'));
            //   $model->url_foto = $model->url_foto;
            // }

            $model->created_at = date('Y-m-d H:i:s');
            $model->save();

            $modelUser = new \app\models\TrUser;
            //create data user
            $dataAnggota = \app\models\TrAnggota::find()->where([ 'nim' => $model->nim ])->one();
            $modelUser->id_anggota = $dataAnggota->id;
            $modelUser->email = $dataAnggota->email;
            $modelUser->password = md5('password123');//password default : password123
            $modelUser->link_reset_password = md5($dataAnggota->nim.$dataAnggota->nama.date('YmdHis'));
            $modelUser->id_role =  2; //role default : user 
            $modelUser->flag =  0; // 0 : belum dikirim email reset password <> 1 : sudah dikirim
            $modelUser->created_at =  date('Y-m-d H:i:s'); 
           
            $modelUser->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'optionPekerjaan' => $optionPekerjaan,
                'optionPendidikan' => $optionPendidikan,
                'optionJurusan' => $optionJurusan,
                'optionAngkatan' => $optionAngkatan,
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
        $optionPekerjaan = ArrayHelper::map(MsPekerjaan::find()->all(), 'id', 'nama_pekerjaan');
        $optionPendidikan = ArrayHelper::map(MsPendidikan::find()->all(), 'id', 'nama_pendidikan');
        $optionJurusan = ArrayHelper::map(MsJurusan::find()->all(), 'id', 'nama_jurusan');
        $optionAngkatan = ArrayHelper::map(MsAngkatan::find()->all(), 'id', 'tahun_angkatan');
        $model->updated_at =  date('Y-m-d H:i:s'); 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'optionPekerjaan' => $optionPekerjaan,
                'optionPendidikan' => $optionPendidikan,
                'optionJurusan' => $optionJurusan,
                'optionAngkatan' => $optionAngkatan,
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

    public function actionCreateBulk()
    {
        $model = new TrAnggota();

        if ($model->load(Yii::$app->request->post())) {

            $model->file = UploadedFile::getInstance($model, 'file');

            if ( $model->file )
            {
                $path = Yii::getAlias('@webroot').'/csv/anggota-bulk/' ;
                $time = date('Y-m-d');
                $model->file->saveAs($path .$time. '.' . $model->file->extension);
                $model->file = $path .$time. '.' . $model->file->extension;

                $handle = fopen($model->file, "r");

                $count = 0;
                while (($fileop = fgetcsv($handle, 10000, ",")) !== false)
                {
                    
                    if($count > 0) {
                        $jurusan = MsJurusan::find()->where(['nama_jurusan'=> $fileop[5]])->one();
                        $pendidikan = MsPendidikan::find()->where(['nama_pendidikan'=>$fileop[6]])->one();
                        $pekerjaan = MsPekerjaan::find()->where(['nama_pekerjaan'=>$fileop[7]])->one();
                        $angkatan = MsAngkatan::find()->where(['tahun_angkatan'=>$fileop[8]])->one();
                        $sql = "INSERT INTO tr_anggota(nim,nama,tempat_lahir,tanggal_lahir,agama,jurusan,pendidikan_terakhir,pekerjaan,angkatan,no_hp
                    ,email,alamat,alamat_domisili,status_kawin,status_hidup,url_foto) VALUES ('$fileop[0]', '$fileop[1]', '$fileop[2]',
                    '$fileop[3]','$fileop[4]','$jurusan->id','$pendidikan->id','$pekerjaan->id','$angkatan->id','$fileop[9]','$fileop[10]','$fileop[11]','$fileop[12]'
                    ,'$fileop[13]','$fileop[14]','$fileop[15]')";
                        Yii::$app->db->createCommand($sql)->execute();

                        $modelUser = new \app\models\TrUser;
                        //create data user
                        $dataAnggota = \app\models\TrAnggota::find()->where([ 'nim' => $fileop[0] ])->one();
                        $modelUser->id_anggota = $dataAnggota->id;
                        $modelUser->email = $fileop[10];
                        $modelUser->password = md5('password123');//password default : password123
                        $modelUser->link_reset_password = md5($fileop[0].$fileop[1].date('YmdHis'));
                        $modelUser->id_role =  2; //role default : user 
                        $modelUser->flag =  0; // 0 : belum dikirim email reset password <> 1 : sudah dikirim
                        $modelUser->created_at =  date('Y-m-d H:i:s'); 
                       
                        $modelUser->save();

                        //sending email
                        $arrayTemp = array();
                        $arrayTemp['nama'] = $dataAnggota->nama;
                        $arrayTemp['email'] = $modelUser->email;
                        $arrayTemp['link_reset_password'] = "https://www.iadel.org". \yii\helpers\Url::to(['tr-user/resetpassword', 'token' => $modelUser->link_reset_password]);
                        $arrayTemp['subject'] = "MOHON RESET PASSWORD - SIADEL";
                        $html_template = 'email'; //nama template
                        if( Helper::sendemail($arrayTemp, $arrayTemp['subject'], $html_template, $arrayTemp['email']  ) == true){
                           $modelUser->flag =  1; // 0 : belum dikirim email reset password <> 1 : sudah dikirim
                           $modelUser->save(); 
                        }
                    }
                    $count++;
                }
                fclose($handle);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create-bulk', [
                'model' => $model,
            ]);
        }
    }

    public function actionDownloadTemplate(){

        $path = Yii::getAlias('@webroot').'/templates';
        $file = $path.'/template_anggota_upload.csv';
        if (file_exists($file)) {
            Yii::$app->response->xSendFile($file);
        }else{
            $this->render('download404');
        }
    }

    public function actionUpdatedatadiri()
    {

        $session = Yii::$app->session;
        $model = $this->findModel($session->get('id_anggota'));
        
        $optionPekerjaan = ArrayHelper::map(MsPekerjaan::find()->all(), 'id', 'nama_pekerjaan');
        $optionPendidikan = ArrayHelper::map(MsPendidikan::find()->all(), 'id', 'nama_pendidikan');
        $optionJurusan = ArrayHelper::map(MsJurusan::find()->all(), 'id', 'nama_jurusan');
        $optionAngkatan = ArrayHelper::map(MsAngkatan::find()->all(), 'id', 'tahun_angkatan');
        if ($model->load(Yii::$app->request->post()) ) {
            $model->url_foto = UploadedFile::getInstance($model, 'url_foto');
            $filename =  $model->id . "_" . date('YmdHis');
            $path = Yii::getAlias('@uploadedprofilpicturedir') ;
            
            if(!empty($model->url_foto->extension)){
              $model->url_foto->saveAs($path . $filename . '.' . $model->url_foto->extension);
              $model->url_foto = $filename . '.' . $model->url_foto->extension;  
            }else{
              $model = $this->findModel($session->get('id_user'));
              $model->url_foto = $model->url_foto;
            }

          $model->updated_at = date('Y-m-d H:i:s');
          $model->save();
          return $this->redirect('view', [
                  'id' => $model->id
                ] 
              );
        } else {
            return $this->render('updatedatadiri', [
                'model' => $model,
                'optionPekerjaan' => $optionPekerjaan,
                'optionPendidikan' => $optionPendidikan,
                'optionJurusan' => $optionJurusan,
                'optionAngkatan' => $optionAngkatan,
            ]);
        }
    }


    public function actionExport()
    {
        $model = new TrAnggota();

        $angkatan = ArrayHelper::map(MsAngkatan::find()->all(), 'id', 'tahun_angkatan');
        $angkatan[0] = "Semua";

        if ($model->load(Yii::$app->request->post())) {
            if($model->angkatan == 0){
                $angg = TrAnggota::find()->all();
                $title = "ALL";
            }else {
                $angg = TrAnggota::find()->where(['angkatan' => $model->angkatan])->all();
                $title = MsAngkatan::findOne(['id', $model->angkatan])->tahun_angkatan;
            }
            $values  = ArrayHelper::toArray($angg, [
                'app\models\TrAnggota' => [
                    'NIM' => 'nim',
                    'Nama' => 'nama',
                    'Tempat Lahir' => 'tempat_lahir',
                    'Tanggal Lahir' => 'tanggal_lahir',
                    'Agama' => 'agama',
                    'Jurusan' => function ($angg) {
                        $jur = MsJurusan::findOne(['id'=>$angg->jurusan]);
                        return isset($jur->nama_jurusan)? $jur->nama_jurusan:"Not Set";
                    },
                    //'Pendidikan Terakhir' => 'pendidikan_terakhir',
                    'Pendidikan Terakhir' => function ($angg) {
                        $jur = MsPendidikan::findOne(['id'=>$angg->pendidikan_terakhir]);
                        return isset($jur->nama_pendidikan)? $jur->nama_pendidikan:"Not Set";
                    },
                    //'Pekerjaan' => 'pekerjaan',
                    'Pekerjaan' => function ($angg) {
                        $jur = MsPekerjaan::findOne(['id'=>$angg->pekerjaan]);
                        return isset($jur->nama_pekerjaan)? $jur->nama_pekerjaan:"Not Set";
                    },
                    'Nomor Handphone' => 'no_hp',
                    'Email' => 'email',
                    'Alamat' => 'alamat',
                    'Alamat Domisili' => 'alamat_domisili',
                    //'Status Kawin' => 'status_kawin',
                    'Status Kawin' => function ($angg) {
                        if($angg->status_kawin == 0) return "Belum Kawin";
                        return "Kawin";
                    },
                    //'Status Hidup' => 'status_hidup',
                    'Status Hidup' => function ($angg) {
                        if($angg->status_hidup == 0) return "Meninggal";
                        return "Hidup";
                    },
                    /*'length' => function ($angg) {
                        return strlen($angg->content);
                    },*/
                ],
            ]);

            if(count($values) != 0) {
                //$this->download_send_headers("export_angkatan_" . $title . "_" . date("Y-m-d") . ".csv");
                Helper::download_send_headers("export_angkatan_" . $title . "_" . date("Y-m-d") . ".csv");
                //echo $this->array2csv($values);
                echo Helper::array2csv($values);
                die();
            }
            return $this->render('export', [
                'model' => $model,
                'angkatan' => $angkatan,
            ]);
        } else {
            return $this->render('export', [
                'model' => $model,
                'angkatan' => $angkatan,
            ]);
        }
    }

    public function actionLihatdata()
    {
        $searchModel = new TrAnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('lihatdata', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
