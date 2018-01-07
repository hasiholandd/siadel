<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengeluaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pengeluaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pengeluaran')->textInput() ?>

    <?= $form->field($model, 'jumlah_pengeluaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pengeluaran')->textInput() ?>

    <?= $form->field($model, 'keterangan_pengeluaran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url_bukti_pengeluaran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
