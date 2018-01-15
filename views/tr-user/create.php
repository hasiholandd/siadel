<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\date\DatePicker;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\TrUser */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="tr-user-form">

	    <?php $form = ActiveForm::begin(); ?>

<?php 
// usage without model
echo '<label>Check Issue Date</label>';
echo DatePicker::widget([
	'name' => 'check_issue_date', 
	'value' => date('d-M-Y', strtotime('+2 days')),
	'options' => ['placeholder' => 'Select issue date ...'],
	'pluginOptions' => [
		'format' => 'dd-M-yyyy',
		'todayHighlight' => true
	]
]);
?>
		<?= $form->field($model, 'id_anggota')->hint('Assign Anggota')->dropdownList($optionAnggota,
	    ['prompt'=>'Plilh Anggota']);?>

	    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'password')->passwordInput()->hint('Password Default : password123') ?>

	    <?= $form->field($model, 'id_role')->hint('Role Admin & User')->dropdownList($optionRole,
	    ['prompt'=>'Pilih Role']);?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>


</div>
