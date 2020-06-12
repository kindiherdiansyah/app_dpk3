<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lao_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ptgs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NIP')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
