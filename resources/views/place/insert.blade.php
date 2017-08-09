@extends ('includes.layout')

@section('content')


<div class="row center_div">
	<div class="col-xs-12">
       <h2>Inserire una nuova postazione</h2>

                    <label>Selezionare l'area in cui inserire la postazione</label>
                    @include('includes.selectArea')
                          <div id="form" class="col-xs-12" style="display:none">
                                     <form id="placeForm" method="post" action="postazione">
                                       {{csrf_field()}}
                                        <div class="form-group">

                                          <select id="selectType" name="IDTipologia" class="form-control select_form">
                                              <option selected="selected"> - tipologia merceologica  - </option>
                                                @foreach($types as $type)
                                                    <option class="form-control" value="{{$type->IDTipologia}} ">{{$type->IDTipologia}} - {{$type->tipo}}
                                                @endforeach
                                          </select>     

                                          <input type="button" class="form-control button_form " value="Registra nuova postazione" onclick="savePlace()">
                                        </div>
                                    </form> 
                          </div>
                                      <div class="row center_div  " style="height:350px">
                                            <div class="col-xs-12 center_div" id="map" style="width:100%; height:100%"></div>
                                      </div>  
                                          <div class="row">
                                            @include('includes.map')
                                          </div>
                                      <div style="height: 50px"></div>                 
      </div>

          
  </div>

<script type="text/javascript">

var infoWindowContent;
var map;
var lat;
var lon;
var marker;
var markers = [];
var infowindow;

  $(document).ready(function(){

       infoWindowContent=document.getElementById('form'); // we're not losing the infowindow contet

       $('#selectArea').change(function(){  
            //get area's coordinates by ajax
            //then init the map centered in the area
            var areaID=document.getElementById('selectArea').value;

                  $.ajax({    
                    type:"GET",
                    dataType:'json',
                    url:"getAreaCoordinates",
                    data: { areaID: areaID} ,
                    success: function(data){
                        lat=data['latitudine'];
                        lon=data['longitudine'];
                        initMap(lat,lon);

                    }
              }); 
      });
});

  

  function initMap(lat,lon){
                  
                  infowindow = new google.maps.InfoWindow({
                    content: infoWindowContent
                  });

                map= new google.maps.Map(document.getElementById('map'), {
                  scrollwheel:false,
                  scaleControl:false,
                  center: new google.maps.LatLng(lat,lon),
                  zoom: 17,
                  mapTypeId: 'roadmap'
              });

                google.maps.event.addListener(map,'click',function(event){

                  var index=markers.length;

                  marker  = new google.maps.Marker({
                        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
                        position: event.latLng,
                        map:map

                  });

                  google.maps.event.addListener(marker,'click',function(){
                         //open up infowindow form to save the new place
                         infowindow.open(map,marker);
                         $('#form').show();                   
                  });
                  markers.push(marker);

                  google.maps.event.addListener(marker,'rightclick',function(i){
                        markers[index].setMap(null);
                  });

                });


  }

  function savePlace(){

      var IDArea=document.getElementById('selectArea').value;
      var lat=marker.position.lat();
      var lon=marker.position.lng();

      var myData=$('#placeForm').serializeArray();
      myData.push({name: 'lat' , value:lat},{name:'lon',value:lon},{name:'IDArea', value:IDArea});
      

      $.ajax({
            url: 'postazione',
            type: 'POST',
            data: $.param(myData),
            success:function(data){
              alert(data['message']);
            },
            error:function(ts){
                ts.responseText;
            }
      });

  }

  function redirectBack(){
    window.history.back();  
  }
</script>

 @include('includes.googleMapsApiKey')

@endsection