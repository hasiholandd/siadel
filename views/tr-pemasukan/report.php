<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPemasukan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pemasukan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= 
    $form->field($iuran, 'id')->dropdownList($modelPemasukan,
        ['prompt'=>'Pilih Pemasukan'])->label('Nama Pemasukan');?>

     <?php
        echo '<label>Tanggal Mulai</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $iuran,
            'attribute' => 'tanggal_mulai',
            'pluginOptions' => [
              'format' => 'yyyy-mm-d',
              'todayHighlight' => true
          ]
        ]);
        ?>
        <?php
        echo '<label>Tanggal Selesai</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $iuran,
            'attribute' => 'tanggal_selesai',
            'pluginOptions' => [
              'format' => 'yyyy-mm-d',
              'todayHighlight' => true
          ]
        ]);
        ?>

   

    <div class="form-group">
        <?= Html::submitButton($iuran->isNewRecord ? 'View Report' : 'Update', ['class' => $iuran->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

