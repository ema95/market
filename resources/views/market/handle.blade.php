@extends('includes.layout')

@section('content')

<div class="row center_div" id="prova">
	<div class="col-xs-12">

	@include('includes.selectArea')

	</div>
</div>

@include('includes.map')

<script>
$(document).ready(function(){
	$('#selectArea').change(function(){
		//print the map accordly to the IDMercato
		//get marketID
		//join market and area and place
		//get all the places with area.IDArea=mercato.IDarea=postazione.IDArea
	})
});
</script>

@include('includes.googleMapsApiKey')
@endsection()
