<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DebiturSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="debitur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'debitur_id') ?>

    <?= $form->field($model, 'nodeb') ?>

    <?= $form->field($model, 'lao') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'angsuran') ?>

    <?php // echo $form->field($model, 'tgk_angsuran') ?>

    <?php // echo $form->field($model, 'dpd') ?>

    <?php // echo $form->field($model, 'bulan') ?>

    <?php // echo $form->field($model, 'outstanding') ?>

    <?php // echo $form->field($model, 'nama_ptgs') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
