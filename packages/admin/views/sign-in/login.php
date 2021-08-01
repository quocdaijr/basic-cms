<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */


$this->title = 'Login';
?>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username', [
                'inputTemplate' => '<div class="input-group">
                    {input}
                    <div class="input-group-append"><span class="input-group-text"><span class="fas fa-user"></span></span></div>
                </div>',
            ])->textInput(['autofocus' => true, 'placeholder' => 'Email'])->label(false) ?>

            <?= $form->field($model, 'password', [
                'inputTemplate' => '<div class="input-group">
                    {input}
                    <div class="input-group-append"><span class="input-group-text"><span class="fas fa-lock"></span></span></div>
                </div>',
            ])->passwordInput(['placeholder' => 'Password'])->label(false) ?>
            <div class="icheck-primary">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <?php echo Html::submitButton(Yii::t('admin', 'Sign In'). ' <span class="fas fa-arrow-right fa-sm"></span>', [
                'class' => 'btn btn-primary btn-block btn-login',
                'name' => 'login-button'
            ]) ?>
            <?php ActiveForm::end(); ?>
            <p class="mt-3 mb-1">
                <a href="/admin/sign-in/request-password-reset">Forgot my password?</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
