<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/consult.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head> 
<body> -->
@extends('layouts.base')
<link rel="stylesheet" href="css/appliance.css">
@section('body')
<div class="container">
  <div class="container-consult">
    <div class="content">

      <!-- <div class="image-box"> -->
       <!-- <img src="contact.png" alt=""> --->
      <!-- </div>       -->
    
      <form id="aform" method ="post" action="#" enctype="multipart/form-data">
      <meta name="csrf-token" content="{{ csrf_token() }}" />

      <div class="topic">Appliances</div>

      <div class="input-box">
      <select class="form-control" id="customer_id" name="customer_id">
           <option>Customer Name:</option>
                @foreach($customers as $id => $customer)
                    <option value="{{ $id }}"><a> {{ $customer }} </a></option>
                @endforeach
       </select>
       </div>

      <div>
        <div class="input-box">
          <label>Model:</label>
        </div>
          <input type="radio" name="model" id="model" value="Refrigerator" required> Refrigerator<br>
          <input type="radio" name="model" id="model" value="Washing Machine" required> Washing Machine<br>
          <input type="radio" name="model" id="model" value="Air Conditioning" required> Air Conditioning<br>
      </div>

      <div>
        <div class="input-box">
          <label>Brand:</label>
        </div>
          <input type="radio" name="brand" id="brand" value="Panasonic" required> Panasonic<br>
          <input type="radio" name="brand" id="brand" value="Samsumg" required> Samsumg<br>
          <input type="radio" name="brand" id="brand" value="LG" required> LG<br>
      </div>

      <div class="input-box">
        <input type="file" class="form-control" id="imagePath" name="uploads">        
      </div>          

      <div class="input-box">         
        <input id="applianceSubmit" type="submit" value="Submit My Appliance">
      </div>

      
      
      

    </form>
  </div>
  </div>
</div>
@endsection
<!-- </body>
</html> -->