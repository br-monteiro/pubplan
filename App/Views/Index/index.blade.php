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
                        <img class="{{$firstSlide}}" src="images/uploads/{{$value['id']}}.jpg" alt="{{$value['titulo']}}">
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

            <?php
            $i = 0;
            $qtdPublicacaoes = 0;
            $contador = 0;
            $qtdPublicacaoes = count($resultPublicacoes);

            foreach ($resultPublicacoes as $value):

                //$modPulicacacoes = $qtdPublicacaoes % 4;
                ++$contador;

                if ($i == 0) {
                    echo "<div class=\"row\">";
                }
                $i++;
                ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <a href="{{APPDIR}}index/detalhes/id/{{$value['id']}}">
                            <img src="images/uploads/{{$value['id']}}.jpg" alt="{{$value['titulo']}}" width="100" height="100">
                        </a>
                    </div>
                    <div class="caption">
                        <a href="{{APPDIR}}index/detalhes/id/{{$value['id']}}">
                            <h4>{{$value['titulo']}}</h4>
                        </a>
                    </div>
                </div>
                <?php
                if ($contador == $qtdPublicacaoes) {
                    echo "</div>";
                    break;
                }
                if ($i == 4) {
                    echo "</div>";
                    $i = 0;
                }
            endforeach;
            ?>

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
