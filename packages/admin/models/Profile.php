<?php


namespace admin\models;


use admin\behaviors\DateTimeBehavior;
use admin\components\Configs;
use Yii;
use admin\constants\Constant;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use function Ramsey\Uuid\v4;

/**
 * Profile model
 *
 * @property integer $user_id
 * @property string $full_name
 * @property string $avatar
 * @property string $cover
 * @property string $locale
 * @property integer $gender
 * @property string $birthday
 * @property string $created_at
 * @property string $updated_at
 */
class Profile extends ActiveRecord
{

    public static function getDb()
    {
        return Configs::userDb();
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return Configs::instance()->profileTable;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            DateTimeBehavior::class,
            'uuid' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'uuid'
                ],
                'value' => function () {
                    return v4();
                }
            ]
        ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'gender'], 'integer'],
            [['full_name', 'avatar', 'cover'], 'string', 'max' => 255],
            ['birthday', 'datetime', 'format' => 'php:Y-m-d'],
            ['gender', 'default', 'value' => Constant::USER_GENDER_OTHER],
            [['gender'], 'in', 'range' => array_keys(Constant::genders())],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'user_id' => t('common', 'User ID'),
            'full_name' => t('common', 'FullName'),
            'avatar' => t('common', 'Avatar'),
            'cover' => t('common', 'Cover'),
            'locale' => t('common', 'Locale'),
            'gender' => t('common', 'Gender'),
            'birthday' => t('common', 'Birthday'),
            'created_at' => t('common', 'Created At'),
            'updated_at' => t('common', 'Updated At'),
        ];
    }

    /**
     * @param null $default
     * @return string|null
     */
    public function getAvatar($default = null)
    {
        return $this->avatar ?: $default;
    }
}