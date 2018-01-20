<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrUser */

$this->title = 'Export Data Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$modelAngkatan = \yii\helpers\ArrayHelper::map(\app\models\MsAngkatan::find()->all(), 'id', 'tahun_angkatan');

?>
<div class="tr-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="tr-user-form">

	    <?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'angkatan')->dropdownList($angkatan,
	    ['prompt'=>'Pilih Angkatan']);?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Export' : 'Export', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>


</div>
