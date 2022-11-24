<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer CRUD</title>
    <link rel="website icon" type="image/x-icon" href="/user.png">
    <!-- CSS only -->
    <!-- https://getbootstrap.com/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- https://getbootstrap.com/ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Jquery Library -->
    <!-- https://cdnjs.com/libraries/jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- FONT ICONS only --> {{-- https://fontawesome.com/icons/user-pen?s=solid&f=classic --}}
    <!-- FONT LIBRARY --> {{-- https://cdnjs.com/libraries/font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootbox library -->
    {{-- https://cdnjs.com/libraries/bootbox.js/5.5.2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <style>
    *{
      margin: 0;
      padding: 0;
    }
    .btn-lg{
        display: inline-block;
        text-transform: none;
        letter-spacing: normal;
        word-wrap: normal;
        white-space: nowrap;
        -webkit-transition:all 0.5s ease-in-out;
    }
    
    .btn-marie:hover{
      background: #FFE9A0;
      color: #367E18;
    }
    .btn-marie{
      margin: 10px;
      border-radius: 25px 25px 25px 25px;
      background-color: black;
      color: #ffffff;
      /* box-shadow: 0 0 0 1px rgb(16,114,181); */
    }
  </style>

    <div class="container" id="customers">
        <button type="button" class="btn btn-marie btn-lg" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-user"></i> <span
                class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
        
        <button type="button" class="btn btn-marie btn-lg" id="item"><i class="fa-sharp fa-solid fa-bag-shopping"></i><span class="glyphicon glyphicon-plus"
                aria-hidden="true"></span></button>
        

        <div class="table-responsive">
            <table id="ctable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Lname</th>
                        <th>Fname</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Restore</th>
                    </tr>
                </thead>
                <tbody id="cbody">
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="customerModal" role="dialog" style="display:none">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 Add class="modal-title" id="exampleModalLabel">Add New Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="cform" method="post" action="#" >
                <input type="hidden">
                
                <div class="form-group">
                    <label for="lname" class="control-label">last name</label>
                    <input type="text" class="form-control " id="lname" name="lname" >
                </div>
                
                <div class="form-group">
                    <label for="fname" class="control-label">First Name</label>
                    <input type="text" class="form-control " id="fname" name="fname" >
                </div>
                
                <div class="form-group"> 
                    <label for="address" class="control-label">Address</label>
                    <input type="text" class="form-control" id="address" name="addressline" >
                </div>
                
                <div class="form-group"> 
                    <label for="town" class="control-label">Town</label>
                    <input type="text" class="form-control" id="town" name="town" >
                </div>
                
                <div class="form-group">
                    <label for="zipcode" class="control-label">Zip code</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" >
                </div>
                
                <div class="form-group">
                    <label for="phone" class="control-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" >
                </div>
            </form>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button id="customerSubmit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="editModal" role="dialog" style="display:none">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
              <h4 class="modal-title">Update customer</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateform" method="#" action="#" >
                <input type="hidden">
              
              <div class="form-group"> 
                <label for="elname" class="control-label">last name</label>
                <input type="text" class="form-control " id="elname" name="lname">

              </div> 
              <div class="form-group"> 
                <label for="efname" class="control-label">First Name</label>
                <input type="text" class="form-control " id="efname" name="fname" >
                
              </div>
              <div class="form-group"> 
                <label for="eaddress" class="control-label">Address</label>
                <input type="text" class="form-control" id="eaddress" name="addressline" >

              </div>
              <div class="form-group"> 
                <label for="etown" class="control-label">Town</label>
                <input type="text" class="form-control" id="etown" name="town" >
                
              </div>
              <div class="form-group"> 
                <label for="ezipcode" class="control-label">Zip code</label>
                <input type="text" class="form-control" id="ezipcode" name="zipcode" >

              </div>
              <div class="form-group"> 
                <label for="ephone" class="control-label">Phone</label>
                <input type="text" class="form-control" id="ephone" name="phone" >
              </div>

            </form> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
              <button id="updatebtn" type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
      </div>
    </div>


    <!-- <div id="items" class="container">
      <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#itemModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
      <button type="button" class="btn btn-info btn-lg" id="customerbtn">Customer<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
      
      <div class="table-responsive">
          <table id="itable" class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th>Item ID</th>
                      <th>Description</th>
                      <th>Sell price</th>
                      <th>Cost price</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Edit</th>
                      <th>Delete</th>
                  </tr>
              </thead>
              <tbody id="ibody">
              </tbody>
          </table>
      </div>
  </div>
   -->
  <!-- <div class="modal fade" id="itemModal" role="dialog" style="display:none">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create New Item</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
  
              <div class="modal-body">
                  <form id="iform" method ="post" action="#" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="description" class="control-label">Desc</label>
                          <input type="text" class="form-control" id="idescription" name="description">
                      </div>
                      <div class="form-group">
                          <label for="cost_price" class="control-label">CostPrice</label>
                          <input type="text" class="form-control" id="icost_price" name="cost_price">
                      </div>
                      <div class="form-group">
                          <label for="sell_price" class="control-label">SellPrice</label>
                          <input type="text" class="form-control " id="isell_price" name="sell_price">
                      </div>
                      <div class="form-group">
                          <label for="title" class="control-label">Title</label>
                          <input type="text" class="form-control " id="ititle" name="title">
                      </div>
                      <div class="form-group">
                          <label for="imagePath" class="control-label">Item Image</label>
                          <input type="file" class="form-control" id="imagePath" name="imagePath">
                      </div>
                  </form>
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                  <button id="itemSubmit" type="submit" class="btn btn-primary">Save</button>
              </div>
          </div>
      </div>
  </div> -->


<!-- <div class="modal fade" id="editItemModal" role="dialog" style="display:none">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form id="updateformItem" action="#" >
                  <input type="hidden">
                  <div class="form-group">
                      <label for="eedescription" class="control-label">Description</label>
                      <input type="text" class="form-control" id="eedescription" name="description" >
                  </div>
                  
                  <div class="form-group">
                      <label for="eecost_price" class="control-label">Cost Price</label>
                      <input type="text" class="form-control" id="eecost_price" name="cost_price">
                  </div>
                  
                  <div class="form-group">
                      <label for="eesell_price" class="control-label">Sell Price</label>
                      <input type="text" class="form-control " id="eesell_price" name="sell_price" >
                  </div>
              
                  <div class="form-group">
                      <label for="eetitle" class="control-label">Title</label>
                      <input type="text" class="form-control " id="eetitle" name="title" >
                  </div>
              
                  <div class="form-group"> 
                      <label for="eeimagePath" class="control-label">Image</label>
                      <input type="text" class="form-control" id="eeimagePath" name="imagePath" >
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              
              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
              <button id="updatebtnItem" type="submit" class="btn btn-primary">Update</button>
          </div>
      </div>
  </div>
</div> -->

    <script src="js/custom.js"></script>
</body>

</html>