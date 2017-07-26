@extends ('includes.layout')

@section('content')
<div class="row center_div">
	<div class="col-xs-12">
	<h2>Inserire una nuova autorizzazione</h2>
	     <form method="post" action="autorizzazione">

                 {{csrf_field()}}

                 <label>Autorizzazione per:</label>
                    <select id="selectType" name="IDTipologia" class="form-control select_form">
                        <option selected="selected"> --- tipologia merceologica  --- </option>
                          @foreach($types as $type)
                              <option class="form-control" value="{{$type->IDTipologia}} ">{{$type->IDTipologia}} - {{$type->tipo}}
                          @endforeach
                    </select> 

                  <input type="submit" class="form-control button_form " value="Registra nuova autorizzazione">
	    </form>
	</div>
</div>
@endsection