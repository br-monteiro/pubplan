<!--
 * @view  autores/form_editar.blade.php
 * @created  at 20-10-2016 16:07:59
 * - Criado Automaticamente pelo HTR Assist
 -->



<?php $__env->startSection('title', 'Inserção de Autores'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">Formulário de edição de Autores</h4>
                
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-table fa-fw"></i> Formulário de Edição
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="resultado"></div>
                        <form action="<?php echo e($controller); ?>altera/" method="post" id="form">
                            <?php echo $token; ?>

                            <input type="hidden" name="id" value="<?php echo e($result['id']); ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text"
                                           id="nome"
                                           name="nome"
                                           placeholder="Nome do Autor"
                                           class="form-control"
                                           value="<?php echo e($result['nome']); ?>"
                                           maxlength="100"
                                           required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Biografia</label>
                                    <textarea class="form-control" rows="5" id="biografia"
                                           name="biografia"
                                           placeholder="Biografia do Autor"><?php echo e($result['biografia']); ?></textarea>
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