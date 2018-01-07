<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrIuran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-iuran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_anggota')->textInput() ?>

    <?= $form->field($model, 'id_pemasukan')->textInput() ?>

    <?= $form->field($model, 'id_iuran')->textInput() ?>

    <?= $form->field($model, 'jumlah_bayar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_bayar')->textInput() ?>

    <?= $form->field($model, 'tanggal_konfirmasi_pembayaran')->textInput() ?>

    <?= $form->field($model, 'tanggal_approval_pembayaran')->textInput() ?>

    <?= $form->field($model, 'approval_by')->textInput() ?>

    <?= $form->field($model, 'id_bank_pengirim')->textInput() ?>

    <?= $form->field($model, 'id_bank_penerima')->textInput() ?>

    <?= $form->field($model, 'status_pembayaran')->textInput() ?>

    <?= $form->field($model, 'url_bukti_pembayaran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'history_pembayaran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
