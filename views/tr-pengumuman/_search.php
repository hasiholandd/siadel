<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengumumanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pengumuman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pengumuman') ?>

    <?= $form->field($model, 'tanggal_mulai') ?>

    <?= $form->field($model, 'tanggal_selesai') ?>

    <?= $form->field($model, 'judul_pengumuman') ?>

    <?php // echo $form->field($model, 'keterangan_pengumuman') ?>

    <?php // echo $form->field($model, 'url_dokumen_pengumuman') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'id_created') ?>

    <?php // echo $form->field($model, 'id_approval') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
         
    </div>

    <?php ActiveForm::end(); ?>

</div>
