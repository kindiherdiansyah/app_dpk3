<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Lao;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
function sum() {
      var txtThirdNumberValue = document.getElementById('eom').value;
      var txtFourNumberValue = document.getElementById('persen').value;
      var txtFiveNumberValue = document.getElementById('tgt_perpetugas').value;

      var result1 = parseInt(txtThirdNumberValue) / 100 * parseInt(txtFourNumberValue);
      var result2 = parseInt(txtThirdNumberValue) - parseInt(txtFiveNumberValue);

      var hasil1 = Math.ceil(result1);
      var hasil2 = Math.ceil(result2);
      
      if (!isNaN(hasil1)) {
         document.getElementById('tgt_perpetugas').value = hasil1;
      } 
      if (!isNaN(hasil2)) {
         document.getElementById('tgt_pergeseran').value = hasil2;
      }

}
</script>

<div class="resume-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'lao')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Lao::find()->all(),'lao_id','lao_id'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih LAO'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'deb')->textInput(['type' => 'number','maxlength' => true])->label('Debitur Target') ?>

    <?= $form->field($model, 'persen')->textInput(['id'=>'persen','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Persen') ?>

    <?= $form->field($model, 'eom')->textInput(['id'=>'eom','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('EOM') ?>

    <?= $form->field($model, 'tgt_perpetugas')->textInput(['id'=>'tgt_perpetugas','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Target Perpetugas') ?>

    <?= $form->field($model, 'tgt_pergeseran')->textInput(['id'=>'tgt_pergeseran','onkeyup'=>'sum();','type' => 'number','maxlength' => true])->label('Target Pergeseran') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
