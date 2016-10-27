<?php
$i = 0;
$qtdPublicacaoes = 0;
$contador = 0;
$qtdPublicacaoes = count($resultPublicacoes);

foreach ($resultPublicacoes as $value):

    //$modPulicacacoes = $qtdPublicacaoes % 4;
    ++$contador;

    if ($i == 0) {
        echo "<div class=\"row\">";
    }
    $i++;
    ?>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <a href="{{APPDIR}}index/detalhes/id/{{$value['id']}}/titulo/{{$value['titulo']}}">
                <img src="images/uploads/{{$value['id']}}.jpg" alt="{{$value['titulo']}}" width="100" height="100">
            </a>
        </div>
        <div class="caption">
            <a href="{{APPDIR}}index/detalhes/id/{{$value['id']}}/titulo/{{$value['titulo']}}">
                <h4>{{$value['titulo']}}</h4>
            </a>
        </div>
    </div>
    <?php
    if ($contador == $qtdPublicacaoes) {
        echo "</div>";
        break;
    }
    if ($i == 4) {
        echo "</div>";
        $i = 0;
    }
endforeach;
?>

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

