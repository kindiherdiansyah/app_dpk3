<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Lao;

/* @var $this yii\web\View */
/* @var $model app\models\Debitur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="debitur-form">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                <b><?= $this->title ?></b>
                <span class="pull-right">
                    <?= Html::a('Kembali', ['index'], ['class' => 'btn w3-btn w3-hover-light-grey']) ?>
                </span>
            </h4>
        </div>

    <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6"  style="margin-bottom: 8px;">
    <?= $form->field($model, 'nodeb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lao')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Lao::find()->all(),'lao_id','lao_id'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih LAO'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nama_ptgs')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Lao::find()->all(),'nama_ptgs','nama_ptgs'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Nama Petugas'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="col-md-6"  style="margin-bottom: 8px;">
    <?= $form->field($model, 'angsuran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgk_angsuran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dpd')->textInput() ?>

    <?= $form->field($model, 'bulan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outstanding')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="form-group" align="center">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
