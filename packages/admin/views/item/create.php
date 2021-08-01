<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model admin\models\AuthItem */
/* @var $context admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('admin', 'Create ' . $labels['Item']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
