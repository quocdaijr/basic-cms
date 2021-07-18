<?php
/**
 * This is the template for generating a db repository class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator \common\gii\module\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getRepositoryNamespace() ?>;

use common\components\repositories\BaseDbRepository;

class DbRepository extends BaseDbRepository
{

}