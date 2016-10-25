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
                <div class="col-xs-6 col-md-3">
                    <img src="../../../images/uploads/{{$resultPublicacao['id']}}" alt="...">                  
                </div>
            </div>

        </div><!--/.col-xs-12.col-sm-9-->
        
    </div><!--/row-->

    <hr>
    <footer>
        <p>&copy; Secretaria de Planejamento do Estado do Pará.</p>
    </footer>

</div><!--/.container-->
@endsection
