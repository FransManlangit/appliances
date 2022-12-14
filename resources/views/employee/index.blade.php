@extends('layouts.base')
@section('body')
<div class="container">
    {{-- <style>
        .modal-dialog{
            display: flex;
            justify-content: center;
            align-employees: center;
            min-height: 100vh;
        }
    </style> --}}

<!-- 
    {{-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#employeeModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <button type="button" class="btn btn-info btn-lg" id="employeebtn">employee<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> --}} -->
    
    <div class="table-responsive">
        <table id="etable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>EmployeeID</th>
                    <th>UserID</th>
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
            <tbody id="ebody">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="employeeModal" role="dialog" style="display:none ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">
                <form id="eform" method ="post" action="#" enctype="multipart/form-data">
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="efname" class="control-label"><i class="fa-regular fa-note-sticky"></i> fname</label>
                        <input type="text" class="form-control" id="efname" name="fname" placeholder="fname">
                    </div>
                    <div class="form-group">
                        <label for="elname" class="control-label" ><i class="fa-solid fa-money-bill"></i> lname</label>
                        <input type="text" class="form-control" id="elname" name="lname" placeholder="lname">
                    </div>
            
                    <div class="form-group">
                        <label for="eaddressline" class="control-label"><i class="fa-regular fa-note-sticky"></i> addressline</label>
                        <input type="text" class="form-control " id="eaddressline" name="addressline" placeholder="addressline">
                    </div>
                    <div class="form-group">
                        <label for="etown" class="control-label"><i class="fa-regular fa-note-sticky"></i> town</label>
                        <input type="text" class="form-control " id="etown" name="town" placeholder="town">
                    </div>
                    <div class="form-group">
                        <label for="ezipcode" class="control-label"><i class="fa-regular fa-note-sticky"></i> zipcode</label>
                        <input type="text" class="form-control " id="ezipcode" name="zipcode" placeholder="zipcode">
                    </div>
                    <div class="form-group">
                        <label for="ephone" class="control-label"><i class="fa-regular fa-note-sticky"></i> phone</label>
                        <input type="text" class="form-control " id="ephone" name="phone" placeholder="phone">
                    </div>

                    <div class="form-group">
                            <label for="Eemail" class="control-label">Email</label>
                            <input type="email" class="form-control" id="Eemail" name="email" placeholder="example123@email.com">
                        </div>
                        <div class="form-group">
                            <label for="epassword" class="control-label">Password</label>
                            <input type="password" class="form-control" id="epassword" name="password">
                        </div>
                    
                    <div class="form-group">
                        <label for="eimagePath" class="control-label"><i class="fa-regular fa-image"></i> Image</label>
                        <input type="file" class="form-control" id="eimagePath" name="uploads">
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-circle-xmark"></i> Close</button>
                <button id="employeeSubmit" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editemployeeModal" role="dialog" style="display:none">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="ayform" method =" put" action="#" enctype="multipart/form-data">
                <input type="hidden">
                <div class="form-group">
                        <label for="eeemployee_id" class="control-label"><i class="fa-regular fa-note-sticky"></i> employee id</label>
                        <input type="text" class="form-control" id="eeemployee_id" name="employee_id" placeholder="employee_id">
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
            <button id="updatebtnemployee" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </div>
    </div>
</div>
</div>
@endsection