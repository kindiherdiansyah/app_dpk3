<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use kartik\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MonitoringSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monitorings';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

<div class="monitoring-index panel panel-info">

    <div class="panel-heading">
        <h4><b>Daftar Monitoring</b>
        <span class="pull-right">
            <?= Html::a('Create Data Monitoring', ['create'], ['class' => 'btn btn-primary btn w3-btn w3-hover-aqua']) ?>
            <?= Html::a('Import Excel', ['import'], ['class' => 'btn btn-success','target' => '_blank']) ?>

            <input type="button" class="btn btn-danger w3-hover-red" value="Multiple Delete" id="MyButton" >
        </span>
        </h4>
    </div>
    <div class="panel-body">
    <?= GridView::widget([
        'id'=> 'companies_grid_display',
        'containerOptions' => ['class' => 'monitoring-pjax-container'],
        'options' => [],
        
        'pjax' => true,
        'pjaxSettings'=>[
        'neverTimeout'=>true,
        ],
        'striped' => true,
        'hover' => true,
        'panel' => ['type' => 'primary', 'heading' => 'MONITORING'],
        'showPageSummary' => true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn','header'=>"No"],

            // 'monitoring_id',
            // 'kode_lao',
            'lao',
            'tgl',
            'posisi_awal',
            'persen',
            'target_awal',
            'deb',
            [
            'label' => 'Target +-',
            'attribute' =>'target_dua',
            ],
            'realisasi',
            'selisih',

            ['class' => 'kartik\grid\CheckboxColumn'],
            ['class' => 'kartik\grid\ActionColumn',
        'header'=>"Actions"],
        ],
    ]); ?>
</div>
</div>

<?php 

            $this->registerJs(' 

            $(document).ready(function(){
            $(\'#MyButton\').click(function(){
                var CompId = $(\'#companies_grid_display\').yiiGridView(\'getSelectedRows\');
                  $.ajax({
                    type: \'POST\',
                    url : \'index.php?r=monitoring/multiple-delete\',
                    data : {monitoring_id: CompId},
                    success : function() {
                      $(this).closest(\'tr\').remove(); //or whatever html you use for displaying rows
                    }
                });

            });
            });', \yii\web\View::POS_READY);

        ?>
