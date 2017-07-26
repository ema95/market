@extends('includes.layout')

@section('content')

	<h2>Registrazione nuovo utente</h2>
	
	<div class="container">
		<div class="col-xs-12">
			<form action="register" method="post">

	       			{{csrf_field()}}
				<div class="form-group">
					 <label>Username:</label>
					 <input type="text" name="username" class="form-control">

					 <label>Indirizzo email:</label>
					 <input type="email" name="email" class="form-control">

					 <label>Password:</label>
					 <input type="password" name="password" class="form-control">

					 <input type="submit" class="form-control button_form" value="registrati">
				</div>

			</form>

			<a class="pull-right" href="home">homepage</a>

			@include('includes.errors')
		</div>

	</div>

@endsection