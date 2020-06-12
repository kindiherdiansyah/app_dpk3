<?php

use yii\helpers\Html;
use kartik\grid\GridView;
// use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use kartik\grid\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DebiturSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Debitur';
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

<div class="debitur-index panel panel-info">
   <div class="panel-heading">
        <h4><b>Daftar Debitur Menunggak</b>
        <span class="pull-right">
            <?= Html::a('Create Data Debitur', ['create'], ['class' => 'btn btn-primary btn w3-btn w3-hover-aqua']) ?>
            <?= Html::a('Import Excel', ['import'], ['class' => 'btn btn-primary btn btn-warning w3-hover-yellow','target' => '_blank']) ?>
            <a href="/ccru/backend/web/index.php?r=debitur%2Fgroup" class="btn btn-primary btn btn-blue w3-hover-info">DASHBOARD</a>
            <input type="button" class="btn btn-danger w3-hover-red" value="Multiple Delete" id="MyButton" >
        </span>
        </h4>
    </div>

    <div class="panel-body">
    <?= GridView::widget([
        'id'=> 'companies_grid_display',
        'containerOptions' => ['class' => 'debitur-pjax-container'],
        'options' => [],
        
        'pjax' => true,
        'pjaxSettings'=>[
        'neverTimeout'=>true,
        ],
        'striped' => true,
        'hover' => true,
        'panel' => ['type' => 'primary', 'heading' => 'DPK 3'],
        'showPageSummary' => true,
        
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn','header' => 'No'],
            // [
            //     'class' => 'kartik\grid\ExpandRowColumn',
            //     'value' => function ($model, $key, $index, $column) {
            //         return GridView::ROW_COLLAPSED;
            //     },
            //     'detail' => function ($model, $key, $index, $column) {
            //         $searchModel = new ResumeSearch();
            //         $searchModel->dispatch_dispatch
            //     }
            //     ]
            
            // 'debitur_id',
            'nodeb',
            [
            'label' => 'LAO',
            'attribute' =>'lao',
            ],
            [
            'attribute' => 'nama',
            'pageSummary' => 'Total Outstanding',
            ],
            'alamat',
            // 'angsuran',
            // 'tgk_angsuran',
            'dpd',
            'bulan',
            [
            'label' => 'Outstanding',
            'format' => 'currency',
            'attribute' =>'outstanding',
            'pageSummary' => true,
            'pageSummaryOptions' => ['debitur_id' => 'outstanding'],
            ],
            // 'nama_ptgs',
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
                    url : \'index.php?r=debitur/multiple-delete\',
                    data : {debitur_id: CompId},
                    success : function() {
                      $(this).closest(\'tr\').remove(); //or whatever html you use for displaying rows
                    }
                });

            });
            });', \yii\web\View::POS_READY);

        ?>
    


