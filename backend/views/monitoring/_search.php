<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MonitoringSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="monitoring-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'monitoring_id') ?>

    <?= $form->field($model, 'kode_lao') ?>

    <?= $form->field($model, 'tgl') ?>

    <?= $form->field($model, 'posisi_awal') ?>

    <?= $form->field($model, 'persen') ?>

    <?php // echo $form->field($model, 'target_awal') ?>

    <?php // echo $form->field($model, 'target_dua') ?>

    <?php // echo $form->field($model, 'realisasi') ?>

    <?php // echo $form->field($model, 'selisih') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
