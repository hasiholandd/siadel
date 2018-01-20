<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'SI-IA-DEL',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-top',
        ],
    ]);
    $session = Yii::$app->session;
    if($session->get('rolename') == 'admin'){
            echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
               [
                'label' => 'Master Data',
                'items' => [
                         ['label' => 'Master Angkatan', 'url' => ['/ms-angkatan']],
                         '<li class="divider"></li>',
                         ['label' => 'Master Bank', 'url' => ['/ms-bank']],
                         '<li class="divider"></li>',
                         ['label' => 'Master Iuran', 'url' => ['/ms-iuran']],
                         '<li class="divider"></li>',
                         ['label' => 'Master Jurusan', 'url' => ['/ms-jurusan']],
                         '<li class="divider"></li>',
                          ['label' => 'Master Pekerjaan', 'url' => ['/ms-pekerjaan']],
                         '<li class="divider"></li>',
                         ['label' => 'Master Pendidikan', 'url' => ['/ms-pendidikan']],
                         '<li class="divider"></li>',
                         ['label' => 'Master Pengumuman', 'url' => ['/ms-pengumuman']],
                         '<li class="divider"></li>',
                         ['label' => 'Master Pemasukan', 'url' => ['/ms-pemasukan']],
                         '<li class="divider"></li>',
                         ['label' => 'Master Pengeluaran', 'url' => ['/ms-pengeluaran']],
                    ],
                ],

                [
                'label' => 'Pengumuman',
                'items' => [
                         ['label' => 'Tambah Pengumuman', 'url' => ['/tr-pengumuman/create']],
                         '<li class="divider"></li>',
                         ['label' => 'Publish Pengumuman', 'url' => ['/tr-pengumuman/index']],
                    ],
                ],

                [
                'label' => 'Anggota',
                'items' => [
                         ['label' => 'Input Bulk Anggota', 'url' => ['/tr-anggota/create-bulk']],
                         '<li class="divider"></li>',
                         ['label' => 'Tambah Data Anggota', 'url' => ['/tr-anggota']],
                         '<li class="divider"></li>',
                         ['label' => 'Ubah Data Anggota', 'url' => ['/tr-anggota']],
                    ],
                ],

                [
                'label' => 'Iuran',
                'items' => [
                         ['label' => 'Tambah Iuran', 'url' => ['/ms-iuran/create']],
                         '<li class="divider"></li>',
                         ['label' => 'Blast Informasi Iuran', 'url' => ['/tr-iuran']],
                         '<li class="divider"></li>',
                         ['label' => 'Monitoring Pembayaran', 'url' => ['/tr-iuran']],
                    ],
                ],

                ['label' => 'Laporan Kegiatan', 'url' => ['/tr-laporan-kegiatan']],

                ['label' => 'Review Proposal', 'url' => ['/tr-proposal']],

                ['label' => 'Pengeluaran', 'url' => ['/tr-pengeluaran']],

                ['label' => 'Pemasukan', 'url' => ['/tr-pemasukan']],

                [
                'label' => 'Report',
                'items' => [
                          ['label' => 'Report Pengeluaran', 'url' => ['/tr-pengeluaran/report']],
                          '<li class="divider"></li>',
                          ['label' => 'Report Pemasukan', 'url' => ['/tr-pemasukan/report']],
                     ],
                 ],

                [
                'label' => 'Profil',
                'items' => [
                         ['label' => 'Ubah Data Diri', 'url' => ['/tr-anggota/updatedatadiri']],
                         '<li class="divider"></li>',
                         ['label' => 'Manajemen Data User', 'url' => ['/tr-user/manajemenuser']],
                         '<li class="divider"></li>',
                         ['label' => 'Ubah Password', 'url' => ['/tr-user/gantipassword']],
                    ],
                ],

                $session->get('login') != 'login' ? (
                    ['label' => 'Login', 'url' => ['/tr-user/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/tr-user/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . $session->get('username') . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }
    else if($session->get('rolename') == 'user'){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                   
                ['label' => 'Pengumuman', 'url' => ['/tr-pengumuman/pengumuman']],
                ['label' => 'Berita', 'url' => ['/tr-pengumuman/berita']],
                ['label' => 'Agenda', 'url' => ['/tr-pengumuman/agenda']],

                [
                'label' => 'Iuran',
                'items' => [
                         ['label' => 'Lihat Status Pembayaran', 'url' => ['/tr-iuran/statusbayar']],
                         '<li class="divider"></li>',
                         ['label' => 'Konfirmasi Pembayaran', 'url' => ['/tr-iuran/konfirmasibayar']],
                    ],
                ],


                [
                'label' => 'Proposal',
                'items' => [
                         ['label' => 'Lihat Status Proposal', 'url' => ['/lihat-proposal']],
                         '<li class="divider"></li>',
                         ['label' => 'Upload Proposal', 'url' => ['/tr-proposal/create']],
                    ],
                ],

                [
                'label' => 'Profil',
                'items' => [
                         ['label' => 'Ubah Data Diri', 'url' => ['/profil']],
                         '<li class="divider"></li>',
                         ['label' => 'Ubah Password', 'url' => ['/ubah-password']],
                         '<li class="divider"></li>',
                         ['label' => 'Lihat Data Alumni', 'url' => ['/lihat-data-alumni']],
                    ],
                ],

                $session->get('login') != 'login' ? (
                    ['label' => 'Login', 'url' => ['/tr-user/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/tr-user/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . $session->get('username') . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }else{
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                   
                ['label' => 'Pengumuman', 'url' => ['tr-pengumuman/pengumuman']],
                ['label' => 'Berita', 'url' => ['/tr-pengumuman/berita']],
                ['label' => 'Agenda', 'url' => ['/tr-pengumuman/agenda']],
                $session->get('login') != 'login' ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/tr-user/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . $session->get('username') . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }
    
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<div class="container">
    <p class="pull-right"><a href="https://www.facebook.com/IADelOfficial/"><img src="/images/icon/facebook_circle-512.png" alt="Facebook" height="42" width="42"></p>
</div>

<footer class="footer" style="height:25%;">
    <div class="container">
        <p class="pull-left"><a href="/kpu">KPU IA-DEL</a></p>
        <p class="pull-right"><a href="/forum">FORUM IA-DEL</a></p>
    </div>

    <div class="container">
        <p class="pull-left"><a href="/charity">IA-DEL CHARITY</a></p>
        <p class="pull-right"><a href="/ia-del-mengajar">IA-DEL MENGAJAR</a></p>
    </div>
    <br><br>

    <div class="container">
        <p class="pull-left">&copy; SI-IA-DEL <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
