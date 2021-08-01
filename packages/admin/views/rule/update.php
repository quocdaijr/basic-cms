<?php

use yii\helpers\Html;

/* @var $this  yii\web\View */
/* @var $model admin\models\BizRule */

$this->title = Yii::t('admin', 'Update Rule') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Rules'), 'url' => ['index']];
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
