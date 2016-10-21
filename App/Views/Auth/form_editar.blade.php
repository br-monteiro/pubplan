@extends('layout.default')

@section('title', 'Editar Registro')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="page-header">Formulário de edição de registro</h5>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-table fa-fw"></i> Editando Registro
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="resultado"></div>
                        <form action="{{$controller}}altera/" method="post" id="form">
                            {!!$token!!}
                            <input type="hidden" name="id" value="{{$result['id']}}">
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
                                               value="{{$result['username']}}"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password"
                                               class="form-control"
                                               name="password"
                                               maxlength="20"
                                               placeholder="Senha de Acesso - Password"
                                               id="password">
                                        <p class="help-block" style="color: red;">* Altere este campo apenas se for necessário.</p>
                                    </div>

                                    <div class="form-group"
                                         @if ($userLoggedIn['level'] != 1)
                                         style="display:none;"
                                         @endif
                                         >
                                         <label>Nível de Acesso</label>
                                        <select name="level"
                                                id="level"
                                                class="form-control"
                                                required>
                                            <option value="1"
                                                    @if ($result['level'] == 1)
                                                    selected
                                                    @endif
                                                    >1-Administrador</option>
                                            <option value="2"
                                                    @if ($result['level'] == 2)
                                                    selected
                                                    @endif
                                                    >2-Normal</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group"
                                         @if ($userLoggedIn['level'] != 1)
                                         style="display:none;"
                                         @endif
                                         >
                                         <label>Nome do Usuário</label>
                                        <input type="text"
                                               class="form-control"
                                               name="name"
                                               maxlength="20"
                                               placeholder="Nome do Usuário Responsável"
                                               id="name"
                                               value="{{$result['name']}}"
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
                                               value="{{$result['email']}}"
                                               required>
                                        <p class="help-block"
                                           @if ($userLoggedIn['level'] != 1)
                                           style="display:none;"
                                           @endif
                                           >&nbsp;</p>
                                    </div>

                                    <div class="form-group"
                                         @if ($userLoggedIn['level'] != 1)
                                         style="display:none;"
                                         @endif
                                         >
                                         <label>Usuário ativo?</label>
                                        <select name="active"
                                                id="active"
                                                class="form-control"
                                                required>
                                            <option value="1"
                                                    @if ($result['active'] == 1)
                                                    selected
                                                    @endif
                                                    >1-Sim</option>
                                            <option value="2"
                                                    @if ($result['active'] == 2)
                                                    selected
                                                    @endif
                                                    >2-Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-primary"><i class="fa fa-check"></i> Alterar</button>
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