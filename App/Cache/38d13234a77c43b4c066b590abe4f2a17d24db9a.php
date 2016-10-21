<?php $__env->startSection('title', 'Home do sistema'); ?>

<?php $__env->startSection('content'); ?>
<body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Publicações Seplan</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">Seplan</a></li>
                    <li><a href="#contact">Contatos</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="auth/login"><i class="fa fa-lock"></i> Login</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

        <div class="row row-offcanvas row-offcanvas-right">

            <div class="col-xs-12 col-sm-9">                
                
                    <!--Meu Carousel-->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img class="first-slide" src="images/Diário de Anne Frank.jpg" alt="1º Livro" width="150" height="200">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver mais</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img class="second-slide" src="images/Da Sabedoria Clássica à Popular.jpg" alt="2º Livro" width="150" height="200">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver mais</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img class="third-slide" src="images/Cônicas e Quádricas.jpg" alt="3º Livro" width="150" height="200">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver mais</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="fa fa-arrow-circle-o-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="fa fa-arrow-circle-o-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div><!-- /.carousel -->

                <div class="row">
                    <?php $__currentLoopData = $resultPublicacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="images/<?php echo e($value['titulo']); ?>.jpg" alt="<?php echo e($value['titulo']); ?>" width="100" height="100">
                        <div class="caption">
                          <h3><?php echo e($value['titulo']); ?></h3>
                          <p><?php echo e($value['sinopse']); ?></p>
                        <p><a class="btn btn-default" href="#" role="button">Ver Detalhes &raquo;</a></p>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                  </div>
                
            </div><!--/.col-xs-12.col-sm-9-->

            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                <div class="list-group">
                    <a href="#" class="list-group-item active">Categorias</a>
                    <?php $__currentLoopData = $resultCategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <a href="#" class="list-group-item"><?php echo e($value['nome']); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            </div><!--/.sidebar-offcanvas-->
        </div><!--/row-->

        <hr>

        <footer>
            <p>&copy; Secretaria de Planejamento do Estado do Pará.</p>
        </footer>

    </div><!--/.container-->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>