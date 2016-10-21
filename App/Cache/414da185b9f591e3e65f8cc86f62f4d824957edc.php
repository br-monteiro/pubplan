<!--
 * @view  idiomas/form_novo.blade.php
 * @created  at 20-10-2016 16:07:32
 * - Criado Automaticamente pelo HTR Assist
 -->



<?php $__env->startSection('title', 'Inserção de Idiomas'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">Formulário de cadastro de Idiomas</h4>
                
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-table fa-fw"></i> Formulário de Cadastro
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="resultado"></div>
                        <form action="<?php echo e($controller); ?>registra/" method="post" id="form">
                            <?php echo $token; ?>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text"
                                           id="nome"
                                           name="nome"
                                           placeholder="Informe o Nome do Idioma"
                                           class="form-control"
                                           maxlength="45"
                                           >
                                </div>

                                <div class="form-group">
                                    <br>
                                    <button class="btn btn-primary"><i class="fa fa-check"></i> Registrar</button>
                                    <a href="<?php echo e($controller); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>