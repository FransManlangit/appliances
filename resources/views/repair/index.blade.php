@extends('layouts.base')
@section('body')
<div class="container">
    {{-- <style>
        .modal-dialog{
            display: flex;
            justify-content: center;
            align-repair: center;
            min-height: 100vh;
        }
    </style> --}}

<!-- 
    {{-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#consulatationModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <button type="button" class="btn btn-info btn-lg" id="consulatationbtn">consulatation<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> --}} -->
    
    <div class="table-responsive">
        <table id="rtable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Repair ID</th>
                    <th>Type</th>
                    <th>description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Restore</th>
                </tr>
            </thead>
            <tbody id="rbody">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="repairModal" role="dialog" style="display:none ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Repair</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form id="rform" method ="post" action="#" enctype="multipart/form-data">
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="rtype" class="control-label"><i class="fa-regular fa-note-sticky"></i>type</label>
                        <input type="text" class="form-control" id="rtype" name="type" placeholder="type">
                    </div>
                    <div class="form-group">
                        <label for="rdescription" class="control-label"><i class="fa-regular fa-note-sticky"></i>description</label>
                        <input type="text" class="form-control" id="rdescription" name="description" placeholder="description">
                    </div>
                    <div class="form-group">
                        <label for="rprice" class="control-label"><i class="fa-regular fa-note-sticky"></i>Price</label>
                        <input type="text" class="form-control" id="rprice" name="price" placeholder="price">
                    </div>

                <div class="form-group">
                        <label for="rimagePath" class="control-label"><i class="fa-regular fa-image"></i> Image</label>
                        <input type="file" class="form-control" id="rimagePath" name="uploads">
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Repair</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="ayform" method ="POST" action="#" enctype="multipart/form-data">
                <input type="hidden">
                <div class="form-group">
                        <label for="eerepair_id" class="control-label"><i class="fa-regular fa-note-sticky"></i> Repair id</label>
                        <input type="text" class="form-control" id="eerepair_id" name="repair_id" placeholder="repair_id">
                    </div>
                    <div class="form-group">
                        <label for="eetype" class="control-label"><i class="fa-regular fa-note-sticky"></i>type</label>
                        <input type="text" class="form-control" id="eetype" name="type" placeholder="type">
                    </div>
                    <div class="form-group">
                        <label for="eedescription" class="control-label"><i class="fa-regular fa-note-sticky"></i>description</label>
                        <input type="text" class="form-control" id="eedescription" name="description" placeholder="description">
                    </div>

                <div class="form-group">
                        <label for="eeprice" class="control-label"><i class="fa-regular fa-note-sticky"></i>Price</label>
                        <input type="text" class="form-control" id="eeprice" name="price" placeholder="price">
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