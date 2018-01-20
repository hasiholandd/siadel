<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsPemasukan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ms-pemasukan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pemasukan')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'SAVE' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
