@extends ('includes.layout')


@section('content')


<div class="row center_div">
	<div class="col-xs-12">
       <h2>Inserisci un nuovo mercato</h2>

               <form id="register-form" method="post" action="mercato">
                 {{csrf_field()}}
                  <div class="form-group">
                  
                  	<label> Data svolgimento mercato:</label>
                  	<input type="text" name="data" class="form-control" id="datepicker">

                  	<label>Seleziona l'area di svolgimento del mercato:</label>
                  	<select id="selectArea" name="IDArea" class="form-control select_form">
                      <option selected="selected"> ---Scegli l'area --- </option>
                      	@foreach($areas as $area)
                      		<option class="form-control" value="{{$area->IDArea}} ">{{$area->IDArea}} - {{$area->luogo}}
                       	@endforeach
                  	</select>
                    <div class="center_div">
                      <div class="row center_div">
                        <div id="showArea" class="col-xs-12 table-responsive">
                        </div>
                      </div>
                    </div>
                  		

                  	<input type="submit" class="form-control button_form " value="Registra nuovo mercato">
                  </div>

              </form>
              @include('includes.success')
              @include('includes.errors')
          </div>
  </div>



  <script>
            $( function() {
              $( "#datepicker" ).datepicker({
                beforeShow: function (input, inst) {
                        setTimeout(function () {
                                 inst.dpDiv.css({
                                       top: 100,
                                       left: 500
                          });
                      }, 0)
                  },
                dateFormat: "yy-mm-dd",
                minDate:0
              });
            });

            $(document).ready(function(){
                $("#register-form").on( 'change',"select", function(){

                  var table = document.createElement("table"); 
                  
                  $("p").remove(); //delete the old rapresentation
                  $.ajax({ //get rows and columns to generate the scheme
                      url:"mercato/getArea",
                      type:"POST",
                      data: $("#register-form").serialize(),
                      success: function(data){
                        var righe=data['righe'];
                        var colonne=data['colonne'];
                        console.log("L'area scelta ha " + righe + " righe e " + colonne + " colonne");  

                        var h2=document.createElement("h2");
                        h2.innerHTML="Mappa schematizzata del mercato";

                        //Generate the table corresponding to market's scheme

                        var tr= table.insertRow(-1);
                        var th=document.createElement("th");
                        th.innertHTML=""
                        tr.appendChild(th);

                        for(i=0;i<colonne;i++){
                          var th = document.createElement("th");
                          th.innerHTML=i;
                          tr.appendChild(th);
                        } 

                        for(i=0;i<righe;i++){

                          tr=table.insertRow(-1);
                          var th= document.createElement("th");
                          th.innerHTML=i;
                          tr.appendChild(th);

                          for(j=0;j<colonne;j++){
                            var td=document.createElement('td');
                            td.innerHTML="Postazione " + i+","+j;
                            tr.appendChild(td);

                          }
                        }
                                  var divContainer = document.getElementById("showArea");
                                  divContainer.innerHTML="";
                                  divContainer.appendChild(h2);
                                  divContainer.appendChild(table);                       

                        }
                      });
                    });
              });

//Handle request with AJAX
// da implementare
var CSRF_TOKEN= $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){
    $("#register-operator").on("click","button", function(){       
        $.ajax({
            url:"mercato",
            type:"POST",
            data: $("#register-operator").serialize(),
            // dataType: 'JSON',
            success: function(data){
                alert(data['response']);
            }
        });
     }); 
}); 
</script>



@endsection
