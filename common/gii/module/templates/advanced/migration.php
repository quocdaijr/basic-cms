<?php
/**
 * This is the template for generating a migration class within a module.
 */


/* @var $generator \common\gii\module\Generator */

echo "<?php\n";
?>
use yii\db\Migration;

/**
* Class <?=$generator->getMigrationName()?>
*/
class <?=$generator->getMigrationName()?> extends Migration
{
    /**
    * {@inheritdoc}
    */
    public function safeUp()
    {
    }

    /**
    * {@inheritdoc}
    */
    public function safeDown()
    {
        echo "<?=$generator->getMigrationName()?> cannot be reverted.\n";

        return false;
    }
}
