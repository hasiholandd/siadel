<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengumuman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pengumuman-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'id_pengumuman')->dropdownList($optionPengumuman,
        ['prompt'=>'Pilih Jenis Pengumuman']);?>

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
        <br>

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
        <br>

    <?= $form->field($model, 'judul_pengumuman')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keterangan_pengumuman')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url_dokumen_pengumuman')->fileInput()->hint('Hint : File yang diunggah harus berukuran 5MB atau kurang. Dan memiliki ekstensi file .pdf/.word/.xlsx/.pptx/.jpg/.jpeg/.png') ?>

    <?= "<p>".isset($model->url_dokumen_pengumuman) ? $model->url_dokumen_pengumuman : ""?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
