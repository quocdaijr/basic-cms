<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \admin\models\form\ChangePassword */

$this->title = Yii::t('admin', 'Change Password');
$this->params['breadcrumbs'] = ['label' => $this->title];
?>
<div class="site-signup">
    <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
    <div class="card">
        <div class="card-body">
            <?= $form->field($model, 'oldPassword')->passwordInput() ?>
            <?= $form->field($model, 'newPassword')->passwordInput() ?>
            <?= $form->field($model, 'retypePassword')->passwordInput() ?>
        </div>
        <div class="card-footer">
            <?= Html::submitButton(Yii::t('admin', 'Change'), ['class' => 'btn btn-primary', 'name' => 'change-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
