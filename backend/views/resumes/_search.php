<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ResumesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resumes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'resumes_id') ?>

    <?= $form->field($model, 'lao') ?>

    <?= $form->field($model, 'eom') ?>

    <?php // echo $form->field($model, 'eom_percen') ?>

    <?php // echo $form->field($model, 'jml_debitur') ?>

    <?php // echo $form->field($model, 'tgt_perpetugas') ?>

    <?php // echo $form->field($model, 'perpetugas_percen') ?>

    <?php // echo $form->field($model, 'tgt_pergeseran') ?>

    <?php // echo $form->field($model, 'pergeseran_percen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
