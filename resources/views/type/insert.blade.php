@extends ('includes.layout')

@include('includes.nav')

@section('content')
<div class="row center_div">
	<div class="col-xs-12">
	<h2>Inserire una nuova tipologia merceologica</h2>
	     <form method="post" action="tipologia">
                 {{csrf_field()}}
	        <div class="form-group">
	        	<label for="luogo">Tipologia merce: </label>
	        	<input type="text" name="tipologia" class="form-control">

	        	<input type="submit" class="form-control button_form " value="Registra nuova tipologia">
	        </div>
	    </form>
	</div>
</div>
@endsection