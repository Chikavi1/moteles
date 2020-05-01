@extends('layouts.app')

@section('content')
<div class="parallax-container">
        <h3 class="center-align white-text" style="margin-top: 3em;">Encuentra tu motel más cercano.</h3>
        <div class="row ">
            <div class="col s12 m4 offset-m4 ">
                 <form action="{{ route('busqueda') }}" method="get" class="">
                 	 @csrf
                    <input type="text" name="place" placeholder="¿Dónde?"  class=" browser-default padding-search block" required>
                    <input type="submit" style="margin-left: -10px;" class="browser-default padding-search   button-search-principal" value="Buscar">
                </form>    
            </div>
        </div>
       
      <div class="parallax"><img src="https://images.unsplash.com/photo-1583139937662-affac1e2fed5?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"></div>
    </div>
@endsection