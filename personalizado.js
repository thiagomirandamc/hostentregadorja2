$(function(){
    $("#pesquisa").keyup(function(){
        //recuperar o valor do campo
        var pesquisa = $(this).val();
        
        //verificar se ha algo digitado
        if(pesquisa != ''){
           var dados = {
            nomeclienteoportunidade : pesquisa
        }
        $.post('proc_pesq_oport.php', dados, function(retorna) {
            $(".resultado").html(retorna);
    
            
            });
        
        
        }

    });
    });