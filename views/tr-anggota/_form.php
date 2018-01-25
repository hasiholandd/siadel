<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrAnggota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-anggota-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true])->label('NIM') ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?php
            echo '<label>Tanggal Lahir</label>';
            echo \kartik\widgets\DatePicker::widget([
                'model' => $model,
                'attribute' => 'tanggal_lahir',
                'pluginOptions' => [
                  'format' => 'yyyy-mm-d',
                  'todayHighlight' => true
              ]
            ]);
            ?>
            <br>

        <?= $form->field($model, 'jurusan')->dropdownList($optionJurusan,
        ['prompt'=>'Pilih Jurusan']);?>

        <?= $form->field($model, 'pendidikan_terakhir')->dropdownList($optionPendidikan,
        ['prompt'=>'Pilih Pekerjaan']);?>

        <?= $form->field($model, 'pekerjaan')->dropdownList($optionPekerjaan,
        ['prompt'=>'Pilih Pekerjaan']);?>

        <?= $form->field($model, 'angkatan')->dropdownList($optionAngkatan,
        ['prompt'=>'Pilih Angkatan']);?>

     <?= $form->field($model, 'agama')->dropdownList([
            'Islam' => 'Islam',
            'Kristen Protestan' => 'Kristen Protestan',
            'Kristen Katolik' => 'Kristen Katolik',
            'Hindu' => 'Hindu',
            'Buddha' => 'Buddha',
            'Kong Hu Cu' => 'Kong Hu Cu',
            ],
        ['prompt'=>'Pilih Agama']);?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'alamat_domisili')->textarea(['rows' => 6]) ?>

    
    <?= $form->field($model, 'status_kawin')->dropdownList([
            '0' => 'Belum Menikah',
            '1' => 'Menikah'
            ],
        ['prompt'=>'Pilih Status']);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
