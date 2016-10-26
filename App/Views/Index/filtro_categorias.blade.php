@extends('layout.blank')

@section('title', 'Home do sistema')

@section('content')

@include('Index.menu')

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
                    @foreach ($resultCarousel as $value)
                    <div class="item {{$active}}">
                        <img class="{{$firstSlide}}" src="{{APPDIR}}images/uploads/{{$value['id']}}.jpg" alt="{{$value['titulo']}}">
                        <div class="container">
                            <div class="carousel-caption">
                                <p><a class="btn btn-lg btn-primary" href="{{APPDIR}}index/detalhes/id/{{$value['id']}}" role="button">Ver mais</a></p>
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
                @foreach ($PublicacoesPorCategoria as $value)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{APPDIR}}images/uploads/{{$value['id']}}.jpg" alt="{{$value['titulo']}}" width="100" height="100">
                    </div>
                    <div class="caption">
                        <h3>{{$value['titulo']}}</h3>
                        <p><a class="btn btn-success" href="{{APPDIR}}index/detalhes/id/{{$value['id']}}" role="button">Ver Detalhes &raquo;</a></p>
                    </div>
                </div>
                @endforeach
            </div>

        </div><!--/.col-xs-12.col-sm-9-->
        @include('Index.lista_categorias')
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; Secretaria de Planejamento do Estado do Pará.</p>
    </footer>

</div><!--/.container-->
@endsection

@section('styles')
    <!-- Bootstrap Core CSS -->
    <link href="{{DIRCSS}}offcanvas.css" rel="stylesheet">

    <link href="{{DIRCSS}}carousel.css" rel="stylesheet">
@endsection

