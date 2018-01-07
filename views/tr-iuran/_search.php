<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrIuranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-iuran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_anggota') ?>

    <?= $form->field($model, 'id_pemasukan') ?>

    <?= $form->field($model, 'id_iuran') ?>

    <?= $form->field($model, 'jumlah_bayar') ?>

    <?php // echo $form->field($model, 'tanggal_bayar') ?>

    <?php // echo $form->field($model, 'tanggal_konfirmasi_pembayaran') ?>

    <?php // echo $form->field($model, 'tanggal_approval_pembayaran') ?>

    <?php // echo $form->field($model, 'approval_by') ?>

    <?php // echo $form->field($model, 'id_bank_pengirim') ?>

    <?php // echo $form->field($model, 'id_bank_penerima') ?>

    <?php // echo $form->field($model, 'status_pembayaran') ?>

    <?php // echo $form->field($model, 'url_bukti_pembayaran') ?>

    <?php // echo $form->field($model, 'history_pembayaran') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
