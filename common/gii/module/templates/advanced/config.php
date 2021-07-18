<?php
/**
 * This is the template for generating a config file within a module.
 */


/* @var $generator \common\gii\module\Generator */

echo "<?php\n";
?>
use common\constants\BaseConstant;

return [
    'components' => [
    <?php if ($generator->isServiceGenerated()) {?>

        '<?= strtolower($generator->getTemplateName())?>Service' => [
            'class' => '\<?= $generator->getServiceNamespace()?>\<?=$generator->getTemplateName()?>ServiceProvider',
            'type' => BaseConstant::METHOD_DB
        ],
    <?php } ?>
    <?php if ($generator->isRepositoryGenerated()) {?>

        '<?= strtolower($generator->getTemplateName())?>Repository' => [
            'class' => '\<?= $generator->getRepositoryNamespace()?>\<?=$generator->getTemplateName()?>RepositoryProvider',
            'type' => BaseConstant::METHOD_DB
        ]
    <?php } ?>

    ]
];

