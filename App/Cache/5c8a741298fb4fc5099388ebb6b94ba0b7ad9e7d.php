<?php $__env->startSection('title', 'Lista de todos os usuários'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3>Usuários Cadastrados</h3>
                <i class="fa fa-list"></i> Lista de usuários<br>
                <a href="<?php echo e($controller); ?>novo/" class="btn btn-info">
                    <i class="fa fa-plus"></i> Novo Registro
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Nível</th>
                            <th>Criado</th>
                            <th>Alterado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($value['id']); ?></td>
                            <td><?php echo e($value['name']); ?></td>
                            <td><?php echo e($value['level']); ?></td>
                            <td><?php echo e(date('d-m-Y H:i:s', $value['created_at'])); ?></td>
                            <td><?php echo e(date('d-m-Y H:i:s', $value['updated_at'])); ?></td>
                            <td>
                                <a href="<?php echo e($controller); ?>editar/id/<?php echo e($value['id']); ?>" class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#"
                                   onclick="confirmar('Deseja REMOVER este registro?', '<?php echo e($controller); ?>eliminar / id/<?php echo e($value['id']); ?>')"
                                   class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="<?php echo e($controller); ?>ver/pagina/<?php echo e($btn['previus']); ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php $__currentLoopData = $btn['link']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><a href="<?php echo e($controller); ?>ver/pagina/<?php echo e($value); ?>"><?php echo e($value); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <li>
                            <a href="<?php echo e($controller); ?>ver/pagina/<?php echo e($btn['next']); ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

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