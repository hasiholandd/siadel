<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPemasukanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pemasukan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pemasukan') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'jumlah_pemasukan') ?>

    <?= $form->field($model, 'tanggal_pemasukan') ?>

    <?= $form->field($model, 'keterangan_pemasukan') ?>

    <?php // echo $form->field($model, 'url_bukti_pemasukan') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
         
    </div>

    <?php ActiveForm::end(); ?>

</div>
