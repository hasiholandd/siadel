<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrProposalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-proposal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_proposal') ?>

    <?= $form->field($model, 'approval_by') ?>

    <?= $form->field($model, 'tujuan_proposal') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'tanggal_pengajuan') ?>

    <?php // echo $form->field($model, 'tanggal_approval') ?>

    <?php // echo $form->field($model, 'status_proposal') ?>

    <?php // echo $form->field($model, 'url_dokumen_pengeluaran') ?>

    <?php // echo $form->field($model, 'history_proposal') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
         
    </div>

    <?php ActiveForm::end(); ?>

</div>
