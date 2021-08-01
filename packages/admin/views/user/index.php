<?php

use admin\components\Helper;
use admin\constants\Constant;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="card">
        <div class="card-body">
            <p>
                <?= Html::a(Yii::t('admin', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'username',
                    'email:email',
                    'phone',
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {
                            return Constant::statuses()[$model->status] ?? 'None';
                        },
                        'filter' => [
                            Constant::STATUS_USER_DELETED => 'Delete',
                            Constant::STATUS_USER_INACTIVE => 'Inactive',
                            Constant::STATUS_USER_ACTIVE => 'Active'
                        ]
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => Helper::filterActionColumn(['view', 'update', 'delete']),
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>
