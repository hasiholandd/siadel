<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengumuman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pengumuman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pengumuman')->textInput() ?>

    <?= $form->field($model, 'tanggal_mulai')->textInput() ?>

    <?= $form->field($model, 'tanggal_selesai')->textInput() ?>

    <?= $form->field($model, 'keterangan_pengumuman')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url_dokumen_pengumuman')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
