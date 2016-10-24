<!-- jQuery -->
<script src="{{ATTACH}}jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ATTACH}}bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ATTACH}}metisMenu/dist/metisMenu.min.js"></script>

<!-- Mask Plugin JavaScript -->
<script src="{{ATTACH}}jqueryMask/jquery.mask.min.js"></script>

<!-- jQuery Form Plugin JavaScript -->
<script src="{{ATTACH}}jqueryForm/jquery.form.js"></script>

<!-- Custom Theme JavaScript -->
<script src="{{DIRJS_}}sb-admin-2.js"></script>
<!-- Script padrão de envio de formulário -->
<script type="text/javascript">
function resetForm() {
    document.getElementById("form").reset();
    setInterval("clearMsg()", 8000);
}

function clearMsg() {
    $(".resultado").empty();
}

function focusOn(idCampo) {
    //document.getElementsById(nameCampo).focus();
    document.getElementById(idCampo).focus();
}

function confirmar(texto, url) {
    if (confirm(texto)) {
        window.location = url;
    }
}

(function () {
    var status = $(".resultado");

    $('#form').ajaxForm({
        beforeSend: function () {
            status.empty();
            status.html("<i class='fa fa-spinner fa-spin'></i> Enviando...<span class='sr-only'>Enviando...</span>");
        },
//        uploadProgress: function (event, position, total, percentComplete) {
//            var percentVal = percentComplete + '%';
//            bar.width(percentVal);
//            percent.html(percentVal);
//        },
//        success: function () {
//            var percentVal = '100%';
//            bar.width(percentVal);
//            percent.html(percentVal);
//        },
        complete: function (xhr) {
            status.html(xhr.responseText);
        }
    });
    
    @yield('scripts')

})();

</script>