<?php

use yii\db\Migration;
use common\constants\UserConstant;

/**
 * Class m210713_155158_seed_user
 */
class m210713_155158_seed_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->upsert('{{%user}}', [
            'id' => 1,
            'uuid' =>\Ramsey\Uuid\v4(),
            'username' => 'webmaster',
            'email' => 'webmaster@example.com',
            'phone' => '0797113505',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('webmaster'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'status' => UserConstant::STATUS_ACTIVE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ], false);
        $this->upsert('{{%user}}', [
            'id' => 2,
            'uuid' =>\Ramsey\Uuid\v4(),
            'username' => 'manager',
            'email' => 'manager@example.com',
            'phone' => '0797113505',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('manager'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'status' => UserConstant::STATUS_ACTIVE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ], false);
        $this->upsert('{{%user}}', [
            'id' => 3,
            'uuid' =>\Ramsey\Uuid\v4(),
            'username' => 'user',
            'email' => 'user@example.com',
            'phone' => '0797113505',
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('user'),
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'status' => UserConstant::STATUS_ACTIVE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ], false);

        $this->upsert('{{%profile}}', [
            'user_id' => 1,
            'locale' => Yii::$app->sourceLanguage,
            'full_name' => 'Keylor Navas',
            'gender' => UserConstant::USER_GENDER_MALE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ], false);
        $this->upsert('{{%profile}}', [
            'user_id' => 2,
            'locale' => Yii::$app->sourceLanguage,
            'full_name' => 'Cristiano Ronaldo',
            'gender' => UserConstant::USER_GENDER_MALE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ], false);
        $this->upsert('{{%profile}}', [
            'user_id' => 3,
            'locale' => Yii::$app->sourceLanguage,
            'full_name' => 'Lionel Messi',
            'gender' => UserConstant::USER_GENDER_MALE,
            'created_at' => (new DateTime())->format("Y-m-d H:i:s"),
            'updated_at' => (new DateTime())->format("Y-m-d H:i:s")
        ], false);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210713_155158_seed_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210713_155158_seed_user cannot be reverted.\n";

        return false;
    }
    */
}
