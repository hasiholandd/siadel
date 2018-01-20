<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPemasukan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-pemasukan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemasukan')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'jumlah_pemasukan')->textInput() ?>

    <?= $form->field($model, 'tanggal_pemasukan')->textInput() ?>

    <?= $form->field($model, 'url_bukti_pemasukan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
