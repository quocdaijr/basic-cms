<?php
use admin\components\MenuHelper;
use admin\components\Helper;
use admin\components\MenuWidget;

//@eval('$icon = \'<i class="fas fa-pencil-ruler"></i>\';');
//print_r($icon);exit();

$callback = function($menu){
    $icon = '<i class="nav-icon fas fa-link"></i>';
    if (!empty($menu['data'])) {
        @eval($menu['data']);
    }
    return [
        'label' => $menu['name'],
        'url' => [$menu['route']],
        'data' => @json_encode($menu),
        'icon' => $icon,
        'items' => $menu['children'],
        'options' => !empty($menu['children']) ? ["class" => "nav-item"] : []
    ];
};
$items = MenuHelper::getAssignedMenu(z()->user->id, null, $callback, true);

$items = Helper::filter($items ?? []);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; border-radius: 25%;">
        <span class="brand-text font-weight-light">CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?php
            echo MenuWidget::widget([
                'options'=>[
                    'class'=>'nav nav-pills nav-sidebar flex-column',
                    'data-widget' => 'treeview',
                    'role' => 'menu',
                    'data-accordion' => 'false'
                ],
                'parentRightIcon' => '<i class="right fas fa-angle-left"></i>',
                'linkTemplate' => '<a class="nav-link{active}" href="{url}">{icon} <p> {label} {right-icon}</p> {badge}</a>',
                'activeCssClass' => 'nav-item menu-is-opening menu-open',
                'submenuTemplate'=>"\n<ul class=\"nav nav-treeview\">\n{items}\n</ul>\n",
                'activateParents'=>true,
                'items' => $items
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
