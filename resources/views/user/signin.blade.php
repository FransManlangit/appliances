<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
</head>

  <link href="https://fonts.googleapis.com/css?family=Manjari&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/signup.css">

<body>
  <div class="form">
    <h1>Login Account:</h1> 

  <div class="form">
      
  <div class="modal-body">
  <form id="signinForm" method="post" action="#" enctype="multipart/form-data">  
  <meta name="csrf-token" content="{{ csrf_token() }}" />
      <div class="tab-content">      
   
      </div>      

                    
          <div class="label-field">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
          </div>
          
          <div class="label-field">
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
          </div>
                          
            <div class="label-field">           
              <div class="modal-footer">
                <button id="signinUser" type="submit" class="button button-block">Login</button><br>
               </div>
            </div>   

            <div class="top-row">        
            <div class="label-field">
              <ul class="top-area">            
                  <li class=""><a href="signupCustomer">Signup Customer</a></li>            
               </ul>
            </div>

            <div class="label-field">
               <ul class="top-area">            
                  <li class=""><a href="signupEmployee">Signup Employee</a></li>            
               </ul>
            </div>
          </div>

          <div class="label-field">
               <ul class="top-area">            
               <li class=""><a href="home">Go Back to Homepage</a></li>           
               </ul>
            </div>

      </div>

      

      </div>   

         </form>
</form>
      </div>  
</div>
</div> 

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/signin.js"></script>

</body>
</html>