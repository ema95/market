@extends('includes.layout')

@section('content')

	<div class="container">

		      <form class="form-signin" action="login" method="post">

		      {{csrf_field()}}
		        <h2 class="form-signin-heading">Please sign in</h2>

		        <label for="email" class="sr-only">Email</label>
		        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>

		        <label for="password" class="sr-only">Password</label>
		        <input type="password" name="password" class="form-control" placeholder="Password" required>

		        <button class="btn btn-lg btn-primary btn-block button_form" type="submit">Login</button>
		      </form>
		      
		      <a class="pull-right" href="home">homepage</a>

		@include('includes.errors')	

	   </div> 


@endsection