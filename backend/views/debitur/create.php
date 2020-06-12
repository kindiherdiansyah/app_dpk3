<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Debitur */

$this->title = 'Create Data Debitur';
$this->params['breadcrumbs'][] = ['label' => 'Data Daftar Debitur Menunggak', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debitur-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
