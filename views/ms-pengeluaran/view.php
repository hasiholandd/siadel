<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsPengeluaran */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Master', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pengeluaran-view">

    <h1>Detail Master Pengeluaran <?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_pengeluaran',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
