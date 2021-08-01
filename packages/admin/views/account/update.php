<?php

use admin\constants\Constant;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model \admin\models\form\Account */
/* @var $form yii\bootstrap4\ActiveForm */

$this->title = Yii::t('backend', 'Update Account');
$this->params['breadcrumbs'] = ['label' => $this->title];
?>

<div class="user-form">
    <?php $form = ActiveForm::begin() ?>
    <div class="card">
        <div class="card-body">
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'phone') ?>
            <?php echo $form->field($model, 'full_name') ?>
            <?php echo $form->field($model, 'gender')->dropdownList(Constant::genders()) ?>
            <?php echo $form->field($model, 'birthday')->widget(
                DateTimePicker::class,
                [
                    'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                    'pluginOptions' => [
                        'minView' => '2',
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ],
                    'options' => [
                        'placeholder' => 'Enter event date ...',
                        'value' => !empty($model->birthday) ? date('Y-m-d', strtotime($model->birthday)) : ''
                    ]
                ]
            ) ?>
            <?php echo $form->field($model, 'locale')->dropdownList(Yii::$app->params['availableLocales']) ?>
        </div>
        <div class="card-footer">
            <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>