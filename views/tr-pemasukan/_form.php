<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPemasukan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pemasukan-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_pemasukan')->dropdownList($optionPemasukan,
        ['prompt'=>'Pilih Pemasukan']);?>
  
    <?= $form->field($model, 'jumlah_pemasukan')->textInput() ?>

   
     <?php
        echo '<label>Tanggal Pemasukan</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal_pemasukan',
            'pluginOptions' => [
              'format' => 'yyyy-mm-d',
              'todayHighlight' => true
          ]
        ]);
        ?>

    <?= $form->field($model,'url_bukti_pemasukan')->fileInput() ?>
    <?php  echo '<label>Hint: file .jpg, .png</label>';?>

    <?= $form->field($model, 'keterangan_pemasukan')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'SAVE' : 'SAVE', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
