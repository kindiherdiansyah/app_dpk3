<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lao_id',
            'nama_ptgs',
            'NIP',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
