<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Publicações Seplan</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{APPDIR}}">Home</a></li>
                <li><a href="#about">Seplan</a></li>
                <li><a href="#contact">Contatos</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{APPDIR}}publicacoes/"><i class="fa fa-lock"></i> Login</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" id="search" class="form-control" onkeypress="busca()" placeholder="Pesquisa...">
            </form>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->

@section('scripts')  
   $('.lista-resultado').load('{{APPDIR}}index/busca/pagina/<?= $numPag ? : 1;?>');
   
$('#search').on('keypress', function() {
   $('.lista-resultado').load('{{APPDIR}}index/busca/por/' + $('#search').val());
});

@endsection
