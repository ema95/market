@extends ('includes.layout')


@section('content')
<div class="row center_div">
	<div class="col-xs-12">
	<h2>Inserisci una nuova area</h2>
	     <form method="post" action="area">
                 {{csrf_field()}}
	        <div class="form-group">
	        	<label for="luogo"> Luogo</label>
	        	<input type="text" name="luogo" class="form-control">

	        	<label for="nMaxPostazioni">Numero di righe</label>
	        	<input type="text" name="righe" class="form-control">

	        	<label for="nMaxPostazioni">Numero di colonne</label>
	        	<input type="text" name="colonne" class="form-control">	

	        	<input type="submit" class="form-control button_form " value="Registra nuova area">
	        </div>
	    </form>
	    @include('includes.success')
	    @include('includes.errors')
	</div>
</div>
@endsection