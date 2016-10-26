@extends('layout.blank')

@section('title', 'Detalhes do Livro')

@section('content')

@include('Index.menu')

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <div class="alert alert-danger">
                <h2>
                    <i class="fa fa-meh-o"></i> Não foi possível localizar a publicação ...
                </h2>
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
