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
    <h1>Employee Signup</h1> 

  <div class="form">
      
  <div class="modal-body">
  <form id="eform" method="post" action="#" enctype="multipart/form-data">  
  <meta name="csrf-token" content="{{ csrf_token() }}" />
      <div class="tab-content">      
        <div id="info">   
          <h2>Information:</h2>
                    
          <div class="top-row">
            <div class="label-field">
              <div class="form-group">
                  <label for="fname">First Name<span class="req">*</span></label>
                  <input type="text" class="form-control" id="fname" name="fname">
              </div>
            </div>

            <div class="label-field">
              <div class="form-group">
                  <label for="lname">Last Name<span class="req">*</span></label>
                  <input type="text" class="form-control" id="lname" name="lname">
              </div>
            </div>
          </div>
          
          <div class="label-field">
              <div class="form-group">
                  <label for="addressline">Addressline<span class="req">*</span></label>
                  <input type="text" class="form-control " id="addressline" name="addressline">
              </div>
         </div>

         <div class="top-row">
            <div class="label-field">
              <div class="form-group">
                <label for="town">Town<span class="req">*</span></label>
                <input type="text" class="form-control " id="town" name="town">
              </div>
            </div>
        
            <div class="label-field">
              <div class="form-group">
                <label for="zipcode">zipcode</label>
                <input type="text" class="form-control " id="zipcode" name="zipcode">
              </div>
            </div>
          </div>

          <div class="label-field">
              <div class="form-group">
                <label for="phone"> phone</label>
                <input type="text" class="form-control " id="phone" name="phone">
              </div>
         </div>

         <div class="form-group">
             <label for="imagePath" class="control-label"></label>
             <input type="file" class="form-control" id="imagePath" name="uploads">
          </div>
          
          <br><br>
          
          
         <div class="top-row">        
         <div class="label-field">
              <ul class="top-area">            
                <li class=""><a href="signin">Login Instead</a></li>                    
               </ul>
            </div>

            <div class="label-field">
               <ul class="top-area">            
                  <li class="tab"><a href="#acc">Next</a></li>            
               </ul>
            </div>
          </div>

          <br>
          <div class="label-field">
               <ul class="top-area">            
               <li class=""><a href="home">Go Back to Homepage</a></li>           
               </ul>
            </div>

      </div>      

      <div id="acc">   
          <h2>Account:</h2>
                    
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
                  
          <div class="top-row">
            <div class="label-field">
               <ul class="top-area">            
                  <li class="tab"><a href="#info">Back</a></li>            
               </ul>
            </div>
        
            <div class="label-field">            
              <div class="modal-footer">
                <button id="employeeSubmit" type="submit" class="button button-block">Submit</button>
              </div>
            </div>            
          </div>

          <br>
          <div class="label-field">
               <ul class="top-area">            
               <li class=""><a href="home">Go Back to Homepage</a></li>           
               </ul>
            </div>
      </div>

         </form>         
      </div>  
</div>
</div> 

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/signupEmployee.js"></script>
</body>
</html>