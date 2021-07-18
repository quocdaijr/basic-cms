<?php

use yii\db\Migration;
use admin\components\Configs;

/**
 * Class m210714_160353_seed_default_menu
 */
class m210714_160353_seed_default_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $menuTable = Configs::instance()->menuTable;
        $this->batchInsert($menuTable, ['id', 'name', 'parent', 'route', 'order', 'data'],
            [
                [1, 'System Management', NULL, NULL, 20, '$icon = \'<i class="nav-icon fas fa-cogs"></i>\';'],

                [2, 'Users', 1, '', 1, '$icon = \'<i class="nav-icon fas fa-users"></i>\';'],
                [3, 'Roles and Permissions', 1, '/admin/assignment', 2, '$icon = \'<i class="fas fa-users-cog"></i>\';'],
                [5, 'Menu', 1, '/admin/menu', 3, '$icon = \'<i class="nav-icon fas fa-list-ul"></i>\';'],
                [6, 'Gii', 1, '/gii', 4, '$icon = \'<i class="nav-icon fas fa-tools"></i>\';'],
                [7, 'Log', 1, NULL, 5, '$icon = \'<i class="nav-icon fas fa-clipboard-list"></i>\';'],

                [8, 'Audit Log', 7, '/audit/default/index', 1, '$icon = \'<i class="nav-icon fas fa-file-alt"></i>\';'],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $menuTable = Configs::instance()->menuTable;
        $this->truncateTable($menuTable);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210714_160353_seed_default_menu cannot be reverted.\n";

        return false;
    }
    */
}
