@extends('layout.blank')

@section('title', 'Detalhes do Livro')

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

            <div class="page-header">
                <h1>{{$resultPublicacao['titulo']}}</h1>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-4 text-center">
                    <div class="thumbnail">
                        <img src="{{APPDIR}}images/uploads/{{$resultPublicacao['id']}}.jpg" alt="" width="235" height="300">
                        <div class="btn-group" style="margin-top: 10px;" role="group" aria-label="selecione...">
                            <a href="{{APPDIR}}" class="btn btn-primary">
                                <i class="fa fa-mail-reply"></i> Retornar
                            </a>
                            <a href="{{$resultPublicacao['link'] or APPDIR . 'files_uploads/' . $resultPublicacao['id'] . '.pdf'}}" class="btn btn-warning">
                                <i class="fa fa-book"></i> Ler Publicação
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-6 ">
                    <label>Ano</label>
                    <p style="text-justify">{{$resultPublicacao['ano']}}</p>
                    <label>Editora</label>
                    <p style="text-justify">{{$resultPublicacao['editora']}}</p>
                    <label>Edição</label>
                    <p style="text-justify">{{$resultPublicacao['edicao']}}</p>
                    <label>ISBN</label>
                    <p style="text-justify">{{$resultPublicacao['isbn']}}</p>
                    <label>Quantidade de Páginas</label>
                    <p style="text-justify">{{$resultPublicacao['numero_pagias']}}</p>
                    <label>Palavras-Chaves</label>
                    <p style="text-justify">{{$resultPublicacao['palavras_chave']}}</p>
                </div>
            </div>
            <label>Sinopse</label>
            <p class="text-justify">
                {{$resultPublicacao['sinopse']}}
            </p>
        </div><!--/.col-xs-12.col-sm-9-->

        @include('Index.lista_categorias')

    </div><!--/row-->

    <hr>
    <footer>
        <p>&copy; Secretaria de Planejamento do Estado do Pará.</p>
    </footer>

</div><!--/.container-->
@endsection
