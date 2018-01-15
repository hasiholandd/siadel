<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrUser */

$this->title = 'Update User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'username' => $model->username, 'email' => $model->email]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="tr-user-form">

	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'id_anggota')->hint('Assign Anggota')->dropdownList($optionAnggota,
	    ['prompt'=>'Plilh Anggota']);?>

	    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'password')->passwordInput() ?>

	    <?= $form->field($model, 'id_role')->hint('Role Admin & User')->dropdownList($optionRole,
	    ['prompt'=>'Pilih Role']);?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>


</div>
