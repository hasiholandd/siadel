<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsPendidikan */

$this->title = 'Tambah Master Data Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Master Data Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-pendidikan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
