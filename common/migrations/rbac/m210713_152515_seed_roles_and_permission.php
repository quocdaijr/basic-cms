<?php

use common\components\migrations\RbacMigration;
use common\constants\UserConstant;

/**
 * Class m210713_152515_seed_roles_and_permission
 */
class m210713_152515_seed_roles_and_permission extends RbacMigration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->auth->removeAll();

        $user = $this->auth->createRole(UserConstant::ROLE_USER);
        $this->auth->add($user);

        $manager = $this->auth->createRole(UserConstant::ROLE_MANAGER);
        $this->auth->add($manager);
        $this->auth->addChild($manager, $user);

        $admin = $this->auth->createRole(UserConstant::ROLE_ADMINISTRATOR);
        $this->auth->add($admin);
        $this->auth->addChild($admin, $manager);
        $this->auth->addChild($admin, $user);

        $this->auth->assign($admin, 1);
        $this->auth->assign($manager, 2);
        $this->auth->assign($user, 3);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->auth->remove($this->auth->getRole(UserConstant::ROLE_ADMINISTRATOR));
        $this->auth->remove($this->auth->getRole(UserConstant::ROLE_MANAGER));
        $this->auth->remove($this->auth->getRole(UserConstant::ROLE_USER));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210713_152515_seed_roles_and_permission cannot be reverted.\n";

        return false;
    }
    */
}
