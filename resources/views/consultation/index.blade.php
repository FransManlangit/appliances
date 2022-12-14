@extends('layouts.base')
@section('body')
<div class="container">
    {{-- <style>
        .modal-dialog{
            display: flex;
            justify-content: center;
            align-consulatations: center;
            min-height: 100vh;
        }
    </style> --}}

<!-- 
    {{-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#consulatationModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <button type="button" class="btn btn-info btn-lg" id="consulatationbtn">consulatation<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> --}} -->
    
    <div class="table-responsive">
        <table id="ctable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>consulatation ID</th>
                    <!-- <th>Customer ID</th> -->
                    <th>recommendation</th>
                    <th>Brand</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Restore</th>
                </tr>
            </thead>
            <tbody id="abody">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="consulatationModal" role="dialog" style="display:none ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Consultation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="aform" method ="post" action="#" enctype="multipart/form-data">
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="defective" class="control-label"><i class="fa-regular fa-note-sticky"></i>defective</label>
                        <input type="text" class="form-control" id="defective" name="defective" placeholder="defective">
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-circle-xmark"></i> Close</button>
                <button id="consultationSubmit" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editconsulatationModal" role="dialog" style="display:none">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit consulatation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="ayform" method ="POST" action="#" enctype="multipart/form-data">
                <input type="hidden">
                <div class="form-group">
                        <label for="eeconsulatation_id" class="control-label"><i class="fa-regular fa-note-sticky"></i> consulatation id</label>
                        <input type="text" class="form-control" id="eeconsulatation_id" name="consulatation_id" placeholder="consulatation_id">
                    </div>
                    <div class="form-group">
                        <label for="eedefective" class="control-label"><i class="fa-regular fa-note-sticky"></i>Defective</label>
                        <input type="text" class="form-control" id="eedefective" name="defective" placeholder="defective">
                    </div>

                    <div class="form-group">
                        <label for="eerecomendation" class="control-label"><i class="fa-regular fa-note-sticky"></i>Price</label>
                        <input type="text" class="form-control" id="eerecomendation" name="recomendation" placeholder="recommendation">
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
            <button id="updatebtnconsulatation" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
        </div>
    </div>
</div>
</div>
@endsection