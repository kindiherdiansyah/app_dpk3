<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
				
				<?= $form->field($model, 'password')->passwordInput() ?>
				
				<?= $form->field($model, 'nama') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'alamat') ?>

                <?= $form->field($model, 'no_telp') ?>

                <div class="form-group">
                    <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary btn w3-btn w3-hover-aqua', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
