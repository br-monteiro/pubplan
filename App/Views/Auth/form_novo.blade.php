@extends('layout.default')

@section('title', 'Formulário de cadastro de usuários')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="page-header">Formulário de cadastro de Usuário</h5>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-table fa-fw"></i> Novo Usuário
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="resultado"></div>
                        <form action="{{$controller}}registra/" method="post" id="form">
                            {!!$token!!}
                            <input type="hidden" name="id">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Login</label>
                                        <input type="text"
                                               class="form-control"
                                               name="username"
                                               maxlength="10"
                                               placeholder="Login do Usuário - Username"
                                               id="username"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password"
                                               class="form-control"
                                               name="password"
                                               maxlength="20"
                                               placeholder="Senha de Acesso - Password"
                                               id="password"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label>Nível de Acesso</label>
                                        <select name="level"
                                                id="level"
                                                class="form-control"
                                                required>
                                            <option value="1">1-Administrador</option>
                                            <option value="2">2-Normal</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Nome do Usuário</label>
                                        <input type="text"
                                               class="form-control"
                                               name="name"
                                               maxlength="20"
                                               placeholder="Nome do Usuário Responsável"
                                               id="name"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label>E-mail do Usuário</label>
                                        <input type="email"
                                               class="form-control"
                                               name="email"
                                               maxlength="100"
                                               placeholder="E-mail do Usuário Responsável"
                                               id="email"
                                               required>
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