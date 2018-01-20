<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrLaporanKegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->title = 'View Laporan Kegiatan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laporan Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-laporan-kegiatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="tr-laporan-kegiatan-form">

        <?php $form = ActiveForm::begin(); ?>

         <?= $form->field($model, 'id_proposal')->dropdownList($optionProposal,
            ['prompt'=>'Pilih Proposal',
            'disabled' => 'disabled' ])->label('Nama Proposal');?>

        <?= $form->field($model, 'approval_by')->dropdownList($optionUserApproval,
            ['prompt'=>'Pilih Approval',
            'disabled' => 'disabled' ])->label('Approval'); ?>

        <?= $form->field($model, 'keterangan_approval')->textarea(['rows' => 6, 'readonly' => true]) ?>

        <?= $form->field($model, 'keterangan_kegiatan')->textarea(['rows' => 6,'readonly' => true]) ?>

        <?php
            echo '<label>Tanggal Pengajuan</label>';
            echo \kartik\widgets\DatePicker::widget([
                'model' => $model,
                'attribute' => 'tanggal_pengajuan',
                'pluginOptions' => [
                  'format' => 'yyyy-mm-d',
                  'todayHighlight' => true,
                ],
                'readonly' => true
            ]);
            ?>
            <br>

        <?php if($model->url_dokumen_laporan_kegiatan){
            echo Html::a('Download Laporan kegiatan',['/tr-laporan-kegiatan/download-uploaded-file', 'file'=>$model->url_dokumen_laporan_kegiatan]
                    ,['class' => 'glyphicon glyphicon-download']
                ); 
        } else{
            'Tidak ada file';
        }?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
