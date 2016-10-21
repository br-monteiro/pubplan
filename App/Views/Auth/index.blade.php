@extends('layout.default')

@section('title', 'Lista de todos os usuários')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3>Usuários Cadastrados</h3>
                <i class="fa fa-list"></i> Lista de usuários<br>
                <a href="{{$controller}}novo/" class="btn btn-info">
                    <i class="fa fa-plus"></i> Novo Registro
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Nível</th>
                            <th>Criado</th>
                            <th>Alterado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $value)
                        <tr>
                            <td>{{$value['id']}}</td>
                            <td>{{$value['name']}}</td>
                            <td>{{$value['level']}}</td>
                            <td>{{date('d-m-Y H:i:s', $value['created_at'])}}</td>
                            <td>{{date('d-m-Y H:i:s', $value['updated_at'])}}</td>
                            <td>
                                <a href="{{$controller}}editar/id/{{$value['id']}}" class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#"
                                   onclick="confirmar('Deseja REMOVER este registro?', '{{$controller}}eliminar / id/{{$value['id']}}')"
                                   class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav>
                    <ul class="pagination">
                        <li>
                            <a href="{{$controller}}ver/pagina/{{$btn['previus']}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @foreach ($btn['link'] as $value)
                        <li><a href="{{$controller}}ver/pagina/{{$value}}">{{$value}}</a></li>
                        @endforeach
                        <li>
                            <a href="{{$controller}}ver/pagina/{{$btn['next']}}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection