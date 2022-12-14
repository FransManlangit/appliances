@extends('layouts.shop')

@section('body')
<h1>Your Repairs Cart</h1>
    <div id="cart-container">
      <div id="cart">
        <i class="fa fa-shopping-cart fa-2x openCloseCart" aria-hidden="true"></i>
        <button id="emptyCart">Empty Cart</button>
      </div>
      <span id="servicesCount"></span>
    </div>
 

  <div id="shoppingCart">
    <div id="cartconsultationsContainer">
      <h2>consultations in your cart</h2>
      <i class="fa fa-times-circle-o fa-3x openCloseCart" aria-hidden="true"></i>
      <div id="cartconsultations">
      	<button class="removeconsultation">Remove consultation</button>
      </div>
      <button class="btn btn-primary" id="checkout">Checkout</button>;
      <span id="cartTotal"></span>
  	</div>
  </div>

  <nav>
  	<ul>
  		<li><a href="#">Repairs</a></li>
  	</ul>
  </nav>
  <div class="container container-fluid" id="consultations">
  	
  </div>

@endsection