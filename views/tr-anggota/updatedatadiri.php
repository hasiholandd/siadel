<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrUser */

$this->title = 'Update data Diri: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-anggota-update">

   	<h1><?= "Update Data Diri : " . $model->nama ?></h1>

    <div class="tr-anggota-form">

	    <?php $form = ActiveForm::begin(); ?>

	   	<?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

	   	<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

	   	<?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

	    <?= $form->field($model, 'agama')->dropdownList([
	    	'Islam' => 'Islam',
	    	'Kristen Protestan' => 'Kristen Protestan',
	    	'Kristen Katolik' => 'Kristen Katolik',
	    	'Hindu' => 'Hindu',
	    	'Buddha' => 'Buddha',
	    	'Kong Hu Cu' => 'Kong Hu Cu',
	    	],
        ['prompt'=>'Pilih Status']);?>

   	    <?= $form->field($model, 'jurusan')->dropdownList($optionJurusan,
        ['prompt'=>'Pilih Jurusan']);?>

	    <?= $form->field($model, 'pendidikan_terakhir')->dropdownList($optionPendidikan,
        ['prompt'=>'Pilih Pekerjaan']);?>

	    <?= $form->field($model, 'pekerjaan')->dropdownList($optionPekerjaan,
        ['prompt'=>'Pilih Pekerjaan']);?>

	    <?= $form->field($model, 'angkatan')->dropdownList($optionAngkatan,
        ['prompt'=>'Pilih Angkatan']);?>

	    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

	    <?= $form->field($model, 'alamat_domisili')->textarea(['rows' => 6]) ?>

	    <?= $form->field($model, 'status_kawin')->dropdownList([
	    	'0' => 'Belum Menikah',
	    	'1' => 'Menikah'
	    	],
        ['prompt'=>'Pilih Status']);?>

	    <?= $form->field($model,'url_foto')->fileInput() ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>


</div>
