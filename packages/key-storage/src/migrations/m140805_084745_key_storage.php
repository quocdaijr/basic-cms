<?php

use yii\db\Migration;

class m140805_084745_key_storage extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%key_storage}}', [
            'key' => $this->string(128)->notNull(),
            'value' => $this->text()->notNull(),
            'comment' => $this->text(),
            'updated_at' => $this->integer(),
            'created_at' => $this->integer()
        ], $tableOptions);

        $this->addPrimaryKey('pk_key_storage_key', '{{%key_storage}}', 'key');
        $this->createIndex('idx_key_storage_key', '{{%key_storage}}', 'key', true);
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropTable('{{%key_storage}}');
    }
}
