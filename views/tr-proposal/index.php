<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrProposalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tr Proposals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-proposal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tr Proposal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_proposal',
            'approval_by',
            'tujuan_proposal:ntext',
            'keterangan:ntext',
            // 'tanggal_pengajuan',
            // 'tanggal_approval',
            // 'status_proposal',
            // 'url_dokumen_pengeluaran:ntext',
            // 'history_proposal:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
