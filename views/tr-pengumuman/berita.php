<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrPengumumanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengumuman-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach($dataPengumuman as $data){
        echo "<h3>".$data->judul_pengumuman."</h3>";
        echo "<p>".$data->keterangan_pengumuman;
        echo "<hr>";
        if(!empty($data->url_dokumen_pengumuman)){ 
            echo Html::a('Link Dokumen', ['/tr-pengumuman/download'], ['target'=>'_blank']);
            echo "<hr>";
        }
        
    }//echo '<pre>';var_export($dataPengumuman);exit();?>
</div>
