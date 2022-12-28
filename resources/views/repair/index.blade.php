@extends('layouts.base')
@section('body')
<div class="container">
    {{-- <style>
        .modal-dialog{
            display: flex;
            justify-content: center;
            align-repairs: center;
            min-height: 100vh;
        }
    </style> --}}

    

<!-- 
    {{-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#repairModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <button type="button" class="btn btn-info btn-lg" id="repairbtn">repair<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> --}} -->
    
    <div class="table-responsive">
        <table id="rptable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Repair ID</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Restore</th>
                </tr>
            </thead>
            <tbody id="rpbody">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="repairModal" role="dialog" style="display:none ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New repair</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">
                <form id="rpform" method ="post" action="#" enctype="multipart/form-data">
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-group">

                        <label for="rtype" class="control-label"><i class="fa-regular fa-note-sticky"></i> Type</label>
                        <input type="text" class="form-control" id="rtype" name="type" placeholder="type">
                    </div>
                    <div class="form-group">
                        <label for="rdescription" class="control-label" ><i class="fa-solid fa-money-bill"></i> Description</label>
                        <input type="text" class="form-control" id="rdescription" name="description" placeholder="description">
                    </div>
            
                    <div class="form-group">
                        <label for="rprice" class="control-label"><i class="fa-regular fa-note-sticky"></i> Price</label>
                        <input type="text" class="form-control " id="rprice" name="price" placeholder="price">
                    </div>
                    
                    <div class="form-group">
                        <label for="cimagePath" class="control-label"><i class="fa-regular fa-image"></i> Image</label>
                        <input type="file" class="form-control" id="cimagePath" name="uploads">
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-circle-xmark"></i> Close</button>
                <button id="repairSubmit" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editrepairModal" role="dialog" style="display:none">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit repair</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="ayform" method ="POST" action="#" enctype="multipart/form-data">
                <input type="hidden">
                <div class="form-group">
                        <label for="eerepair_id" class="control-label"><i class="fa-regular fa-note-sticky"></i> repair id</label>
                        <input type="text" class="form-control" id="eerepair_id" name="eerepair_id" placeholder="eerepair_id">
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
            <button id="updatebtnrepair" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </div>
    </div>
</div>

</div>
@endsection