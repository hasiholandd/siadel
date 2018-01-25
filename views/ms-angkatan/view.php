<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MsAngkatan */

$this->title = "Detail Angkatan " . $model->tahun_angkatan;
$this->params['breadcrumbs'][] = ['label' => 'Master Data Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-angkatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tahun_angkatan',
            'nama_angkatan',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
