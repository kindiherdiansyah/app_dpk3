<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resumes */

$this->title = $model->resumes_id;
$this->params['breadcrumbs'][] = ['label' => 'Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resumes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->resumes_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->resumes_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'resumes_id',
            'lao',
            'eom',
           
            'jml_debitur',
            'tgt_perpetugas',
            'persen',
            'tgt_pergeseran',
            [
                'label' => 'Tanggal',
                'value' => Yii::$app->formatter->asDate($model->tgl, 'dd-MMMM-Y'),
            ],
            'gap',
            'pergeseran',
            'gap_baru',
        ],
    ]) ?>

</div>
