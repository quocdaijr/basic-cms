<?php

namespace backend\modules\user\models;

use common\components\models\DbActiveRecord;
use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use backend\modules\user\constants\Constant;

/**
 * User model
 *
 * @property integer $id
 * @property string $uuid
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $phone
 * @property string $auth_key
 * @property integer $status
 * @property string $logged_at
 * @property string $created_at
 * @property string $updated_at
 * @property string $password write-only password
 */
class User extends DbActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'uuid'], 'unique'],
            ['email' => 'email'],
            [['username'], 'filter', 'filter' => '\yii\helpers\Html::encode'],
            ['status', 'default', 'value' => Constant::STATUS_INACTIVE],
            ['status', 'in', 'range' => array_keys(Constant::statuses())],
        ];
    }

    public function attributeLabels()
    {
        return [
            'uuid' => t('common', 'Uuid'),
            'username' => t('common', 'Username'),
            'email' => t('common', 'E-mail'),
            'phone' => t('common', 'Phone'),
            'status' => t('common', 'Status'),
            'auth_key' => t('common', 'Auth Key'),
            'password_hash' => t('common', 'Password Hash'),
            'created_at' => t('common', 'Created at'),
            'updated_at' => t('common', 'Updated at'),
            'logged_at' => t('common', 'Last login'),
        ];
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => Constant::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => Constant::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return z()->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = z()->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = z()->security->generateRandomString();
    }

    /*------ Audit ------*/

    /**
     * @param string $id user_id from audit_entry table
     * @return string
     */
    public static function userIdentifierCallbackForAudit($id)
    {
        $user = self::findOne($id);
        return $user ? $user->username : $id;
    }

    /**
     * @param string $identifier user_id from audit_entry table
     * @return array
     */
    public static function filterByUserIdentifierCallbackForAudit($identifier)
    {
        return static::find()->select('id')
            ->where(['like', 'username', $identifier])
            ->orWhere(['like', 'email', $identifier])
            ->column();
    }
}
