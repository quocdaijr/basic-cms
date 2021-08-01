<?php


namespace admin\constants;


class Constant
{
    const STATUS_USER_ACTIVE = 10;
    const STATUS_USER_INACTIVE = 20;
    const STATUS_USER_DELETED = 30;

    const USER_GENDER_MALE = 1;
    const USER_GENDER_FEMALE = 2;
    const USER_GENDER_OTHER = 3;

    const ROLE_USER = 'user';
    const ROLE_MANAGER = 'manager';
    const ROLE_ADMINISTRATOR = 'administrator';

    public static function statuses($type = 'user') {
        switch ($type) {
            case 'user':
            default:
            return [
                self::STATUS_USER_INACTIVE => t('admin', 'InActive'),
                self::STATUS_USER_ACTIVE => t('admin', 'Active'),
                self::STATUS_USER_DELETED => t('admin', 'Deleted')
            ];
        }
    }

    public static function genders() {
        return [
            self::USER_GENDER_MALE => t('admin', 'Male'),
            self::USER_GENDER_FEMALE => t('admin', 'Female'),
            self::USER_GENDER_OTHER => t('admin', 'Other')
        ];
    }
}