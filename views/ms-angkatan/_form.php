<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsAngkatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ms-angkatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun_angkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_angkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
