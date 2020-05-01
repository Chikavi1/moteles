@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">

<img src="{{$bussiness->picture}}" style="width:100%;" alt="">
<div class="container">
	<div class="row">
		<div class="col m6 s12">
			<h3>{{ $bussiness->name }}</h3>
			<p>{{ $bussiness->direction }}</p>
			<p>{{ $bussiness->phone }}</p>
		</div>
		<div class="col m6 s12">
			<form action="{{ route('reservation.store') }}" method="POST">
			<div class="row">
		        <div class="input-field col s12 " >
		        @foreach($rooms as $room)
		          	<select class="icons" name="room" required>
				      <option value="" disabled selected>Escoge una opcion</option>
				      <option value="{{$room->id}}" data-icon="{{ $room->photo}}">{{$room->name}}</option>

				    </select>
				@endforeach
		        </div>

		        <div class="input-field col s12 m6 " >
		        
		          	<select class="icons" name="room" required>
				      <option value="" disabled selected>Escoge una Hora</option>
				      <option value="1">10:00AM - 13:00PM</option>
					  <option value="1">13:00PM - 13:00PM</option>
					  <option value="1">16:00PM - 19:00PM</option>
				    </select>
		        </div>

				<div class="input-field col s12 m6">
       				<input type="text" class="datepicker" placeholder="Dia de reserva" name="day" required="">
		        </div>


				@csrf
				<input type="hidden" value="450" name="price">
				<input type="submit" class="btn btn-large button-search-principal border-radius" style="width: 100%;" value="Reservar" >
			</form>
        	</div>
		</div>
	</div>
	
	
	
</div>
	<div class="row padding-1">
	<h4 class="center-align">Tipos de Habitaciones</h4>
	 @foreach($rooms as $room)
		<div class="col s12 m3">
		      <div class="card border-radius hoverable ">
		 
		         <div class="carousel carousel-slider" id="demo-carousel-indicators" data-indicators="true">
				 
				    <a style="background: red !important;" class="white carousel-item" href="#one!"><img src="{{$room->photo}}"></a>
				 
				    <a class="carousel-item" href="#two!"><img src="{{$room->photo}}"></a>
				 
				    <a class="carousel-item" href="#three!"><img src="{{$room->photo}}"></a>
		        </div>
		        <div class="card-content border-radius">
		          <p class="center-align bold">{{$room->name}}</p>
							<p>{{$room->description}}</p>
							<p >Desde <span class="green-text bold font-size-1">{{$room->price}} MXN</span></p>
		        </div>

		        
		      </div>
		    </div>
	 @endforeach
	</div>

<script>
   var toYear = new Date().getFullYear();
   var toMonth = new Date().getMonth();
   var toDay = new Date().getDate();

  $(document).ready(function(){
    $('.datepicker').datepicker({format: 'yyyy-mm-dd',minDate:  new Date(toYear,toMonth,toDay + 1),maxDate: new Date(toYear,toMonth,toDay + 100)});
    $('select').formSelect();
    $('#demo-carousel-indicators').carousel({fullWidth: true});
    autoplay();
    function autoplay(){$('.carousel').carousel('next');setTimeout(autoplay, 4500);}
  });
</script>
@endsection