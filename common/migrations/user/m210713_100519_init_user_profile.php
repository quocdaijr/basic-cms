<?php

use yii\db\Migration;

/**
 * Class m210713_100519_init_user_profile
 */
class m210713_100519_init_user_profile extends Migration
{
    public function up()
    {
        if ($this->db->schema->getTableSchema('{{%profile}}', true) !== null) {
            echo "Table {{%profile}} is exist";
            return true;
        }

        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%profile}}', [
            'user_id' => $this->primaryKey(),
            'full_name' => $this->string(),
            'avatar' => $this->text()->defaultValue(null),
            'cover' => $this->text()->defaultValue(null),
            'locale' => $this->string(32)->notNull(),
            'gender' => $this->smallInteger(1),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->addForeignKey('fk_user', '{{%profile}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_user', '{{%profile}}');
        $this->dropTable('{{%profile}}');
    }
}
