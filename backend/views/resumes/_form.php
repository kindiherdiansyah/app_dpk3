<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Resume;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Resumes */
/* @var $form yii\widgets\ActiveForm */
// $model->tgl = date('Y-m-d');   
?>
<script>
function sum() {
   
      var txtSixNumberValue = document.getElementById('gap').value;
      var txtSevenNumberValue = document.getElementById('pergeseran').value;

      var result3 = parseInt(txtSixNumberValue) - parseInt(txtSevenNumberValue);

      var hasil3 = Math.ceil(result3);
      
      if (!isNaN(hasil3)) {
         document.getElementById('gap_baru').value = hasil3;
      }

}
</script>


<div class="resumes-form">

    <?php $form = ActiveForm::begin(); ?>

    <center>
    <?= $form->field($model, 'tgl')->widget(
        DatePicker::classname(),[
            'inline' => true,
            'template' => '<div class="well well-sm" style="background-color:#fff;width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>
    </center>

    <div class="col-md-6"  style="margin-bottom: 8px;">
    <?= $form->field($model, 'lao')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Resume::find()->all(),'lao','lao'),
    'language' => 'en',
    'options' => ['placeholder' => 'Pilih LAO','id'=>'lao'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]); ?>
  

    <?= $form->field($model, 'persen')->textInput(['type' => 'number','maxlength' => true, 'readOnly'=>false])->label('Persen %') ?>

    <?= $form->field($model, 'eom')->textInput(['maxlength' => true])->label('EOM') ?>
    </div>

    <div class="col-md-6"  style="margin-bottom: 8px;">
    <?= $form->field($model, 'tgt_perpetugas')->textInput(['maxlength' => true])->label('Target Perpetugas') ?>

    <?= $form->field($model, 'tgt_pergeseran')->textInput(['maxlength' => true])->label('Target Pergeseran') ?>

    <?= $form->field($model, 'jml_debitur')->textInput(['placeholder' => "Masukan Jumlah Debitur",'required' => true,'maxlength' => true, 'autocomplete' => 'off']) ?>
    </div>
    
    <center>
    <div class="col-md-12"  style="margin-bottom: 8px;">
    <?= $form->field($model, 'gap')->textInput(['id'=>'gap','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('GAP') ?>
    <?= $form->field($model, 'pergeseran')->textInput(['id'=>'pergeseran','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Pergeseran') ?>
    <?= $form->field($model, 'gap_baru')->textInput(['id'=>'gap_baru','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('GAP Baru') ?>
    </div>
    </center>


    <center>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </center>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
$('#lao').change(function(){
    var laoId = $(this).val();
    
    $.get('index.php?r=resume/get-persen-eom',{ laoId : laoId },function(data){
        var data = $.parseJSON(data);

        $('#resumes-persen').attr('value',data.persen);
        $('#resumes-eom').attr('value',data.eom);
        $('#resumes-tgt_perpetugas').attr('value',data.tgt_perpetugas);
        $('#resumes-tgt_pergeseran').attr('value',data.tgt_pergeseran);
    });
});

JS;
$this->registerJs($script);
?>
