@extends('layouts.app')

@section('content')
	<div class="row">
	 @foreach($cuartos as $cuarto) 
		<div class="col s12 m3">
		      <div class="card border-radius hoverable">
		        <div class="card-image">
		          <img class="border-radius-image" src="{{$cuarto->photo}}">
		        </div>
		        <div class="card-content border-radius">
		          <p class="center-align bold">{{$cuarto->name}}</p>
							<p>{{$cuarto->description}}</p>
							<p >Desde <span class="green-text bold font-size-1">{{$cuarto->price}} MXN</span></p>
							<p align="right">
								<a href="" class="btn light-blue darken-3 ">Seleccionar</a>
							</p>
		        </div>
		        
		      </div>
		    </div>
	 @endforeach
	</div>

@endsection