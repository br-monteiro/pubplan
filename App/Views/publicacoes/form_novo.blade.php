<!--
 * @view publicacoes/form_novo.blade.php
 * @created at 20-10-2016 16:12:40
 * - Criado Automaticamente pelo HTR Assist
 -->

@extends('layout.default')

@section('title', 'Inserção de Publicacoes')

@section('content')
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
                        <form action="{{$controller}}registra/" method="post" id="form">
                            {!!$token!!}
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
                                           @foreach ($resultIdiomas as $value)
                                           <option value="{{$value['id']}}">
                                               {{$value['nome']}}
                                           </option>
                                           @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Categorias</label>
                                    <select 
                                           id="categorias_id"
                                           name="categorias_id"
                                           class="form-control"
                                           required>
                                           @foreach ($resultCategorias as $value)
                                           <option value="{{$value['id']}}">
                                               {{$value['nome']}}
                                           </option>
                                           @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Tipo Publicação</label>
                                    <select 
                                           id="tipos_id"
                                           name="tipos_id"
                                           class="form-control"
                                           required>
                                           @foreach ($resultTipos as $value)
                                           <option value="{{$value['id']}}">
                                               {{$value['nome']}}
                                           </option>
                                           @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Imagem do Livro</label>
                                    <input type="file" name="imglivro" class="form-control">
                                </div>

                                <div class="form-group">
                                    <br>
                                    <button class="btn btn-primary"><i class="fa fa-check"></i> Registrar</button>
                                    <a href="{{$controller}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Voltar</a>
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
@endsection