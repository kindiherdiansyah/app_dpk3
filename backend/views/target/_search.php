<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TargetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="target-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'target_id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nip') ?>

    <?= $form->field($model, 'eomlalu_deb') ?>

    <?= $form->field($model, 'eomlalu_outs') ?>

    <?php // echo $form->field($model, 'eom_deb') ?>

    <?php // echo $form->field($model, 'eom_outs') ?>

    <?php // echo $form->field($model, 'target_deb') ?>

    <?php // echo $form->field($model, 'target_outs') ?>

    <?php // echo $form->field($model, 'total_deb') ?>

    <?php // echo $form->field($model, 'total_outs') ?>

    <?php // echo $form->field($model, 'selisih_deb') ?>

    <?php // echo $form->field($model, 'selisih_outs') ?>

    <?php // echo $form->field($model, 'persen_deb') ?>

    <?php // echo $form->field($model, 'persen_outs') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
