<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii2\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\MsIuran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ms-iuran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_iuran')->textInput(['maxlength' => true]) ?>

 
     <?php
        echo '<label>Tanggal Mulai</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $model,
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
            'model' => $model,
            'attribute' => 'tanggal_selesai',
            'pluginOptions' => [
              'format' => 'yyyy-mm-d',
              'todayHighlight' => true
          ]
        ]);
        ?>


    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true]) ?>


 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'SAVE' : 'SAVE', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
