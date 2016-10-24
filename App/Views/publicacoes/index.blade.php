<!--
 * @view publicacoes/index.blade.php
 * @created at 20-10-2016 16:12:40
 * - Criado Automaticamente pelo HTR Assist
 -->

@extends('layout.default')

@section('title', 'Lista de Publicações')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3>Publicações</h3>
                <i class="fa fa-list"></i> Lista de Publicações<br>
                <a href="{{$controller}}novo/" class="btn btn-info">
                    <i class="fa fa-plus"></i> Novo Registro
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título da Obra</th>
                            <th>Ano</th>
                            <th>Editora</th>
                            <th>Edição</th>
                            <th>ISBN</th>
                            <th>Palavras Chaves</th>
                            <th>Qtd de Páginas</th>
                            <th>Idiomas</th>
                            <th>Categorias</th>
                            <th>Tipo Publicação</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $value)
                        <tr>
                            <td>{{$value['titulo']}}</td>
                            <td>{{$value['ano']}}</td>
                            <td>{{$value['editora']}}</td>
                            <td>{{$value['edicao']}}</td>
                            <td>{{$value['isbn']}}</td>
                            <td>{{$value['palavras_chave']}}</td>
                            <td>{{$value['numero_pagias']}}</td>
                            <td>{{$value['nome_idioma']}}</td>
                            <td>{{$value['nome_categoria']}}</td>
                            <td>{{$value['nome_tipos']}}</td>
                            <td>
                                <a href="{{$controller}}editar/id/{{$value['id_p']}}" class="btn btn-success">
                                    <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Editar"></i> 
                                </a>
                                <a href="#"
                                   onclick="confirmar('Deseja REMOVER este registro?', '{{$controller}}eliminar/id/{{$value['id_p']}}')"
                                   class="btn btn-danger">
                                    <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Eliminar"></i> 
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (isset($btn['link'][1]))
                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="{{$controller}}visualizar/pagina/{{$btn['previus']}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @foreach ($btn['link'] as $value)
                        <li><a href="{{$controller}}visualizar/pagina/{{$value}}">{{$value}}</a></li>
                        @endforeach
                        <li>
                            <a href="{{$controller}}visualizar/pagina/{{$btn['next']}}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                @endif

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection