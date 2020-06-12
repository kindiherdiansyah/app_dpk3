<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Debitur */

$this->title = 'Update Debitur: ' . $model->nodeb;
$this->params['breadcrumbs'][] = ['label' => 'Data Debitur', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->debitur_id, 'url' => ['view', 'id' => $model->debitur_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="debitur-update">

<!--     <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
