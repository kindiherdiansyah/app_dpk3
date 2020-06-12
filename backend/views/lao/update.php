<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lao */

$this->title = 'Update Lao: ' . $model->lao_id;
$this->params['breadcrumbs'][] = ['label' => 'Laos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lao_id, 'url' => ['view', 'id' => $model->lao_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
