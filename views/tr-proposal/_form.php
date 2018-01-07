<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrProposal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-proposal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_proposal')->textInput() ?>

    <?= $form->field($model, 'approval_by')->textInput() ?>

    <?= $form->field($model, 'tujuan_proposal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_pengajuan')->textInput() ?>

    <?= $form->field($model, 'tanggal_approval')->textInput() ?>

    <?= $form->field($model, 'status_proposal')->textInput() ?>

    <?= $form->field($model, 'url_dokumen_pengeluaran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'history_proposal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
