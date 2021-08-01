<?php
use yii\grid\GridView;
use keystorage\helpers\Helper;

/**
 * @var $this         yii\web\View
 * @var $searchModel  keystorage\models\KeyStorageSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        keystorage\models\KeyStorage
 */

$this->title = Yii::t('backend', 'Key Storage Items');

$this->params['breadcrumbs'][] = $this->title;

?>

<?php echo $this->render('_form', [
    'model' => $model,
]) ?>

<div class="card">
    <div class="card-body p-0">
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{pager}",
            'options' => [
                'class' => ['gridview', 'table-responsive'],
            ],
            'tableOptions' => [
                'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'key',
                'value',

                [
                    'class' => \common\widgets\ActionColumn::class,
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
    </div>
    <div class="card-footer">
        <?php echo Helper::getDataProviderSummary($dataProvider) ?>
    </div>
</div>