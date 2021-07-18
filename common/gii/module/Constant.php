<?php


namespace common\gii\module;


class Constant
{
    const EXTRA_FILE_MODEL = 'model';
    const EXTRA_FILE_ASSET = 'asset';
    const EXTRA_FILE_SERVICE = 'service';
    const EXTRA_FILE_REPOSITORY = 'repository';
    const EXTRA_FILE_CONSTANT = 'constant';
    const EXTRA_FILE_HELPER = 'helper';
    const EXTRA_FILE_ABSTRACT = 'abstract';
    const EXTRA_FILE_INTERFACE = 'interface';
    const EXTRA_FILE_TRAIT = 'trait';
    const EXTRA_FILE_WIDGET = 'widget';

    public static function listExtraFiles() {
        return [
            self::EXTRA_FILE_MODEL => 'model',
            self::EXTRA_FILE_ASSET => 'asset',
            self::EXTRA_FILE_SERVICE => 'service',
            self::EXTRA_FILE_REPOSITORY => 'repository',
            self::EXTRA_FILE_CONSTANT => 'constant',
            self::EXTRA_FILE_HELPER => 'helper',
            self::EXTRA_FILE_ABSTRACT => 'abstract',
            self::EXTRA_FILE_INTERFACE => 'interface',
            self::EXTRA_FILE_TRAIT => 'trait',
            self::EXTRA_FILE_WIDGET => 'widget',
        ];
    }
}