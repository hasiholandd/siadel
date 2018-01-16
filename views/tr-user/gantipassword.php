<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrUser */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
    $this->title = 'Ganti Password User';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-user-form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 're_password')->passwordInput() ?>

    <label id="labelnotifikasi" class="control-label" for="truser-password"></label>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id' => 'btnSubmitUbahPassword']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
$(document).ready(function() {
    function checkPasswordMatch() {
        var password = $("#truser-password").val();
        var confirmPassword = $("#truser-re_password").val();

        $("#labelnotifikasi").html("");
        if (password != confirmPassword){
            $("#labelnotifikasi").append("<b><font color=\"red\">Password do not match!</b></font>");
            $(':input[type="submit"]').prop('disabled', true);
            console.log("Passwords not match!");
        }
        else{
            $("#labelnotifikasi").append("<b><font color=\"green\">Password match.</font></b>");
            $(':input[type="submit"]').prop('disabled', false);
            console.log("Passwords match!");
        }
    }

    $(document).ready(function () {
       $(':input[type="submit"]').prop('disabled', true);
       $("#truser-re_password").change(checkPasswordMatch);
    });
});
</script>