<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MsAngkatan */

$this->title = 'Master Data Angkatan';
$this->params['breadcrumbs'][] = ['label' => 'Master Data Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ms-angkatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
