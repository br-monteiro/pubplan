@extends('layout.blank')

@section('title', 'Detalhes do Livro')

@section('content')

@include('layout.Partials.menu')

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
                            <a href="{{APPDIR}}publicacoes/ler/id/{{$resultPublicacao['id']}}/titulo/{{$resultPublicacao['titulo']}}" class="btn btn-warning">
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
                    <p style="text-justify">
                        @forelse ($resultTagsPublicacao as $tag)
                            <a href="{{APPDIR}}publicacoes/tags/busca/{{$tag}}">{{$tag}}</a>,
                        @empty
                            <i class="fa fa-meh-o"></i> sem palavras chave
                        @endforelse
                    </p>
                </div>
            </div>
            <label>Sinopse</label>
            <p class="text-justify">
                {{$resultPublicacao['sinopse']}}
            </p>
        </div><!--/.col-xs-12.col-sm-9-->

        @include('layout.Partials.lista_categorias')

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
