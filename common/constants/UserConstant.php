<?php


namespace common\constants;


if (class_exists('backend\modules\user\constants\Constant')) {
    class UserConstant extends \backend\modules\user\constants\Constant
    {
    }
} else {

    class UserConstant
    {
        const STATUS_ACTIVE = 10;
        const STATUS_INACTIVE = 20;
        const STATUS_DELETED = 30;

        const USER_GENDER_MALE = 1;
        const USER_GENDER_FEMALE = 2;
        const USER_GENDER_OTHER = 3;

        const ROLE_USER = 'user';
        const ROLE_MANAGER = 'manager';
        const ROLE_ADMINISTRATOR = 'administrator';

        public static function statuses() {
            return [
                self::STATUS_INACTIVE => t('common', 'InActive'),
                self::STATUS_ACTIVE => t('common', 'Active'),
                self::STATUS_DELETED => t('common', 'Deleted')
            ];
        }

        public static function genders() {
            return [
                self::USER_GENDER_MALE => t('common', 'Male'),
                self::USER_GENDER_FEMALE => t('common', 'Female'),
                self::USER_GENDER_OTHER => t('common', 'Other')
            ];
        }

    }
}