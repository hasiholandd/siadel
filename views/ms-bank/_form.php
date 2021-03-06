<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsBank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ms-bank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_bank')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'SAVE' : 'SAVE', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
