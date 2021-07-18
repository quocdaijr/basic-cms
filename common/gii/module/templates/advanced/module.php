<?php
/**
 * This is the template for generating a module class file.
 */

/* @var $this yii\web\View */
/* @var $generator \common\gii\module\Generator */

$className = $generator->moduleClass;
$pos = strrpos($className, '\\');
$ns = ltrim(substr($className, 0, $pos), '\\');
$className = substr($className, $pos + 1);

echo "<?php\n";
?>

namespace <?= $ns ?>;

use Yii;

/**
* <?= $generator->moduleID ?> module definition class
*/
class <?= $className ?> extends \yii\base\Module
{
    /**
    * {@inheritdoc}
    */
    public $controllerNamespace = '<?= $generator->getControllerNamespace() ?>';

    /**
    * {@inheritdoc}
    */
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/config.php');
        // custom initialization code goes here
    }
}
