<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengeluaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pengeluaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pengeluaran') ?>

    <?= $form->field($model, 'jumlah_pengeluaran') ?>

    <?= $form->field($model, 'tanggal_pengeluaran') ?>

    <?= $form->field($model, 'keterangan_pengeluaran') ?>

    <?php // echo $form->field($model, 'url_bukti_pengeluaran') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
