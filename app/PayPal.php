<?php

namespace App;

class Paypal
{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId = 'AdEEyrTZBPcIuTlXJp08ObNIvBZ57SJFdpBQmsRktqN_WJfWiQNxRhHnc6NmyDcs_80G30QtzCMdYTLL';
	private $_ClientSecret = 'EGZ_7-J-VSwRsYctyyj1I46-5UQHi8YLJz3U590d3_3yClIzZcdUOv98zhtiHYVeOe9vEMDsizvnmhmg' ;

	public function __construct($shopping_cart)
	{
		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);
		$config = config('paypal_payment');
		$flatConfig = array_dot($config);
		$this->_apiContext->setConfig($flatConfig);
		$this->shopping_cart = $shopping_cart;
	}

	public function generate()
	{
		$payment = \PaypalPayment::payment()->setIntent("sale")
								->setPayer($this->payer())
								->setTransactions([$this->transaction()])
								->setRedirectUrls($this->redirectURLs());

		try{
			$payment->create($this->_apiContext);
		}catch(\Exception $ex){
			dd($ex);
			exit(1);
		}
		return $payment;
	}

	public function payer()
	{
		return \PaypalPayment::payer()
							->setPaymentMethod("paypal");
	}

	public function transaction()
	{

		return \PaypalPayment::transaction()
					->setAmount($this->amount())
					->setItemList($this->items())
					->setDescription('Tu compra en Fondo')
					->setInvoiceNumber(uniqid());
	}

	public function amount()
	{
		return \PaypalPayment::amount()->setCurrency("USD")
							->setTotal($this->shopping_cart->totalUSD());
	}

	public function items()
	{
		$items = [];

		$products = $this->shopping_cart->products()->get();

		foreach ($products as $product ) {
			array_push($items,$product->paypalITem());
		}

		return \PaypalPayment::itemList()->setItems($items);
	}

	public function redirectURLs()
	{
		$baseURL = url('/');
		return \PaypalPayment::redirectUrls()
							->setReturnUrl("$baseURL/payments/store")
							->setCancelUrl("$baseURL/carrito");
	}

	public function execute($paymentId,$PayerId)
	{
		$payment = \PaypalPayment::getById($paymentId,$this->_apiContext);

		$execution = \PaypalPayment::PaymentExecution()
									->setPayerId($PayerId);

		return $payment->execute($execution,$this->_apiContext);
	}
}

	// public function card_payment()
	// {
	// 	$card = Paypalpayment::creditCard();
 //        $card->setType("visa")
 //            ->setNumber("4758411877817150")
 //            ->setExpireMonth("05")
 //            ->setExpireYear("2019")
 //            ->setCvv2("456")
 //            ->setFirstName("Joe")
 //            ->setLastName("Shopper");
	// }


































// class Paypal
// {
// 	private $_apiContext;
// 	private $shopping_cart;
// 	private $_ClientId = 'AdEEyrTZBPcIuTlXJp08ObNIvBZ57SJFdpBQmsRktqN_WJfWiQNxRhHnc6NmyDcs_80G30QtzCMdYTLL';
// 	private $_ClientSecret = 'EGZ_7-J-VSwRsYctyyj1I46-5UQHi8YLJz3U590d3_3yClIzZcdUOv98zhtiHYVeOe9vEMDsizvnmhmg';

// 	public function _construct($shopping_cart){

// 		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);

// 		$config = config("paypal_payment");

// 		$flatConfig = array_dot($config);

// 		$this->_apiContext->setConfig($flatConfig);

// 		$this->shopping_cart = $shopping_cart;
// 	}

// 	public function generate(){
// 		$payment = \PaypalPayment::payment()->setIntent("sale")
// 									->setPayer($this->payer())
// 									->setTransactions([$this->transaction()])
// 									->setRedirectUrls($this->redirectURLs);
// 		try{
// 			$payment->create($this->_apiContext);
// 		} catch(\Exception $ex){
// 			dd(ex);
// 			exit(1);
// 		}

// 		return $payment;
// 	}

// 	public function payer(){
// 		return \PaypalPayment::payer()
// 							->setPaymentMethod("paypal");
// 	}
// 	public function redirectURLs(){
// 		$baseURL = url('url');
// 		return \PaypalPayment::redirectURLs()
// 								->setReturnUrl("$baseURL/payments/store")
// 								->setCancelUrl("$baseURL/carrito");
// 	}

// 	public function transaction(){
// 		return \PaypalPayment::transaction()
// 					->setAmount($this->amount())
// 					->setItemList($this->items())
// 					->setDescription("Tu compra en Fondo")
// 					->setInvoiceNumber(uniqid());
// 	}

// 	public function items(){
// 		// $items = [];

// 		// $products = $this->shopping_cart->products()->get();

// 		// foreach ($products as $product) {
// 		// 	array_push($items, $product->paypalItem());}

// 		//	return \PaypalPayment::itemList()->setItems($items);
// 	}
// 	public function amount(){
// 		// return \PaypalPayment::amount()->setCurrency("USD")
// 		// 							->setTotal($this->shopping_cart->total());

// 	}
// }