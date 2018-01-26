<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrProposal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-proposal-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'tujuan_proposal')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6, 'readonly'=>true]) ?>

    <?= $form->field($model, 'tanggal_pengajuan')->textInput(['readonly'=>true]) ?>

    <?php echo Html::a('Download Proposal',['/tr-proposal/download-uploaded-file', 'file'=>$model->url_dokumen_pengeluaran]
        ,['class' => 'glyphicon glyphicon-download']
    ); ?>
    
    <br>
    <br>&nbsp;
    <?php $session = Yii::$app->session;
    if($session->get('rolename') == 'admin') { ?>
    <?php echo $form->field($model, 'status_proposal')->dropDownList(['1' => 'Setuju', '0' => 'Tidak Setuju']); ?>

        
        <div class="form-group">
             
            <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php }?>

    <?php ActiveForm::end(); ?>

</div>
