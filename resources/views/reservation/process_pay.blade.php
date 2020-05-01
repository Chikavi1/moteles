@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<style>
		.switch-field {
	    display: flex;
	    overflow: hidden;
	    border-radius: 7px;
		}

		.switch-field input {
		    border: 0;
		    width:  33% !important;
		    overflow: hidden;

		}

		.switch-field label {
				width:  34%;
		    background-color: #e4e4e4;
		    color: rgba(0, 0, 0, 0.6);
		    font-size: 14px;
		    line-height: 1;
		    text-align: center;
		    padding: 8px 16px;
		    margin-right: -1px;
		    border: 1px solid rgba(0, 0, 0, 0.2);
		    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
		    transition: all 0.1s ease-in-out;
		}

		.switch-field label:hover {
		    cursor: pointer;
		}

		.switch-field input:checked + label {
		    border: 4px solid green;
		    box-shadow: none;
		}

		.switch-field label:first-of-type {
		    border-radius: 4px 0 0 4px;
		}

		.switch-field label:last-of-type {
		    border-radius: 0 4px 4px 0;
		}
		.padding-card{
			padding: 1.5em;
		}
		.padding-input{
			padding: 2em 0.5em;
		}
	</style>

@section('content')




	<h4 class="center">Proceso de Pago</h4>
	<form action="{{ route('reservation.store')}}" method="post">
		@csrf
		<!-- 
		<div class="row">
			<div class="container col s12 m4 offset-m4">
		    <div class="switch-field">
		        <input type="radio" id="radio-three" name="method_payment" value="mastecard" checked/>
		        <label for="radio-three"><i class="fab fa-cc-mastercard fa-4x" style="color: #f79e1b"></i></label>
		        <input type="radio" id="radio-four" name="method_payment" value="paypal" />
		        <label for="radio-four"><i class="fab fa-cc-paypal fa-4x" style="color: #3b7bbf"></i></label>
		        <input type="radio" id="radio-five" name="method_payment" value="visa" />
		        <label for="radio-five"><i class="fab fa-cc-visa fa-4x" style="color: #2c3ec6"></i></label>
		    </div>
			</div>
		</div> -->
		
		<div class="row padding-card " >
			<div class="col s12 m4 offset-m4 card border-radius">

				<div class="row padding-input" >
	        <div class="input-field col s12">
	          <label for="number_card">Número de Tarjeta</label>
	          <input id="number_card" name="number_card" type="text" class="validate">
	        </div>
      	</div>
	        <div class="input-field col s6 ">
	          <label for="expirate_day">Dia de expiracion</label>
	          <input id="expirate_day" maxlength="4" name="expirate_day" type="text" class="validate">
	        </div>
	        <div class="input-field col s6 ">
	          <label for="cvv">CVV</label>
	          <input id="cvv"  maxlength="3" type="password"  name="cvv" class="validate">
	        </div>
			<div class="padding-1">
				<input type="submit" id="enviar" class="btn border-radius block-100 button-search-principal" value="Pagar">
			</div>
			</div>
		</div>
	</form>



	<script type="text/javascript">

// Store the regexes as globals so they're cached and not re-parsed on every call:
var visaPattern = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
var mastPattern = /^(?:5[1-5][0-9]{14})$/;
var amexPattern = /^(?:3[47][0-9]{13})$/;
var discPattern = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/; 

    validateCreditCardNumber()
function matchesMonthAndYear(input) {
    return /((0[1-9]|1[0-2])\/[12]\d{3})/.test(input);
}

function validateCreditCardNumber() {
    var ccNum  = document.getElementById("number_card").value;
    ccNum = "525678195969339";
    var isVisa = visaPattern.test( ccNum ) === true;
    var isMast = mastPattern.test( ccNum ) === true;
    var isAmex = amexPattern.test( ccNum ) === true;
    var isDisc = discPattern.test( ccNum ) === true;

    if( isVisa || isMast || isAmex || isDisc ) {
        // at least one regex matches, so the card number is valid.

        if( isVisa ) {
           console.log('is visa');
        }
        else if( isMast ) {
           console.log('is mastecard');
        }
        else if( isAmex ) {
           console.log('is Amex');
        }
        else if( isDisc ) {
           console.log('is Discord ajja');
        }
    }
  
}



</script>

@endsection