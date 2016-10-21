<!-- jQuery -->
<script src="{{ATTACH}}jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ATTACH}}bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ATTACH}}metisMenu/dist/metisMenu.min.js"></script>

<!-- Mask Plugin JavaScript -->
<script src="{{ATTACH}}jqueryMask/jquery.mask.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="{{DIRJS_}}sb-admin-2.js"></script>
<!-- Script padrão de envio de formulário -->
<script type="text/javascript">
    function resetForm(){
        document.getElementById("form").reset();
        setInterval("clearMsg()",2000);
    }
    
    function clearMsg(){
        $(".resultado").empty();
    }
    
    function focusOn(idCampo){
        //document.getElementsById(nameCampo).focus();
        document.getElementById(idCampo).focus();
    }
    
    function confirmar(texto, url){
        if(confirm(texto)){
            window.location = url;
        }
    }

    $(document).ready(function() {
        $('#form').submit(function() {
            
            var dados = $(this).serialize();

            $(".resultado").html("<i class='fa fa-spinner fa-spin'></i> Enviando...<span class='sr-only'>Enviando...</span>");
            
            $.ajax({
                type: "POST", // Tipo de metodo
                url: $(this).attr("action"), //Recebe o valor da action do form
                data: dados,
                success: function(data) //Se tiver sucesso...
                {
                    $(".resultado").html(data);
                }
            });
            return false;
        });
        //Requisita
    });
</script>