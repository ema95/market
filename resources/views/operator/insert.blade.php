@extends('includes.layout')

@section('content')

<div class="row center_div">
    <h2>Inserisci un nuovo operatore</h2>
    
    <div class="col-xs-12">
       <form method="post" id="register-operator" action="operatore">    
        <div class="form-group">
            {{csrf_field()}}
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" placeholder="nome">

            <label>Cognome:</label>
            <input type="text" name="cognome" class="form-control" placeholder="cognome">

            <label>Codice fiscale:</label>
            <input id="cf" type="text" name="codiceFiscale" class="form-control" placeholder="CF">
            <p id="fail"></p>

            <label >Tipologia: </label>
            <select name="tipo" class="form-control">
                <option value="Assegnatario">Assegnatario</option>
                <option value="Spuntista">Spuntista</option>
            </select>  
            <button type="button" id="submitButton" value="register" class="form-control button_form">Registra nuovo operatore</button>

            <input id="cf" type="submit" class="form-control" value="submit">

            <p id="message" class="center_div"></p>

        </div>
    </form>

    <script>
$(document).ready(function(){
    $("#register-operator").on("click","button", function(){       
        $.ajax({    
            url:"operatore",
            type:"POST",
            data: $("#register-operator").serialize(),
            // dataType: 'JSON',
            success: function(data){
                var result=data['response'];
                if(result=="success"){
                    $("#message").html(data['message']);
                    $('#message').css('color', 'green');
                    $("#message").fadeIn("fast",function(){
                        $(this).delay(2000).fadeOut("slow");
                    });
                    document.getElementById("register-operator").reset();
                }else{
                    $("#message").html(data['message']);
                    $('#message').css('color', 'red');
                    $("#message").fadeIn("fast",function(){
                        $(this).delay(4000).fadeOut("slow");
                    });
                }

            }
        }); 
    });
});
</script>
@endsection