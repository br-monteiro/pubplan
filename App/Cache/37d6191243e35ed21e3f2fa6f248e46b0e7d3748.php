<!--
 * @view  idiomas/index.blade.php
 * @created  at 20-10-2016 16:07:32
 * - Criado Automaticamente pelo HTR Assist
 -->



<?php $__env->startSection('title', 'Lista de Idiomas'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3>Idiomas</h3>
                <i class="fa fa-list"></i> Lista de Idiomas<br>
                <a href="<?php echo e($controller); ?>novo/" class="btn btn-info">
                    <i class="fa fa-plus"></i> Novo Registro
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($value['nome']); ?></td>
                            <td>
                                <a href="<?php echo e($controller); ?>editar/id/<?php echo e($value['id']); ?>" class="btn btn-success">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                                <a href="#"
                                   onclick="confirmar('Deseja REMOVER este registro?', '<?php echo e($controller); ?>eliminar/id/<?php echo e($value['id']); ?>')"
                                   class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>

                <?php if(isset($btn['link'][1])): ?>
                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="<?php echo e($controller); ?>visualizar/pagina/<?php echo e($btn['previus']); ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php $__currentLoopData = $btn['link']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><a href="<?php echo e($controller); ?>visualizar/pagina/<?php echo e($value); ?>"><?php echo e($value); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <li>
                            <a href="<?php echo e($controller); ?>visualizar/pagina/<?php echo e($btn['next']); ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php endif; ?>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>