<?php $this->beginContent('@backend/views/layouts/base.php'); ?>
    <?= \common\widgets\Alert::widget() ?>
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
<!--        <i class="fas fa-5x fa-spinner fa-spin"></i>-->
        <img class="animation__shake" src="/images/logo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <?= $this->render('header') ?>
    <?= $this->render('sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $content ?>
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <?= $this->render('footer') ?>
<?php $this->endContent(); ?>