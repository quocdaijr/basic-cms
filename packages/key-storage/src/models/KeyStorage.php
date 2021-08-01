<?php


namespace keystorage\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "key_storage".
 *
 * @property integer $key
 * @property integer $value
 */
class KeyStorage extends ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->db;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%key_storage}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['key'], 'string', 'max' => 128],
            [['value', 'comment'], 'safe'],
            [['key'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => Yii::t('key_storage', 'Key'),
            'value' => Yii::t('key_storage', 'Value'),
            'comment' => Yii::t('key_storage', 'Comment'),
        ];
    }
}