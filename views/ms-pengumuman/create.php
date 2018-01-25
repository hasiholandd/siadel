<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsPengumuman */

$this->title = 'Tambah Master Data Pengumuman';
$this->params['breadcrumbs'][] = ['label' => 'Master Data Pengumuman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pengumuman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
