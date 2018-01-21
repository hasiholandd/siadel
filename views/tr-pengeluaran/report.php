<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrPengeluaran */
/* @var $form yii\widgets\ActiveForm */
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    
    $("#search-report-pengeluaran").click(function() {
        console.log('a');
            var id_pengeluaran = $("#id_pengeluaran").val();
            var tanggal_awal = $("#tanggal_awal").val();
            var tanggal_akhir = $("#tanggal_akhir").val();
            var search = 1;
            
            if(id_pengeluaran == "" ){
                alert("Harap masukkan data jenis pengeluaran");
            }else if(tanggal_awal == "" ){
                alert("Harap masukkan data tanggal awal");
            }else if(tanggal_akhir == "" ){
                alert("Harap masukkan data tanggal akhir");
            }else{
                $.ajax({
                    url: "<?php echo  yii\helpers\Url::current(); ?>/",
                    type: "POST",
                    data: {
                        id_pengeluaran: id_pengeluaran,
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
$this->title = 'Report Pengeluaran';
$this->params['breadcrumbs'][] = ['label' => 'Report Pengeluaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tr-pengeluaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="tr-pengeluaran-form">
<div id="loadingDiv" ><?php echo Html::img('@web/images/icon/giphy.gif') ?></div>
    <?php $form = ActiveForm::begin(['action' => ['tr-pengeluaran/download'] ]); ?>

    <?= $form->field($model, 'id_pengeluaran')->dropdownList($optionJenisPengeluaran,
        ['prompt'=>'Pilih Jenis Pengeluaran',
         'id' => 'id_pengeluaran']);?>
     <?php
        echo '<label>Tanggal Awal</label>';
        echo \kartik\widgets\DatePicker::widget([
            'model' => $model,
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
            'model' => $model,
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
        <button id='search-report-pengeluaran' class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Search</button>
    </div>

    <!-- Hasil Pencarian -->
    <div id="hasil_pencarian" class="container">
      
    </div>
</div>

</div>
