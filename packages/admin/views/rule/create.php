<?php

use yii\helpers\Html;

/* @var $this  yii\web\View */
/* @var $model admin\models\BizRule */

$this->title = Yii::t('admin', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
