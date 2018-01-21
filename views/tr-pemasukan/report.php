<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPemasukan */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    
    $("#search-report-pemasukan").click(function() {
        console.log('a');
            var id_pemasukan = $("#id_pemasukan").val();
            var tanggal_awal = $("#tanggal_awal").val();
            var tanggal_akhir = $("#tanggal_akhir").val();
            var search = 1;
            
            if(id_pemasukan == "" ){
                alert("Harap masukkan data jenis pemasukan");
            }else if(tanggal_awal == "" ){
                alert("Harap masukkan data tanggal awal");
            }else if(tanggal_akhir == "" ){
                alert("Harap masukkan data tanggal akhir");
            }else{
                $.ajax({
                    url: "<?php echo  yii\helpers\Url::current(); ?>/",
                    type: "POST",
                    data: {
                        id_pemasukan: id_pemasukan,
                        tanggal_awal: tanggal_awal,
                        tanggal_akhir: tanggal_akhir,
                        search: search,
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        $("#hasil_pencarian").empty();
                        $("#hasil_pencarian").append(data);
                    }
                });
            }
        });
    $('#loadingDiv')
        .hide()  // Hide it initially
        .ajaxStart(function() {
            $(this).show();
        })
        .ajaxStop(function() {
            $(this).hide();
        });
});
</script>

<?php
$this->title = 'Report Pemasukan';
$this->params['breadcrumbs'][] = ['label' => 'Report Pemasukan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tr-pemasukan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="tr-pemasukan-form">
    <div id="loadingDiv" ><?php echo Html::img('@web/images/icon/giphy.gif') ?></div>
  <div class="tr-pemasukan-form">

      <?php $form = ActiveForm::begin(['action' => ['tr-pemasukan/download'] ]); ?>

      <?= 
      $form->field($iuran, 'id')->dropdownList($modelPemasukan,
          ['prompt'=>'Pilih Pemasukan',
          'id' => 'id_pemasukan'])->label('Jenis Pemasukan');?>

       <?php
          echo '<label>Tanggal Awal</label>';
          echo \kartik\widgets\DatePicker::widget([
              'model' => $iuran,
              'attribute' => 'tanggal_awal',
              'options' => ['placeholder' => 'Tanggal Awal', 'id' => 'tanggal_awal'],
              'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
          ]);
          ?>
          <br>
          <?php
          echo '<label>Tanggal Akhir</label>';
          echo \kartik\widgets\DatePicker::widget([
              'model' => $iuran,
              'attribute' => 'tanggal_akhir',
              'options' => ['placeholder' => 'Tanggal Akhir', 'id' => 'tanggal_akhir'],
              'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
          ]);
          ?>
      <br>
      <div class="form-group">
        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-file"></i> Export</button>
      </div>

      <?php ActiveForm::end(); ?>

      <div class="form-group">
        <button id='search-report-pemasukan' class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Search</button>
      </div>

    <!-- Hasil Pencarian -->
    <div id="hasil_pencarian" class="container">

  </div>
</div>

