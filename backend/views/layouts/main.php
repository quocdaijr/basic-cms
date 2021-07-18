<?php

use yii\bootstrap4\Breadcrumbs;

?>

<?php $this->beginContent('@backend/views/layouts/common.php'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php echo Breadcrumbs::widget([
                        'options' => [
                            'class' => 'breadcrumb float-sm-left'
                        ],
                        'links' => $this->params['breadcrumbs'] ?? [],
                    ]) ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
<!--            <div class="row">-->
               <?=$content?>
<!--            </div>-->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php $this->endContent(); ?>