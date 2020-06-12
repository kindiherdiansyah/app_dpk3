<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resumes */

$this->title = 'Update Resumes: ' . $model->resumes_id;
$this->params['breadcrumbs'][] = ['label' => 'Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->resumes_id, 'url' => ['view', 'id' => $model->resumes_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resumes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
