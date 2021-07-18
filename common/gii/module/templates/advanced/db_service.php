<?php
/**
 * This is the template for generating a db service class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator \common\gii\module\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getServiceNamespace() ?>;

use common\components\services\BaseDbService;

class DbService extends BaseDbService
{

}