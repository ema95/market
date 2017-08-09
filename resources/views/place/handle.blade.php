@extends('includes.layout')

@section('content')
    <div class="row">
        <div class="col-xs-12">
        <div class="form-group">
            <form id="update" action="place/updateType" method="post">
                {{csrf_field()}}
                    <table id="tabellaPostazioni" class="display" width="100%">
                            <thead>
                                <tr>
                                    <th class="target" width="20%">Luogo</th>
                                    <th width="20%">ID postazione</th>
                                    <th class="target" width="20%">Latitudine</th>
                                    <th class="target" width="20%">Longitudine</th>
                                    <th width="20%">Tipologia merceologica</th>
                                </tr>
                            </thead>
                    </table>
                <input type="submit" class="form-control button_form" value="Aggiorna tipologia postazione">
            </form>
            @include('includes.success')
        </div>
        </div>
    </div>

  


<script>
        var tipologie=null;
        var postazioni=null;
        var table;

        $(document).ready(function(){

            var tipologie;
            //nested ajax call because synchronous request is deprecated
                      $.ajax({ 
                          url:"type/getAll", // get all types
                          type:"GET",
                          dataType: 'json',
                          success: function(data){
                            tipologie=data;
                            $.ajax({            //get all places
                                            url:"place/selectByIdArea",
                                            type:"GET",
                                            dataType: 'json',
                                            success: function(data){
                                                    postazioni=data;
                                                    dataTableAjax(tipologie,postazioni);
                                            }
                            })
                        }
                    });
                  });

function dataTableAjax(tipologie,postazioni){

        table = $("#tabellaPostazioni").DataTable({

        dom: 'Bfrtip',
        buttons:[
        {
            text:"Aggiungi postazione",
            className: 'datatable_button',
            action: function(){
                window.location.href="inserisci-postazione"
            }
        },
        {
            text:"Aggiungi tipologia",
            className:'datatable_button',
            action: function(){
                window.location.href="inserisci-tipologia"
            }
        }
        ],
        responsive:true,
        ajax: {
            'dataType' : 'json',
            'dataSrc' : "",
            'url': 'place/selectByIdArea',
            'type': 'GET',
            'data': 'aoData',

        },

        columns: [ 
            {data : 'luogo'},
            {

                render: function(data,type,full,meta){
                    var inputID = full.IDPostazione;
                    return "<input type=hidden name=IDPostazione[] value="+ inputID +" >" + inputID;
                }
                    
                
            },
            {data : 'latitudine'},
            {
                data : 'longitudine'

            },
            {
                data: null, 
                defaultContent: getTypeContent(tipologie)
            },
        ]
    });

}


function getTypeContent(tipologie){
            var defaultContent="<select name=tipologia[] id=update style=height:100%;width:100%>"
            for(var i=0;i<tipologie.length;i++){

                    defaultContent+= "<option value="+tipologie[i].IDTipologia+">"+tipologie[i].tipo+"</option>";

            }
            defaultContent+="</select>"

            return defaultContent;
}

</script>

<script src="{{asset('https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css')}}"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">



@endsection

