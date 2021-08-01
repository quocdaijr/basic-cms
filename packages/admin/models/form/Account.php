<?php


namespace admin\models\form;


use admin\models\Profile;
use Yii;
use admin\constants\Constant;
use yii\base\Model;
use admin\models\User as UserDb;
use yii\db\Exception;
use yii\web\HttpException;

class Account extends Model
{
    /**
     * @var
     */
    public $email;
    /**
     * @var
     */
    public $phone;
    /**
     * @var
     */
    public $full_name;
    /**
     * @var
     */
    public $birthday;
    /**
     * @var
     */
    public $gender;
    /**
     * @var
     */
    public $avatar;
    /**
     * @var
     */
    public $cover;
    /**
     * @var
     */
    public $locale;

    /**
     * @var UserDb
     */
    private $model;

    /**
     * @param array $config
     * @throws HttpException
     */
    public function __construct($config = [])
    {
        $id = Yii::$app->getUser()->id;
        if (empty($id) || empty($user = UserDb::findWithProfile($id)))
            throw new HttpException(404, Yii::t('admin', 'User not found'));
        $this->setModel($user);
        parent::__construct($config);
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => UserDb::class, 'filter' => function ($query) {
                $query->andWhere(['not', ['id' => $this->model->id]]);
            }],
            [['gender'], 'integer'],
            [['full_name', 'avatar', 'cover'], 'string', 'max' => 255],
            ['birthday', 'datetime', 'format' => 'php:Y-m-d'],
            ['gender', 'default', 'value' => Constant::USER_GENDER_OTHER],
            [['gender'], 'in', 'range' => array_keys(Constant::genders())],
            ['locale', 'default', 'value' => Yii::$app->language],
            ['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
        ];
    }


    /**
     * @param $model
     * @return UserDb
     */
    public function setModel($model)
    {
        $this->email = $model->email;
        $this->phone = $model->phone;
        $this->full_name = $model->profile->full_name ?? '';
        $this->gender = $model->profile->gender ?? '';
        $this->birthday = $model->profile->birthday ?? '';
        $this->locale = $model->profile->locale ?? '';
        $this->model = $model;
        return $this->model;
    }

    /**
     * @return bool|null
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->model;
            $model->email = $this->email;
            $model->phone = $this->phone;
            if ($model->save()) {
                return $this->saveProfile();
            } else {
                throw new Exception('Model not saved with errors: ' . @json_encode($model->errors));
            }
        }
        return null;
    }

    /**
     * @return bool
     * @throws Exception
     */
    private function saveProfile()
    {
        $model = Profile::find()->where(['user_id' => $this->model->id])->one();
        $model->full_name = $this->full_name;
        $model->gender = $this->gender;
        $model->birthday = $this->birthday;
        $model->locale = $this->locale;
        if ($model->save()) {
            return true;
        } else {
            throw new Exception('Model Profile not saved with errors: ' . @json_encode($model->errors));
        }
    }
}