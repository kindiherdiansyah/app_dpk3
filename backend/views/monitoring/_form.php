<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Resumes;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Monitoring */
/* @var $form yii\widgets\ActiveForm */
// $model->tgl = date('Y-m-d');
?>

<script>
function sum() {
      var txtThirdNumberValue = document.getElementById('posisi_awal').value;
      var txtFourNumberValue = document.getElementById('persen').value;
      var txtFiveNumberValue = document.getElementById('target_dua').value;
      var txtSixNumberValue = document.getElementById('realisasi').value;
      var txtSevenNumberValue = document.getElementById('selisih_before').value;
      var txtEightNumberValue = document.getElementById('target_awal').value;

      var result1 = parseInt(txtThirdNumberValue) / 100 * parseInt(txtFourNumberValue);
      var result2 = parseInt(txtSixNumberValue) - parseInt(txtFiveNumberValue);
      var result3 = parseInt(txtEightNumberValue) - parseInt(txtSevenNumberValue);

      var hasil1 = Math.ceil(result1);
      var hasil2 = Math.ceil(result2);
      var hasil3 = Math.ceil(result3);
      
      if (!isNaN(hasil1)) {
         document.getElementById('target_awal').value = hasil1;
      } 
      if (!isNaN(hasil2)) {
         document.getElementById('selisih').value = hasil2;
      }
      if (!isNaN(hasil3)) {
         document.getElementById('target_dua').value = hasil3;
      }

}
</script>

<div class="monitoring-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'kode_lao')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Resumes::find()->all(),'resumes_id',function($model){return ($model->lao.' ('.$model->tgl.')');}),
    'theme' => Select2::THEME_BOOTSTRAP,
    'language' => 'en',
    'options' => ['placeholder' => 'Pilih LAO (Tanggal)','required' => true,'style'=>'width:500px','maxlength' => true,'id'=>'lao'],
    'pluginOptions' => [
    'allowClear' => true
    ],
    ]);
    ?>
    
    <?= $form->field($model, 'lao')->textInput(['readOnly'=>true,'style'=>'width:500px','maxlength' => true]) ?>

    <?= $form->field($model, 'tgl')->textInput(['readOnly'=>true,'style'=>'width:500px','maxlength' => true]) ?>
    

    <?= $form->field($model, 'posisi_awal')->textInput(['id'=>'posisi_awal','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Posisi Awal') ?>
    <?= $form->field($model, 'persen')->textInput(['id'=>'persen','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Persen') ?>
    <?= $form->field($model, 'target_awal')->textInput(['id'=>'target_awal','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Target Awal') ?>
    <?= $form->field($model, 'deb')->textInput(['type' => 'number','maxlength' => true])->label('Debitur') ?>
    <?= $form->field($model, 'selisih_before')->textInput(['id'=>'selisih_before','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Selisih Sebelumnya') ?>
    <?= $form->field($model, 'target_dua')->textInput(['id'=>'target_dua','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Target +-') ?>
    <?= $form->field($model, 'realisasi')->textInput(['id'=>'realisasi','type' => 'number','maxlength' => true])->label('Realisasi') ?>
    <?= $form->field($model, 'selisih')->textInput(['id'=>'selisih','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Selisih') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS

$('#lao').change(function(){
    var laoId = $(this).val();
    
    $.get('index.php?r=resumes/get-persen-eom',{ laoId : laoId },function(data){
        var data = $.parseJSON(data);

        $('#monitoring-tgl').val(data.tgl).trigger("change");
        $('#monitoring-lao').val(data.lao).trigger("change");
        $('#posisi_awal').val(data.tgt_pergeseran).trigger("change");
        $('#realisasi').val(data.pergeseran).trigger("change");


    });
});

JS;
$this->registerJs($script);
?>