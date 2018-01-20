<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TrUser */

$this->title = 'Update data Diri: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-anggota-update">

   	<h1><?= "Update Data Diri : " . $model->nama ?></h1>

    <div class="tr-anggota-form">

	    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

	    <div class="container">
			<div class="row">
		        <div class="profile-header-container">   
		    		<div class="profile-header-img">
		    		<?php 
		    			if($model->url_foto != ""){
			    			echo Html::img('@web/uploads/profil_picture/'.$model->url_foto,['alt' => 'Profil picture','class' => 'img-circle','height' => 390,'width' => 390]);
			            }else{
			    			echo Html::img('@web/uploads/profil_picture/no_photo.jpg');
			    		}?>
		                <!-- badge -->
		                <div class="rank-label-container">
		                    <span class="label label-default rank-label"><?php echo $model->nama;?></span>
		                </div>
		            </div>
		        </div> 
			</div>
		</div>


	   	<?= $form->field($model, 'nim')->textInput(['maxlength' => true,'readonly' => true]) ?>

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

	    <?= $form->field($model,'url_foto')->fileInput()->hint('Mohon input file dengan maksimal kapasitas < 1MB dan memiliki ekstensi file .jpg/.jpeg/.png/'); ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>


</div>

<style type="text/css">
	
body, html {
    height: 100%;
   /* background-repeat: no-repeat;
   background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
}
/**
 * Profile image component
 */
.profile-header-container{
    margin: 0 auto;
    text-align: center;
}

.profile-header-img {
    padding: 54px;
}

.profile-header-img > img.img-circle {
    width: 200px;
    height: 200px;
    border: 2px solid #FFFFFF;
}

.profile-header {
    margin-top: 43px;
}

/**
 * Ranking component
 */
.rank-label-container {
    margin-top: -19px;
    /* z-index: 1000; */
    text-align: center;
}

.label.label-default.rank-label {
    background-color: rgb(81, 210, 183);
    padding: 5px 10px 5px 10px;
    border-radius: 27px;
}
</style>