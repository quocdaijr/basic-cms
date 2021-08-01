<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model admin\models\AuthItem */
/* @var $context admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('admin', 'Update ' . $labels['Item']) . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Update');
?>
<div class="auth-item-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>
