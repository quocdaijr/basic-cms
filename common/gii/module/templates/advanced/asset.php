<?php
/**
 * This is the template for generating a asset class within a module.
 */

/* @var $generator \common\gii\module\Generator*/

echo "<?php\n";
?>

namespace <?= $generator->getAssetNamespace() ?>;

use yii\web\AssetBundle;

class <?= $generator->getTemplateName() ?>Asset extends AssetBundle
{
    /**
    * @var string
    */
    public $sourcePath = '<?= $generator->getAssetPath()?>';
    /**
    * @var array
    */
    public $css = [];
    /**
    * @var array
    */
    public $js = [];
    /**
    * @var array
    */
    public $depends = [];
}