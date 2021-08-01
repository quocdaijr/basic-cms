<?php

use admin\constants\Constant;
use admin\models\User;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model User */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>

<div class="user-form">
    <?php $form = ActiveForm::begin() ?>
    <div class="card">
        <div class="card-body">
            <?php echo $form->field($model, 'username') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'phone') ?>
            <?php echo $form->field($model, 'password')->passwordInput() ?>
            <?php echo $form->field($model, 'status')->dropDownList(Constant::statuses()) ?>
            <?php echo $form->field($model, 'roles')->checkboxList($roles) ?>
        </div>
        <div class="card-footer">
            <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
