<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lao */

$this->title = 'Create Lao';
$this->params['breadcrumbs'][] = ['label' => 'Laos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
