<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\TrIuran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-iuran-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>


    <?= $form->field($model, 'id_iuran')->dropdownList($optionIuran,
        ['prompt'=>'Pilih Iuran']);?>

    <?= $form->field($model, 'jumlah_bayar')->textInput(['maxlength' => true]) ?>

    <?php
        echo '<label>Tanggal Bayar</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal_bayar',
            'pluginOptions' => [
              'format' => 'yyyy-mm-d',
              'todayHighlight' => true
          ]
        ]);
        ?>

   

    <?= $form->field($model, 'id_bank_pengirim')->dropdownList($optionBank,
        ['prompt'=>'Pilih Bank Pengirim']);?>

    <?= $form->field($model, 'id_bank_penerima')->dropdownList($optionBank,
        ['prompt'=>'Pilih Bank Penerima']);?>

    <?= $form->field($model,'url_bukti_pembayaran')->fileInput() ?>
    <?php  echo '<label>Hint: file .jpg, .png</label>';?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'SAVE' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
