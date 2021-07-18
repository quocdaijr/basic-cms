<?php
/**
 * This is the template for generating a model class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator \common\gii\module\Generator*/

echo "<?php\n";
?>

namespace <?= $generator->getModelNamespace() ?>;

use common\components\models\DbActiveRecord;

/**
* This is the model class is generate auto by Gii, please edit the file accordingly.
*/
class <?= $generator->getTemplateName() ?> extends DbActiveRecord
{
    public static function tableName()
    {
        return '';
    }

    public function rules()
    {
        return [];
    }

    public function attributeLabels()
    {
        return [];
    }
}
