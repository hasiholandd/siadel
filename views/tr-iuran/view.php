<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrIuran */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tr Iurans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-iuran-view">

    <h1>Detail Konfirmasi Pembayaran </h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            [
                'label' => 'Nama',
                'value' => $model->namaAnggota->nama,
            ],
            [
                'label' => 'Iuran',
                'value' => $model->namaIuran->nama_iuran,
            ],
            //'jumlah_bayar',
            array(
                'attribute' => 'jumlah_bayar',
                //'type' => 'raw',
                'value' => "Rp. ".number_format($model->jumlah_bayar)
            ),
            'tanggal_bayar',
            'tanggal_konfirmasi_pembayaran',
            //'tanggal_approval_pembayaran',
            array(
                'attribute' => 'tanggal_approval_pembayaran',
                //'type' => 'raw',
                'value' => function($model) {
                    if(!empty($model->tanggal_approval_pembayaran)) {
                        return $model->tanggal_approval_pembayaran;
                    }
                    return "Belum/Tidak Disetujui";
                }
            ),
            //'approval_by',
            array(
                'attribute' => 'approval_by',
                //'type' => 'raw',
                'value' => function($model) {
                    if(!empty($model->approval_by)) {
                        $user = \app\models\TrUser::findOne(['id' => $model->approval_by]);
                        return $user->username;
                    }
                    return "Belum/Tidak Disetujui";
                }
            ),
            //'id_bank_pengirim',
            array(
                'attribute' => 'id_bank_pengirim',
                //'type' => 'raw',
                'value' => function($model) {
                    $bank = \app\models\MsBank::findOne(['id'=>$model->id_bank_pengirim]);
                    return $bank->nama_bank;
                }

            ),
            //'id_bank_penerima',
            array(
                'attribute' => 'id_bank_penerima',
                //'type' => 'raw',
                'value' => function($model) {
                    $bank = \app\models\MsBank::findOne(['id'=>$model->id_bank_penerima]);
                    return $bank->nama_bank;
                }

            ),
            //'status_pembayaran',
            array(
                'attribute' => 'status_pembayaran',
                //'type' => 'raw',
                'value' => function($model) {
                    if($model->status_pembayaran == 0){return "Belum/Tidak Disetujui";}else{return "Disetujui"; }
                }

            ),
            //'url_bukti_pembayaran:ntext',
            [
                'attribute'=>'url_bukti_pembayaran',
                'value'=> 'uploads/konfirmasi-pembayaran/'.$model->url_bukti_pembayaran,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'history_pembayaran:ntext',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>


    <?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?php echo $form->field($model, 'status_pembayaran')->dropDownList(['1' => 'Setuju', '0' => 'Tidak Setuju']); ?>
    <?= $form->field($model, 'history_pembayaran')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>

</div>
