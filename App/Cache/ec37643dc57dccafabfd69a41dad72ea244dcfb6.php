<!--
 * @view  publicacoes/form_novo.blade.php
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
                <h4 class="page-header">Formulário de cadastro de Publicacoes</h4>
                
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
                                    <label>Título da Obra</label>
                                    <input type="text"
                                           id="titulo"
                                           name="titulo"
                                           placeholder="Título da Obra"
                                           class="form-control"
                                           maxlength="100"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Ano</label>
                                    <input type="text"
                                           id="ano"
                                           name="ano"
                                           placeholder="Informe o Ano"
                                           class="form-control"
                                           maxlength="4"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Editora</label>
                                    <input type="text"
                                           id="editora"
                                           name="editora"
                                           placeholder="Informe a Editora"
                                           class="form-control"
                                           maxlength="45"
                                           >
                                </div>
                                <div class="form-group">
                                    <label>Edição</label>
                                    <input type="text"
                                           id="edicao"
                                           name="edicao"
                                           placeholder="Informe a Edição"
                                           class="form-control"
                                           maxlength="20"
                                           >
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text"
                                           id="isbn"
                                           name="isbn"
                                           placeholder="Informe o ISBN"
                                           class="form-control"
                                           maxlength="45"
                                           >
                                </div>
                                
                                <div class="form-group">
                                    <label>Sinopse</label>
                                    <textarea id="sinopse"
                                           name="sinopse"
                                           placeholder="Informe a Sinopse"
                                           class="form-control" rows="3"></textarea>
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
                                           <option value="<?php echo e($value['id']); ?>">
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
                                           <option value="<?php echo e($value['id']); ?>">
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
                                           <option value="<?php echo e($value['id']); ?>">
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