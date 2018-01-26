<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TrProposal */

$this->title = $model->tujuan_proposal;
$this->params['breadcrumbs'][] = ['label' => 'Proposal ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-proposal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'id_proposal',
            //'approval_by',
            array(
                'attribute' => 'approval_by',
                //'type' => 'raw',
                'value' => function($model) {
                    if(!empty($model->approval_by)){
                        $session = Yii::$app->session;

                        $usr = \app\models\TrUser::findOne(['id'=>$session->get('id_user')]);
                        return $usr->username;
                    }else{
                        return "Tidak/Belum Disetujui";
                    }
                }

            ),
            //'id_anggota',
            array(
                'attribute' => 'id_anggota',
                //'type' => 'raw',
                'value' => function($model) {
                    if(!empty($model->id_anggota)){
                        $session = Yii::$app->session;

                        $usr = \app\models\TrUser::findOne(['id'=>$session->get('id_user')]);
                        return $usr->username;
                    }else{
                        return "Tidak/Belum Disetujui";
                    }
                }

            ),
            'tujuan_proposal:ntext',
            'keterangan:ntext',
            'tanggal_pengajuan',
            'tanggal_approval',
            //'status_proposal',
            array(
                'attribute' => 'status_proposal',
                //'type' => 'raw',
                'value' => function($model) {
                    if($model->status_proposal == 0){return "Tidak Setuju";}else{return "Setuju"; }
                }

            ),
            'url_dokumen_pengeluaran:ntext',
            /*array(
                'attribute' => 'url_dokumen_pengeluaran',
                //'type' => 'raw',
                'value' => function($model) {
                    return Html::a('Download Proposal',['/tr-proposal/download-uploaded-file', 'file'=>$model->url_dokumen_pengeluaran]
                        ,['class' => 'glyphicon glyphicon-download']
                    );
                }

            ),*/
            'history_proposal:ntext',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
