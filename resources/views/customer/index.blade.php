@extends('layouts.base')
@section('body')
<div class="container">
    {{-- <style>
        .modal-dialog{
            display: flex;
            justify-content: center;
            align-customers: center;
            min-height: 100vh;
        }
    </style> --}}

<!-- 
    {{-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#customerModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <button type="button" class="btn btn-info btn-lg" id="customerbtn">Customer<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> --}} -->
    
    <div class="table-responsive">
        <table id="ctable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>User ID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Address</th>
                    <th>Town</th>
                    <th>Zipcode</th>
                    <th>Phone</th>
                    <th>Image</th>
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

<div class="modal fade" id="customerModal" role="dialog" style="display:none ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">
                <form id="cform" method ="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cfname" class="control-label"><i class="fa-regular fa-note-sticky"></i> fname</label>
                        <input type="text" class="form-control" id="cfname" name="fname" placeholder="fname">
                    </div>
                    <div class="form-group">
                        <label for="clname" class="control-label" ><i class="fa-solid fa-money-bill"></i> lname</label>
                        <input type="text" class="form-control" id="clname" name="lname" placeholder="lname">
                    </div>
            
                    <div class="form-group">
                        <label for="caddressline" class="control-label"><i class="fa-regular fa-note-sticky"></i> addressline</label>
                        <input type="text" class="form-control " id="caddressline" name="addressline" placeholder="addressline">
                    </div>
                    <div class="form-group">
                        <label for="ctown" class="control-label"><i class="fa-regular fa-note-sticky"></i> town</label>
                        <input type="text" class="form-control " id="ctown" name="town" placeholder="town">
                    </div>
                    <div class="form-group">
                        <label for="czipcode" class="control-label"><i class="fa-regular fa-note-sticky"></i> zipcode</label>
                        <input type="text" class="form-control " id="czipcode" name="zipcode" placeholder="zipcode">
                    </div>
                    <div class="form-group">
                        <label for="cphone" class="control-label"><i class="fa-regular fa-note-sticky"></i> phone</label>
                        <input type="text" class="form-control " id="cphone" name="phone" placeholder="phone">
                    </div>

                    <div class="form-group">
                            <label for="cemail" class="control-label">Email</label>
                            <input type="email" class="form-control" id="cemail" name="email" placeholder="example123@email.com">
                        </div>
                        <div class="form-group">
                            <label for="cpassword" class="control-label">Password</label>
                            <input type="password" class="form-control" id="cpassword" name="password">
                        </div>
                    
                    <div class="form-group">
                        <label for="cimagePath" class="control-label"><i class="fa-regular fa-image"></i> Image</label>
                        <input type="file" class="form-control" id="cimagePath" name="uploads">
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-circle-xmark"></i> Close</button>
                <button id="customerSubmit" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editcustomerModal" role="dialog" style="display:none">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="ayform" method ="POST" action="#" enctype="multipart/form-data">
                <input type="hidden">
                <div class="form-group">
                        <label for="eecustomer_id" class="control-label"><i class="fa-regular fa-note-sticky"></i> Customer id</label>
                        <input type="text" class="form-control" id="eecustomer_id" name="customer_id" placeholder="customer_id">
                    </div>
                    <!-- <div class="form-group">
                        <label for="cuser_id" class="control-label"><i class="fa-regular fa-note-sticky"></i>User id</label>
                        <input type="text" class="form-control" id="cuser_id" name="user_id" placeholder="user_id">
                    </div> -->
                <div class="form-group">
                        <label for="eefname" class="control-label"><i class="fa-regular fa-note-sticky"></i> first name</label>
                        <input type="text" class="form-control" id="eefname" name="fname" placeholder="fname">
                    </div>
                    <div class="form-group">
                        <label for="eelname" class="control-label"><i class="fa-regular fa-note-sticky"></i> last name</label>
                        <input type="text" class="form-control" id="eelname" name="lname" placeholder="lname">
                    </div>
                    
                    <div class="form-group">
                        <label for="eeaddressline" class="control-label"><i class="fa-regular fa-note-sticky"></i> addressline</label>
                        <input type="text" class="form-control " id="eeaddressline" name="addressline" placeholder="addressline">
                    </div>
                    <div class="form-group">
                        <label for="eetown" class="control-label"><i class="fa-regular fa-note-sticky"></i> town</label>
                        <input type="text" class="form-control " id="eetown" name="town" placeholder="town">
                    </div>
                    <div class="form-group">
                        <label for="eezipcode" class="control-label"><i class="fa-regular fa-note-sticky"></i> zipcode</label>
                        <input type="text" class="form-control " id="eezipcode" name="zipcode" placeholder="zipcode">
                    </div>
                    <div class="form-group">
                        <label for="eephone" class="control-label"><i class="fa-regular fa-note-sticky"></i> phone</label>
                        <input type="text" class="form-control " id="eephone" name="phone" placeholder="phone">
                    </div>
                    
                <div class="form-group"> 
                    
                    <label for="eeimagePath" class="control-label"><i class="fa-regular fa-image"></i> Image</label>
                    <input type="file" class="form-control" id="eeimagePath" name="uploads" >
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-circle-xmark"></i> Close</button>
            <button id="updatebtncustomer" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </div>
    </div>
</div>
</div>
@endsection