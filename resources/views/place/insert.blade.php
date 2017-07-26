@extends ('includes.layout')

@include('includes.nav')

@section('content')


<div class="row center_div">
	<div class="col-xs-12">
       <h2>Inserire una nuova postazione</h2>

               <form id="register-form" method="post" action="postazione">
                 {{csrf_field()}}
                  <div class="form-group">

                    <label>Selezionare l'area in cui inserire la postazione</label>
                    <select id="selectArea" name="IDArea" class="form-control select_form">
                        <option selected="selected"> ---Scegli l'area --- </option>
                          @foreach($areas as $area)
                              <option class="form-control" value="{{$area->IDArea}} ">{{$area->IDArea}} - {{$area->luogo}}
                          @endforeach
                    </select>


                  <div class="row">
                    <div class="form-group col-xs-6">
                        <label>Inserire la posizione all'interno dell'area(riga)</label>
                        <input type="text" name="riga" class="form-control">
                    </div>

                    <div class="form-group col-xs-6">
                        <label>Inserire la posizione all'interno dell'area(colonna)</label>
                        <input type="text" name="colonna" class="form-control">
                    </div>
                  </div>


                    <select id="selectType" name="IDTipologia" class="form-control select_form">
                        <option selected="selected"> --- tipologia merceologica  --- </option>
                          @foreach($types as $type)
                              <option class="form-control" value="{{$type->IDTipologia}} ">{{$type->IDTipologia}} - {{$type->tipo}}
                          @endforeach
                    </select>                  		
                  	<input type="submit" class="form-control button_form " value="Registra nuova postazione">
                  </div>

              </form>
          </div>
  </div>


@endsection