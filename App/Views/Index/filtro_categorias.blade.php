@extends('layout.blank')

@section('title', 'Home do sistema')

@section('content')

@include('layout.Partials.menu')

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <div class="row">
                @forelse ($resultPublicacoes as $value)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{APPDIR}}images/uploads/{{$value['id']}}.jpg" alt="{{$value['titulo']}}" width="100" height="100">
                    </div>
                    <div class="caption">
                        <h4>{{$value['titulo']}}</h4>
                        <p><a class="btn btn-success" href="{{APPDIR}}index/detalhes/id/{{$value['id']}}" role="button">Ver Detalhes &raquo;</a></p>
                    </div>
                </div>
                @empty
                <div class="col-sm-12 col-md-12">
                    <div class="alert alert-info">
                        <i class="fa fa-meh-o"></i> Nenhuma publicação localizada...
                    </div>
                </div>
                @endforelse
            </div>

        </div><!--/.col-xs-12.col-sm-9-->
        @include('layout.Partials.lista_categorias')
    </div><!--/row-->

    @if (isset($btn['link'][1]))
    <nav>
        <ul class="pagination">
            <li>
                <a href="{{$controller}}{{$action}}/{{$findBy}}/pagina/{{$btn['previus']}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @foreach ($btn['link'] as $value)
            <li><a href="{{$controller}}{{$action}}/{{$findBy}}/pagina/{{$value}}">{{$value}}</a></li>
            @endforeach
            <li>
                <a href="{{$controller}}{{$action}}/{{$findBy}}/pagina/{{$btn['next']}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    @endif
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

