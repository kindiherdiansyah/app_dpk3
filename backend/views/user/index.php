<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index panel panel-info">

    <div class="panel-heading">
        <h4><b><?= Html::encode($this->title) ?></b>
        <span class="pull-right">
            
        </span>
        </h4>
    </div>
    
    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			'username',
            'nama',
			'email:email',
            'alamat',
            'no_telp',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            //'status',
            // 'created_at',
            // 'updated_at',
			[
            'label' => 'Role',
            'attribute'=>'role',
            'value' => function ($model) {
            if($model->role==1)
                return 'Admin';
            else
                return 'User';
            }
        ],

            ['class' => 'kartik\grid\ActionColumn', 'header' => 'Actions',
                    'template' => '{update} {delete}'],
        ],
    ]); ?>
</div>
</div>
