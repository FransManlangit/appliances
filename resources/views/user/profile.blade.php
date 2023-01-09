@extends('layouts.base')
    <link rel="stylesheet" href="css/profile.css">
    @section('body')
    <div class="container">
      <div class="container-consult">
        <div class="content">
    
          {{-- <div class="image-box">
            <img src="{{ Auth::user()->customers->imagePath}}" alt=""> 
          </div>       --}}
            @if (Auth::check() && Auth::user()->role == 'customer')        
            <div class="input-box">
                <p readonly>Hello Customer, {{ Auth::user()->customers->fname }}{{" "}}{{ Auth::user()->customers->lname }}<br></p><br>
                <p readonly>Address: {{ Auth::user()->customers->addressline }}{{", "}}{{ Auth::user()->customers->town }}{{", "}}{{ Auth::user()->customers->zipcode }}<br></p>
                <p readonly>Phone: {{ Auth::user()->customers->phone}}<br></p>
                <p readonly>Email: {{ Auth::user()->customers->email}}<br></p>
            </div>
            @elseif (Auth::check() && Auth::user()->role == 'employee')      
            <div class="input-box">
                <p readonly>Hello Employee, {{ Auth::user()->employees->fname }}{{" "}}{{ Auth::user()->employees->lname }}<br></p><br>
                <p readonly>Address: {{ Auth::user()->employees->addressline }}{{", "}}{{ Auth::user()->employees->town }}{{", "}}{{ Auth::user()->employees->zipcode }}<br></p>
                <p readonly>Phone: {{ Auth::user()->employees->phone}}<br></p>
                <p readonly>Email: {{ Auth::user()->employees->email}}<br></p>
            </div>
            @elseif (Auth::check() && Auth::user()->role == 'admin')      
            <div class="input-box">
                <p readonly>Hello Admin, {{ Auth::user()->employees->fname }}{{" "}}{{ Auth::user()->employees->lname }}<br></p><br>
                <p readonly>Address: {{ Auth::user()->employees->addressline }}{{", "}}{{ Auth::user()->employees->town }}{{", "}}{{ Auth::user()->employees->zipcode }}<br></p>
                <p readonly>Phone: {{ Auth::user()->employees->phone}}<br></p>
                <p readonly>Email: {{ Auth::user()->employees->email}}<br></p>
            </div>
            @endif
        
      </div>
      </div>
    </div>
    @endsection