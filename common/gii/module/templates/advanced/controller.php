<?php
/**
 * This is the template for generating a controller class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator \common\gii\module\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getControllerNamespace() ?>;

use yii\web\Controller;

/**
* Default controller for the `<?= $generator->moduleID ?>` module
*/
class <?= $generator->getTemplateName() ?>Controller extends Controller
{
    /**
    * Renders the index view for the module
    * @return string
    */
    public function actionIndex()
    {
        return $this->render('index');
    }
}