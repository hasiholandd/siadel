<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrProposalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Proposal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-proposal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_proposal',
            //'approval_by',
            'tujuan_proposal:ntext',
            'keterangan:ntext',
            'tanggal_pengajuan',
            // 'tanggal_approval',
            //'status_proposal',
            array(
                'attribute' => 'status_proposal',
                //'type' => 'raw',
                'value' => function($model) {
                    if($model->status_proposal == 0){return "Tidak Setuju";}else{return "Setuju"; }
                }

            ),
            //'url_dokumen_pengeluaran:ntext',
            // 'history_proposal:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
