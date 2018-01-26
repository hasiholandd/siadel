<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengeluaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pengeluaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pengeluaran')->dropdownList($optionPengeluaran,
        ['prompt'=>'Pilih Pengeluaran'])
        ->label('Jenis Pengeluaran');?>

    <?= $form->field($model, 'jumlah_pengeluaran')->textInput(['maxlength' => true]) ?>

    <?php
        echo '<label>Tanggal Pemasukan</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal_pengeluaran',
            'pluginOptions' => [
              'format' => 'yyyy-mm-dd',
              'todayHighlight' => true
          ]
        ]);
        ?>
    <br>

    <?= $form->field($model, 'keterangan_pengeluaran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model,'url_bukti_pengeluaran')->fileInput()->label('Upload Bukti Pemasukan') ?>
    <?php  echo '<label>Hint: file .jpg, .png</label>';?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
