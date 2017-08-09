@extends ('includes.layout')


@section('content')
<h2 class="center_div">Inserire nuova area</h2>
<div class="row center_div" style="height:400px;">

	
	<input id="searchBox" type="text" style="width:300px" placeholder="ricerca" onclick="(this.value=' ')">

	<div class="col-xs-12 center_div" id="map" style="width:100%; height:100%"></div>
	<div class="row center_div">
		<div class="col-xs-12" id="form">
		     <form id="areaForm">
	                 {{csrf_field()}}
		        <div class="form-group">
		        	<label for="luogo">Luogo:</label>

		        	<input class="form-control" type="text" name="luogo" id="luogo">

		        	<input type="button" class="form-control button_form " value="Registra nuova area" onClick="saveArea()">
		        </div>
		    </form>
		</div>
		    @include('includes.success')
		    @include('includes.errors')

	</div>	
</div>



<script>




var marker;
var infowindow;

	function initMap(){

		var map= new google.maps.Map(document.getElementById('map'), {
			center: {lat:-33.8688,lng:151.2195}, // here will go the coordinates of an area
			zoom: 15,
			mapTypeId: 'roadmap'
		});

		//put the search box on the top left angle of the map
		var input = document.getElementById('searchBox');
		var searchBox= new google.maps.places.SearchBox(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		//Init the infowindow

		infowindow = new google.maps.InfoWindow({
			content: document.getElementById('form')
		});

		var markers = [];

		searchBox.addListener('places_changed',function(){

			var places= searchBox.getPlaces();
			if(places.length==0){
				return;
			}
			//Remove the old markers
			markers.forEach(function(marker){
				marker.setMap(null);
			});
		markers = [];

		var bounds = new google.maps.LatLngBounds();
			places.forEach(function(place){
				if(!place.geometry){
					console.log("No geometry for this place");
					return;
				}
				marker=new google.maps.Marker({
					map:map,
					title:place.name,
					position: place.geometry.location
				});

				google.maps.event.addListener(marker,'click',function(){
					infowindow.open(map,marker);
				});	

				markers.push(marker);

				if(place.geometry.viewport){
					bounds.union(place.geometry.viewport);
				}else{
					bounds.extends(place.geometry.location);
				}
			});
			map.fitBounds(bounds);
			map.setZoom(17);
		});	
	}

	function saveArea(){
		var lat=marker.position.lat();
		var lon=marker.position.lng();

		var myData = $('#areaForm').serializeArray();
		myData.push({name: 'lat' , value:lat},{name: 'lon' , value:lon});
		
	$.ajax({    
	            type:"POST",
	            url:"area",
	            data: $.param(myData),

	            success: function(data){
	            		alert(data['message']);
	            },
	            error: function(ts){
		      	alert(ts.responseText);
	            }
        	   }); 
	}

</script>

 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSrqO3juNsmNXgLPC__fpjiE5v61FQ92s&libraries=places&callback=initMap"
 type="text/javascript"></script>

@endsection

