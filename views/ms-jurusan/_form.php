<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsJurusan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ms-jurusan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_jurusan')->textInput(['maxlength' => true]) ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'SAVE' : 'SAVE', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
