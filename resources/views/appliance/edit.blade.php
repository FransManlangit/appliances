@extends('layouts.base')
@section('body')
<div class="container">
    {{-- <style>
        .modal-dialog{
            display: flex;
            justify-content: center;
            align-appliances: center;
            min-height: 100vh;
        }
    </style> --}}

<!-- 
    {{-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#applianceModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <button type="button" class="btn btn-info btn-lg" id="appliancebtn">appliance<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> --}} -->
    
<div class="modal fade" id="editapplianceModal" role="dialog" style="display:none">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit appliance</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="ayform" method ="POST" action="#" enctype="multipart/form-data">
                <input type="hidden">
                <div class="form-group">
                        <label for="eeappliance_id" class="control-label"><i class="fa-regular fa-note-sticky"></i> appliance id</label>
                        <input type="text" class="form-control" id="eeappliance_id" name="appliance_id" placeholder="appliance_id">
                    </div>

                    <div class="form-group">
                        <label for="eecustomer_id" class="control-label"><i class="fa-regular fa-note-sticky"></i> appliance id</label>
                        <input type="text" class="form-control" id="eecustomer_id" name="customer_id" placeholder="customer_id">
                    </div>
                   
                   
                <div class="form-group">
                        <label for="eemodel" class="control-label"><i class="fa-regular fa-note-sticky"></i>Model</label>
                        <input type="text" class="form-control" id="eemodel" name="model" placeholder="model">
                    </div>
                    <div class="form-group">
                        <label for="eebrand" class="control-label"><i class="fa-regular fa-note-sticky"></i>Brand</label>
                        <input type="text" class="form-control" id="eebrand" name="brand" placeholder="brand">
                    </div>
                    
                <div class="form-group"> 
                    
                    <label for="eeimagePath" class="control-label"><i class="fa-regular fa-image"></i> Image</label>
                    <input type="file" class="form-control" id="eeimagePath" name="uploads" >
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-circle-xmark"></i> Close</button>
            <button id="updatebtnappliance" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </div>
    </div>
</div>
</div>
@endsection