@extends('layouts.app')

@section('content')
<style>
	.border-radius-image{
		border-radius: 1em 1em 0em 0em !important;
	}
	.font-size-1{
		font-size: 1.3em;
	}
</style>
<div class="row valign-wrapper">
	<div class="col m6">
		<h4 class="padding-1 green-text bold" >{{ $place }}</h4>
	</div>
	<div class="col m6 ">
		<form action="{{ route('busqueda') }}" method="get" class="">
                 	 @csrf
                    <input type="text" name="place" placeholder="¿Dónde?"  class=" browser-default padding-search block" required>
                    <input type="submit" style="margin-left: -10px;" class="browser-default padding-search   button-search-principal" value="Buscar">
    </form>    
	</div>
</div>
	
	<div class="row">
		<div class="col m3" >
			<div class="card " style="height: 450px;margin-top: -.8em !important;">
				<p class="padding-1 center-align bold font-size-1 " >Filtros</p>
				<p class="padding-1">caca</p>
			</div>
		</div>
		<div class="col-m8">
			
		  <div class="row">
			@foreach($moteles as $motel)
		    <div class="col s12 m3">
		      <div class="card border-radius hoverable">
		        <div class="card-image">
		          <img class="border-radius-image" src="{{$motel->picture}}">
		        </div>
		        <div class="card-content border-radius">
		          <p class="center-align bold">{{$motel->name}}</p>
							<p>Guadalajara</p>
							<p >Desde <span class="green-text bold font-size-1">350 MXN</span></p>
							<p>{{ $motel->schedule }}</p>
							<p align="right">
								<a href="{{ route('moteles.show',$motel->id) }}" class="btn light-blue darken-3 ">Ver más</a>
							</p>
		        </div>
		        
		      </div>
		    </div>
			@endforeach
		   
		  </div>
		</div>
	</div>
@endsection