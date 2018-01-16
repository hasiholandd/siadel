<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrProposal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-proposal-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'tujuan_proposal')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6, 'readonly'=>true]) ?>

    <?= $form->field($model, 'tanggal_pengajuan')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model,'url_dokumen_pengeluaran')->textInput(['readonly'=>true]) ?>
    <?php
    //if (file_exists($file)) {
      //  Yii::$app->response->xSendFile($model->url_dokumen_pengeluaran);
    //}
    ?>

    <?php echo $form->field($model, 'status_proposal')->dropDownList(['1' => 'Setuju', '0' => 'Tidak Setuju']); ?>

    <div class="form-group">
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
