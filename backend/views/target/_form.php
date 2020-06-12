<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Target */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="target-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'target_id')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eomlalu_deb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eomlalu_outs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eom_deb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eom_outs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target_deb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target_outs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_deb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_outs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'selisih_deb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'selisih_outs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'persen_deb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'persen_outs')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
