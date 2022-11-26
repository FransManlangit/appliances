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


    {{-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#customerModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <button type="button" class="btn btn-info btn-lg" id="customerbtn">Customer<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> --}}
    
    <div class="table-responsive">
        <table id="ctable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
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
                        <label for="fname" class="control-label"><i class="fa-regular fa-note-sticky"></i> fname</label>
                        <input type="text" class="form-control" id="cfname" name="fname" placeholder="fname">
                    </div>
                    <div class="form-group">
                        <label for="clname" class="control-label" ><i class="fa-solid fa-money-bill"></i> lname</label>
                        <input type="text" class="form-control" id="clname" name="lname" placeholder="lname">
                    </div>
            
                    <div class="form-group">
                        <label for="addressline" class="control-label"><i class="fa-regular fa-note-sticky"></i> addressline</label>
                        <input type="text" class="form-control " id="caddressline" name="addressline" placeholder="addressline">
                    </div>
                    <div class="form-group">
                        <label for="town" class="control-label"><i class="fa-regular fa-note-sticky"></i> town</label>
                        <input type="text" class="form-control " id="ctown" name="town" placeholder="town">
                    </div>
                    <div class="form-group">
                        <label for="zipcode" class="control-label"><i class="fa-regular fa-note-sticky"></i> zipcode</label>
                        <input type="text" class="form-control " id="czipcode" name="zipcode" placeholder="zipcode">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="control-label"><i class="fa-regular fa-note-sticky"></i> phone</label>
                        <input type="text" class="form-control " id="cphone" name="phone" placeholder="phone">
                    </div>

                    <div class="form-group">
                            <label for="eemail" class="control-label">Email</label>
                            <input type="email" class="form-control" id="eemail" name="email" placeholder="example123@email.com">
                        </div>
                        <div class="form-group">
                            <label for="epassword" class="control-label">Password</label>
                            <input type="password" class="form-control" id="epassword" name="password">
                        </div>
                    
                    <div class="form-group">
                        <label for="imagePath" class="control-label"><i class="fa-regular fa-image"></i> Image</label>
                        <input type="file" class="form-control" id="imagePath" name="uploads">
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
            <form id="ayform" method ="PUT" action="#" enctype="multipart/form-data">
                <input type="hidden">
                <div class="form-group">
                        <label for="fname" class="control-label"><i class="fa-regular fa-note-sticky"></i> fname</label>
                        <input type="text" class="form-control" id="cfname" name="fname" placeholder="fname">
                    </div>
                    <div class="form-group">
                        <label for="lname" class="control-label"><i class="fa-regular fa-note-sticky"></i> lname</label>
                        <input type="text" class="form-control" id="clname" name="lname" placeholder="lname">
                    </div>
                    
                    <div class="form-group">
                        <label for="addressline" class="control-label"><i class="fa-regular fa-note-sticky"></i> addressline</label>
                        <input type="text" class="form-control " id="caddressline" name="addressline" placeholder="addressline">
                    </div>
                    <div class="form-group">
                        <label for="town" class="control-label"><i class="fa-regular fa-note-sticky"></i> town</label>
                        <input type="text" class="form-control " id="ctown" name="town" placeholder="town">
                    </div>
                    <div class="form-group">
                        <label for="zipcode" class="control-label"><i class="fa-regular fa-note-sticky"></i> zipcode</label>
                        <input type="text" class="form-control " id="czipcode" name="zipcode" placeholder="zipcode">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="control-label"><i class="fa-regular fa-note-sticky"></i> phone</label>
                        <input type="text" class="form-control " id="cphone" name="phone" placeholder="phone">
                    </div>
                    
                <div class="form-group"> 
                    
                    <label for="imagePath" class="control-label"><i class="fa-regular fa-image"></i> Image</label>
                    <input type="file" class="form-control" id="imagePath" name="uploads" >
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