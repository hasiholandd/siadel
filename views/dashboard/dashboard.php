<?php
$anggota = \app\models\TrAnggota::find()->All();
$proposal = \app\models\TrProposal::find()->All();
$pemasukan = (new \yii\db\Query())->from('tr_pemasukan');
$t_masuk = $pemasukan->sum('jumlah_pemasukan');
$pengeluaran = (new \yii\db\Query())->from('tr_pengeluaran');
$t_keluar = $pengeluaran->sum('jumlah_pengeluaran');
?>
<html>
<body>
<style>
    .hero-widget { text-align: center; padding-top: 20px; padding-bottom: 20px; }
    .hero-widget .icon { display: block; font-size: 96px; line-height: 96px; margin-bottom: 10px; text-align: center; }
    .hero-widget var { display: block; height: 64px; font-size: 64px; line-height: 64px; font-style: normal; }
    .hero-widget label { font-size: 17px; }
    .hero-widget .options { margin-top: 10px; }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="hero-widget well well-sm">
                <div class="icon">
                    <i class="glyphicon glyphicon-user"></i>
                </div>
                <div class="text">
                    <var><?php echo count($anggota); ?></var>
                    <label class="text-muted">Total Alumni</label>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="hero-widget well well-sm">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open"></i>
                </div>
                <div class="text">
                    <var><?php echo count($proposal); ?></var>
                    <label class="text-muted">Total Proposal Masuk</label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="hero-widget well well-sm">
                <div class="icon">
                    <i class="glyphicon glyphicon-usd"></i>
                </div>
                <div class="text">
                    <var><?php echo "Rp.".number_format($t_masuk-$t_keluar); ?></var>
                    <label class="text-muted">Saldo IA-Del</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="hero-widget well well-sm">
                <div class="icon">
                    <i class="glyphicon glyphicon-plus-sign"></i>
                </div>
                <div class="text">
                    <var><?php echo "Rp.".number_format($t_masuk); ?></var>
                    <label class="text-muted">Total Pemasukan</label>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="hero-widget well well-sm">
                <div class="icon">
                    <i class="glyphicon glyphicon-minus-sign"></i>
                </div>
                <div class="text">
                    <var><?php echo "Rp.".number_format($t_keluar); ?></var>
                    <label class="text-muted">Total Pengeluaran</label>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>