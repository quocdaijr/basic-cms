<?php


namespace common\gii\module;


use yii\gii\CodeFile;
use yii\gii\generators\module\Generator as ModuleGenerator;
use yii\helpers\StringHelper;

class Generator extends ModuleGenerator
{
    public $templates = [
        'advanced' => '@common/gii/module/templates/advanced',
    ];
    public $template = 'advanced';

    public $templateName = null;

    public $extraFiles;

    public $migrationName = '_init';

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['extraFiles'], 'safe'],
        ]);
    }

    public function getName()
    {
        return 'Advanced Module Generator';
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'This generator helps you to generate the skeleton code needed by a Advanced Yii module.';
    }

    public function requiredTemplates()
    {
        return array_merge(parent::requiredTemplates(), ['config.php']);
    }

    public function generate()
    {
        if (empty($this->templateName))
            $this->templateName = ucfirst($this->moduleID);

        $this->extraFiles = (array)$this->extraFiles;

        $files = [];
        $modulePath = $this->getModulePath();
        $files[] = new CodeFile(
            $modulePath . '/config/config.php',
            $this->render("config.php")
        );

        $files[] = new CodeFile(
            $modulePath . '/' . StringHelper::basename($this->moduleClass) . '.php',
            $this->render("module.php")
        );
        $files[] = new CodeFile(
            $modulePath . '/controllers/' . $this->getTemplateName() . 'Controller.php',
            $this->render("controller.php")
        );
        $files[] = new CodeFile(
            $modulePath . '/views/' . strtolower($this->getTemplateName()) . '/index.php',
            $this->render("view.php")
        );

        if (in_array('model', $this->extraFiles)) {
            $files[] = new CodeFile(
                $modulePath . '/models/' . $this->getTemplateName() . '.php',
                $this->render("model.php")
            );
            $this->migrationName = 'm' . date('ymd_000000') . '_init_' . strtolower($this->getTemplateName());
            $files[] = new CodeFile(
                $modulePath . '/migrations/' . $this->migrationName . '.php',
                $this->render("migration.php")
            );
        }

        if (in_array('asset', $this->extraFiles))
            $files[] = new CodeFile(
                $modulePath . '/assets/' . $this->getTemplateName() . 'Asset.php',
                $this->render("asset.php")
            );

        if (in_array('service', $this->extraFiles)) {
            $files[] = new CodeFile(
                $modulePath . '/components/services/' . $this->getTemplateName() . 'ServiceProvider.php',
                $this->render("service_provider.php")
            );
            $files[] = new CodeFile(
                $modulePath . '/components/services/DbService.php',
                $this->render("db_service.php")
            );
        }

        if (in_array('repository', $this->extraFiles)) {
            $files[] = new CodeFile(
                $modulePath . '/components/repositories/' . $this->getTemplateName() . 'RepositoryProvider.php',
                $this->render("repository_provider.php")
            );
            $files[] = new CodeFile(
                $modulePath . '/components/repositories/DbRepository.php',
                $this->render("db_repository.php")
            );
        }

        if (in_array('constant', $this->extraFiles))
            $files[] = new CodeFile(
                $modulePath . '/constants/Constant.php',
                $this->render("constant.php")
            );

        if (in_array('helper', $this->extraFiles))
            $files[] = new CodeFile(
                $modulePath . '/helpers/Helper.php',
                $this->render("helper.php")
            );

        if (in_array('trait', $this->extraFiles))
            $files[] = new CodeFile(
                $modulePath . '/traits/' . $this->getTemplateName() . 'Trait.php',
                $this->render("trait.php")
            );

        if (in_array('abstract', $this->extraFiles))
            $files[] = new CodeFile(
                $modulePath . '/abstracts/' . $this->getTemplateName() . 'Abstract.php',
                $this->render("abstract.php")
            );

        if (in_array('interface', $this->extraFiles))
            $files[] = new CodeFile(
                $modulePath . '/interfaces/' . $this->getTemplateName() . 'Interface.php',
                $this->render("interface.php")
            );

        return $files;
    }

    public function getTemplateName()
    {
        if (empty($this->templateName))
            $this->templateName = ucfirst($this->moduleID);
        return $this->templateName;
    }

    public function getAssetPath()
    {
        return '@' . str_replace('\\', '/', substr($this->moduleClass, 0, strrpos($this->moduleClass, '\\'))) . '/assets';
    }
    
    /**
     * @return string the assets namespace of the module.
     */
    public function getModuleNamespace()
    {
        return substr($this->moduleClass, 0, strrpos($this->moduleClass, '\\'));
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getModelNamespace()
    {
        return $this->getModuleNamespace() . '\models';
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getAssetNamespace()
    {
        return $this->getModuleNamespace() . '\assets';
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getComponentNamespace()
    {
        return $this->getModuleNamespace() . '\components';
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getServiceNamespace()
    {
        return $this->getModuleNamespace() . '\components\services';
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getRepositoryNamespace()
    {
        return $this->getModuleNamespace() . '\components\repositories';
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getConstantNamespace()
    {
        return $this->getModuleNamespace() . '\constants';
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getHelperNamespace()
    {
        return $this->getModuleNamespace() . '\helpers';
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getAbstractNamespace()
    {
        return $this->getModuleNamespace() . '\abstracts';
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getInterfaceNamespace()
    {
        return $this->getModuleNamespace() . '\interfaces';
    }

    /**
     * @return string the assets namespace of the module.
     */
    public function getTraitNamespace()
    {
        return $this->getModuleNamespace() . '\traits';
    }

    /**
     * @return bool service is generated in the module.
     */
    public function isServiceGenerated() {
        return in_array(Constant::EXTRA_FILE_SERVICE, $this->extraFiles);
    }

    /**
     * @return bool repository is generated in the module.
     */
    public function isRepositoryGenerated() {
        return in_array(Constant::EXTRA_FILE_REPOSITORY, $this->extraFiles);
    }

    public function getMigrationName(){
        return $this->migrationName;
    }
}