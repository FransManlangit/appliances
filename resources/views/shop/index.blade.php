@extends('layouts.shop')

@section('body')
<h1>Your Shopping Cart</h1>
    <div id="cart-container">
      
      <div id="cart">
        <i class="fa fa-shopping-cart fa-2x openCloseCart" aria-hidden="true"></i>
        <button id="emptyCart">Empty Cart</button>
      </div>
      <span id="repairCount"></span>
    </div>
 

  <div id="shoppingCart">
  <!-- <form id="cform" method ="post" action="#" enctype="multipart/form-data"> -->
    <div id="cartRepairsContainer">
    <meta name="csrf-token" content="{{ csrf_token() }}" /> 
      <h2>Repairs in your cart</h2>
      <i class="fa fa-times-circle-o fa-3x openCloseCart" aria-hidden="true"></i>
      <div id="cartRepairs">
      	<!-- <button class="removerepairs">Remove Repairs</button> -->
      </div>
      <button class="btn btn-primary" id="checkout">Checkout</button>;
      <span id="cartTotal"></span>
  	</div>
  </div>

  <nav>
  	<ul>
  		<li><a href="#">Shopping Cart</a></li>
  	</ul>
  </nav>
  <div class="container container-fluid" id="repairs">
  	
  </div>

@endsection