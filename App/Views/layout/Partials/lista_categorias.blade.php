<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
    <div class="list-group">
        <a href="#" class="list-group-item active">Categorias</a>
        @foreach ($resultCategorias as $value)
            <a href="{{APPDIR}}index/filtroCategoria/id/{{$value['id']}}/categoria/{{$value['nome']}}" class="list-group-item">{{$value['nome']}}</a>
        @endforeach
    </div>
</div><!--/.sidebar-offcanvas-->