<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MsAngkatan;

/* @var $this yii\web\View */
/* @var $model app\models\TrAnggota */

$this->title = 'Form Input Bulk Data Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Tr Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-anggota-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="tr-anggota-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model,'file')->fileInput() ?>

        Hint: file yang di-upload adalah file dengan extensi .csv. Mohon ikuti format template yang ada pada link dibawah ini<br>

        <?php echo Html::a('Download Template',['/tr-anggota/download-template']); ?>

        <div class="form-group">
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton($model->isNewRecord ? 'Simpan Data' : 'Simpan Data', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
