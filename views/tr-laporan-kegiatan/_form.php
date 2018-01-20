<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrLaporanKegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-laporan-kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'id_proposal')->dropdownList($optionProposal,
        ['prompt'=>'Pilih Proposal'])->label('Nama Proposal');?>

    <?= $form->field($model, 'approval_by')->dropdownList($optionUserApproval,
        ['prompt'=>'Pilih Approval'])->label('Approval'); ?>

    <?= $form->field($model, 'keterangan_approval')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keterangan_kegiatan')->textarea(['rows' => 6]) ?>

    <?php
        echo '<label>Tanggal Pengajuan</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $model,
            'attribute' => 'tanggal_pengajuan',
            'pluginOptions' => [
              'format' => 'yyyy-mm-dd',
              'todayHighlight' => true
          ]
        ]);
        ?>
        <br>

    <?= $form->field($model, 'url_dokumen_laporan_kegiatan')->fileInput()->hint('Mohon upload file dengan ekstensi .pdf/.docx/.xlsx/.pptx'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
