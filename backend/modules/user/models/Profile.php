<?php


namespace backend\modules\user\models;


use Yii;
use backend\modules\user\constants\Constant;
use common\components\models\DbActiveRecord;

/**
 * User model
 *
 * @property integer $user_id
 * @property string $full_name
 * @property string $avatar
 * @property string $cover
 * @property string $locale
 * @property integer $gender
 * @property string $created_at
 * @property string $updated_at
 */
class Profile extends DbActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'gender'], 'integer'],
            [['full_name', 'avatar', 'cover'], 'string', 'max' => 255],
            ['gender', 'default', 'value' => Constant::USER_GENDER_OTHER],
            [['gender'], 'in', 'range' => Constant::genders()],
            ['locale', 'default', 'value' => z()->language],
            ['locale', 'in', 'range' => array_keys(z()->params['availableLocales'])],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id' => t('common', 'User ID'),
            'full_name' => t('common', 'FullName'),
            'avatar' => t('common', 'Avatar'),
            'cover' => t('common', 'Cover'),
            'locale' => t('common', 'Locale'),
            'gender' => t('common', 'Gender'),
            'created_at' => t('common', 'Created At'),
            'updated_at' => t('common', 'Updated At'),
        ];
    }

    public function getAvatar($default = null)
    {
        return $this->avatar ?: $default;
    }
}