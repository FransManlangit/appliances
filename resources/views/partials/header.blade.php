<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- <a class="navbar-brand" href="#">Repair Appliances</a> -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Repair Appliances</a>
    </div>

    <ul class="nav navbar-nav">
     @if(Auth::check() and Auth::user()->role == 'admin')
      <li><a class="nav-link" href="#">Home</a></li>
      <li><a class="nav-link" href="customer">Customer</a></li>
      <li><a class="nav-link" href="employee">Employee</a></li>
      <li><a class="nav-link" href="appliance">Appliance</a></li>
      <li><a class="nav-link" href="repair">Repair</a></li>
     @elseif(Auth::check() and Auth::user()->role == 'employee')     
      <li><a class="nav-link" href="#">Home</a></li>
      <li><a>|</a></li>
      <li><a class="nav-link" href="#">Employee</a></li>    
     @elseif(Auth::check() and Auth::user()->role == 'customer')     
     <li><a class="nav-link" href="#">Home</a></li>
      <li><a>|</a></li>
      <li><a class="nav-link" href="#">Customer</a></li> 
     @else    
     <li><a class="nav-link" href="#">Home</a></li>
      <li><a>|</a></li>
      <li><a class="nav-link" href="#">No one login</a></li>    
    </ul>    
    @endif

    <ul class="nav navbar-nav ">
    @if(Auth::check())
      <li><a class="nav-link" href="{{ route('login.logout') }}" id="signoutUser">Logout</a></li>          
    @else
      <li class="dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown">Signup <span class="caret"></span></a> <!-- <span class="glyphicon glyphicon-user"></span> -->
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="signupCustomer">As Customer</a></li>
          <li><a class="nav-link" href="signupEmployee">As Employee</a></li>
        </ul>
      </li>
      <li><a class="nav-link" href="signin">Login</a></li> <!-- <span class="glyphicon glyphicon-log-in"></span> -->
    @endif
    </ul>

  </div>
</nav>
<br>