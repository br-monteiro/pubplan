@extends('layout.blank')

@section('title', 'Home do sistema')

@section('content')
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
                <li><a href="{{APPDIR}}publicacoes/"><i class="fa fa-lock"></i> Login</a></li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">

            <!--Meu Carousel-->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner" role="listbox">
                    <?php
                        $i = false; 
                        $active = 'active';
                        $firstSlide = 'first-slide';
                    ?>
                    @foreach ($resultPublicacoes as $value)
                    <div class="item {{$active}}">
                        <img class="{{$firstSlide}}" src="images/uploads/{{$value['id']}}.jpg" alt="{{$value['titulo']}}">
                        <div class="container">
                            <div class="carousel-caption">
                                <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver mais</a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        if (!$i) {
                            $i = true;
                            $active = null;
                            $firstSlide = null;
                        }
                    ?>
                    @endforeach
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
                @foreach ($resultPublicacoes as $value)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="images/uploads/{{$value['id']}}.jpg" alt="{{$value['titulo']}}" width="100" height="100">
                    </div>
                    <div class="caption">
                        <h3>{{$value['titulo']}}</h3>
                        <p><a class="btn btn-default" href="{{APPDIR}}index/detalhes/id/{{$value['id']}}" role="button">Ver Detalhes &raquo;</a></p>
                    </div>
                </div>
                @endforeach
            </div>

        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="#" class="list-group-item active">Categorias</a>
                @foreach ($resultCategorias as $value)
                <a href="#" class="list-group-item">{{$value['nome']}}</a>
                @endforeach
            </div>
        </div><!--/.sidebar-offcanvas-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; Secretaria de Planejamento do Estado do Pará.</p>
    </footer>

</div><!--/.container-->
@endsection
