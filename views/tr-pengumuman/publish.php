<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengumuman */

$this->title = 'Publish Data Pengumuman';
$this->params['breadcrumbs'][] = ['label' => 'Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengumuman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    
  <div class="tr-pengumuman-form">

    <?php $form = ActiveForm::begin(); ?>


     <?php
        echo '<label>Tanggal Mulai</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal_mulai',
            'disabled' => true,
            'pluginOptions' => [
              'format' => 'yyyy-mm-d',
              'todayHighlight' => true,
            ] 
        ]);
        ?>
        <br>

        <?php
        echo '<label>Tanggal Selesai</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal_selesai',
            'disabled' => true,
            'pluginOptions' => [
              'format' => 'yyyy-mm-d',
              'todayHighlight' => true
          ]
        ]);
        ?>
        <br>

    <?= $form->field($model, 'judul_pengumuman')->textarea(['rows' => 6,'readonly' => true]) ?>

    <?= $form->field($model, 'keterangan_pengumuman')->textarea(['rows' => 6,'readonly' => true]) ?>

     <?= $form->field($model, 'flag')->dropdownList(['1' => 'Disetujui','0' => 'Tidak Disetujui'],
        ['prompt'=>'Pilih']);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Publish', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>
