@extends('layout.default')

@section('title', 'Alterar a senha')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="page-header">Alterar a senha</h5>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-table fa-fw"></i> Mudando a Senha Padrão
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="resultado"></div>
                        <form action="{{$controller}}mudandosenha/" method="post" id="form">
                            {!!$token!!}
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Nova Senha</label>
                                        <input type="password"
                                               class="form-control"
                                               name="password"
                                               placeholder="Insira a Nova Senha"
                                               id="password"
                                               required>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-primary"><i class="fa fa-check"></i> Alterar</button>
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