<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\TrPengumuman;
$this->title = 'Sistem Informasi Alumni IA-DEL';
?>


    <!-- <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div> -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <?php echo Html::img('@web/images/banner/banner_1.jpg') ?>
        </div>

        <div class="item">
          <?php echo Html::img('@web/images/banner/banner_2.jpg') ?>
        </div>

        <div class="item">
          <?php echo Html::img('@web/images/banner/banner_3.jpg') ?>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Pengumuman</h2>

                <?php 
                    $dataPengumuman = TrPengumuman::getDataPengumuman();
                    foreach ($dataPengumuman as $data) {  
                        echo "<p><b>".$data->judul_pengumuman."</b>";
                        echo "<p>".substr($data->keterangan_pengumuman,0,100);
                        echo Html::a(' selengkapnya', ['tr-pengumuman/pengumuman'], ['class' => 'profile-link']);
                    }
                ?>
                <p><?php echo Html::a(' Lainnya &raquo;', ['tr-pengumuman/pengumuman'], ['class' => 'profile-link']); ?>
            </div>
            <div class="col-lg-4">
                <h2>Berita</h2>

                <?php 
                    $dataBerita= TrPengumuman::getDataBerita();
                    foreach ($dataBerita as $data) {  
                        echo "<p><b>".$data->judul_pengumuman."</b>";
                        echo "<p>".substr($data->keterangan_pengumuman,0,100);
                        echo Html::a(' selengkapnya', ['tr-pengumuman/berita'], ['class' => 'profile-link']);
                    }
                ?>

                <p><?php echo Html::a(' Lainnya &raquo;', ['tr-pengumuman/berita'], ['class' => 'profile-link']); ?>
            </div>
            <div class="col-lg-4">
                <h2>Agenda</h2>

                <?php 
                    $dataAgenda = TrPengumuman::getDataAgenda();
                    foreach ($dataAgenda as $data) {  
                        echo "<p><b>".$data->judul_pengumuman."</b>";
                        echo "<p>".substr($data->keterangan_pengumuman,0,100);
                        echo Html::a(' selengkapnya', ['tr-pengumuman/agenda'], ['class' => 'profile-link']);
                    }
                ?>

                <p><?php echo Html::a(' Lainnya &raquo;', ['tr-pengumuman/agenda'], ['class' => 'profile-link']); ?>
            </div>
        </div>

    </div>
</div>
