		<select id="selectArea" name="IDArea" class="form-control select_form">
			<option selected="selected"> ---Scegli l'area --- </option>
		              @foreach($areas as $area)
		             <option class="form-control" value="{{$area->IDArea}} ">{{$area->IDArea}} - {{$area->luogo}}
		                @endforeach
		</select>