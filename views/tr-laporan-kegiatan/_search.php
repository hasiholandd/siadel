<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrLaporanKegiatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-laporan-kegiatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_proposal') ?>

    <?= $form->field($model, 'approval_by') ?>

    <?= $form->field($model, 'keterangan_approval') ?>

    <?= $form->field($model, 'keterangan_kegiatan') ?>

    <?php // echo $form->field($model, 'tanggal_pengajuan') ?>

    <?php // echo $form->field($model, 'tanggal_approval') ?>

    <?php // echo $form->field($model, 'url_dokumen_laporan_kegiatan') ?>

    <?php // echo $form->field($model, 'history_laporan') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
