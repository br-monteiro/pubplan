<!--
 * @view  publicacoes/form_editar.blade.php
 * @created  at 20-10-2016 16:12:40
 * - Criado Automaticamente pelo HTR Assist
 -->



<?php $__env->startSection('title', 'Inserção de Publicacoes'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">Formulário de edição de Publicacoes</h4>
                
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
                        <form action="<?php echo e($controller); ?>altera/" method="post" id="form" enctype="multipart/form-data">
                            <?php echo $token; ?>

                            <input type="hidden" name="id" value="<?php echo e($result['id']); ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Título da Obra</label>
                                    <input type="text"
                                           id="titulo"
                                           name="titulo"
                                           placeholder="Título da Obra"
                                           class="form-control"
                                           value="<?php echo e($result['titulo']); ?>"
                                           maxlength="100"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Ano</label>
                                    <input type="text"
                                           id="ano"
                                           name="ano"
                                           placeholder="Ano"
                                           class="form-control"
                                           value="<?php echo e($result['ano']); ?>"
                                           maxlength="4"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Editora</label>
                                    <input type="text"
                                           id="editora"
                                           name="editora"
                                           placeholder="Editora"
                                           class="form-control"
                                           value="<?php echo e($result['editora']); ?>"
                                           maxlength="45"
                                           >
                                </div>
                                <div class="form-group">
                                    <label>Edição</label>
                                    <input type="text"
                                           id="edicao"
                                           name="edicao"
                                           placeholder="Edição"
                                           class="form-control"
                                           value="<?php echo e($result['edicao']); ?>"
                                           maxlength="20"
                                           >
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text"
                                           id="isbn"
                                           name="isbn"
                                           placeholder="ISBN"
                                           class="form-control"
                                           value="<?php echo e($result['isbn']); ?>"
                                           maxlength="45"
                                           >
                                </div>
                                
                                <div class="form-group">
                                    <label>Sinopse</label>
                                    <textarea id="sinopse"
                                           name="sinopse"
                                           placeholder="Sinopse"
                                           class="form-control"
                                           rows="3"><?php echo e($result['sinopse']); ?></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Palavras Chaves</label>
                                    <input type="text"
                                           id="palavras_chave"
                                           name="palavras_chave"
                                           placeholder="Palavras Chaves"
                                           class="form-control"
                                           value="<?php echo e($result['palavras_chave']); ?>"
                                           maxlength="100"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Quantidade de Páginas</label>
                                    <input type="text"
                                           id="numero_pagias"
                                           name="numero_pagias"
                                           placeholder="Quantidade de Páginas"
                                           class="form-control"
                                           value="<?php echo e($result['numero_pagias']); ?>"
                                           maxlength="4"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Idiomas</label>
                                    <select 
                                           id="idiomas_id"
                                           name="idiomas_id"
                                           class="form-control"
                                           required>
                                           <?php $__currentLoopData = $resultIdiomas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <option value="<?php echo e($value['id']); ?>"
                                               <?php if($result['idiomas_id'] == $value['id']): ?>
                                                   selected
                                               <?php endif; ?>
                                               >
                                               <?php echo e($value['nome']); ?>

                                           </option>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Categorias</label>
                                    <select 
                                           id="categorias_id"
                                           name="categorias_id"
                                           class="form-control"
                                           required>
                                           <?php $__currentLoopData = $resultCategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <option value="<?php echo e($value['id']); ?>"
                                               <?php if($result['categorias_id'] == $value['id']): ?>
                                                   selected
                                               <?php endif; ?>
                                               >
                                               <?php echo e($value['nome']); ?>

                                           </option>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tipo Publicação</label>
                                    <select 
                                           id="tipos_id"
                                           name="tipos_id"
                                           class="form-control"
                                           required>
                                           <?php $__currentLoopData = $resultTipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                           <option value="<?php echo e($value['id']); ?>"
                                               <?php if($result['tipos_id'] == $value['id']): ?>
                                                   selected
                                               <?php endif; ?>
                                               >
                                               <?php echo e($value['nome']); ?>

                                           </option>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Imagem do Livro</label>
                                    <input type="file" name="imglivro" class="form-control">
                                </div>

                                <div class="form-group">
                                    <br>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Registrar</button>
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