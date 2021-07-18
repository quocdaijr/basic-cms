<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $generator \common\gii\module\Generator */

use common\gii\module\Constant;

?>
    <div class="module-form">
<?php
echo $form->field($generator, 'moduleClass');
echo $form->field($generator, 'moduleID');
echo $form->field($generator, 'extraFiles')->checkboxList(Constant::listExtraFiles(),
    [
            'class' => 'form-check',
        'itemOptions' => [
            'labelOptions' => ['class' => 'form-check-label', 'style' => 'width: 100%;']
        ]
    ]
)
?>
    </div><?php
