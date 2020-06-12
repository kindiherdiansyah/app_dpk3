<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Monitoring */

$this->title = $model->monitoring_id;
$this->params['breadcrumbs'][] = ['label' => 'Monitorings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitoring-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->monitoring_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->monitoring_id], [
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
            'monitoring_id',
            'kode_lao',
            'lao',
            [
                'label' => 'Tanggal',
                'value' => Yii::$app->formatter->asDate($model->tgl, 'dd MMMM Y'),
            ],
            'posisi_awal',
            'persen',
            'target_awal',
            'deb',
            'selisih_before',
            'target_dua',
            'realisasi',
            'selisih',
        ],
    ]) ?>

</div>
