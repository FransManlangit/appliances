$(document).ready(function () {
    $('#etable').DataTable({
        ajax:{
            url:"/api/employee/all",
            // url:"http://localhost:5000/api/v1/employees",
            dataSrc: ""
        },
        dom:'Bfrtip',
        buttons:[
            'pdf',
            'excel',
            {
                text:'Add employee',
                className: 'btn btn-primary',
                action: function(e, dt, node, config){
                    $("#eform").trigger("reset");
                    $('#employeeModal').modal('show');
                }
            }
        ],
        columns:[
            {data: 'employee_id'},
            {data: 'user_id'},
            {data: 'fname'},
            {data: 'lname'},
            {data: 'addressline'},
            {data: 'town'},
            {data: 'zipcode'},
            {data: 'phone'},
            {data: null,
                render: function (data,type,JsonResultRow,row) {
                    return '<img src="/storage/' + JsonResultRow.imagePath + '" width="80px" height="80px">';
                },
            },

             // {data: null,
            //     render:function(data, type, row){
            //         // console.log(data.img_path)
            //         // return `<img src="/storage/${data.img_path}" width="100px" height="100px">`;
            //         return `<imtg src= ${data.imagePath} "height="100px" width="100px">`;
            //     }
            // },
            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='editBtn id='editbtn' data-id=" +
                        data.employee_id + "><i class='fa fa-pencil' aria-hidden='true' style='font-size:26px' aria-hidden='true' style='font-size:25px' ></i></a>";
                },
            },
            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='deletebtn' data-id=" + data.employee_id + "><i class='fa-solid fa-trash' style='font-size:40px; color:red'></a></i>";
                },
            },

            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='restorebtn' data-id=" + data.employee_id + "><i class='fa-solid fa-rotate-right' style='font-size:30px; color:green'></a></i>";
                },  orderable: false, searchable: false
            },
        ]
        
    })//end datatables


    $("#employeeSubmit").on("click", function (e) {
        e.preventDefault();
        // var data = $("#iform").serialize();
        var data = $('#eform')[0];
        console.log(data);
        let formData = new FormData(data);

        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

        $.ajax({
            type: "post",
            url: "/api/employee",
            data: formData,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType:"json", 

            success:function(data){
                   console.log(data);
                   $("#employeeModal").modal("hide");

                   var $etable = $('#etable').DataTable();
                   $etable.row.add(data.employee).draw(false); 
            },

            error:function (error){
                console.log(error);
            }
        })
    });


    $("#etable tbody").on("click", "a.editBtn", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#editemployeeModal').modal('show');


        $.ajax({
            type: "GET",
            url: "api/employee/" + id + "/edit",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function(data){
                   console.log(data);
                   $("#eeemployee_id").val(data.employee_id);
                   $("#eefname").val(data.fname);
                   $("#eelname").val(data.lname);
                   $("#eeaddressline").val(data.addressline);
                   $("#eetown").val(data.town);
                   $("#eezipcode").val(data.zipcode);
                   $("#eephone").val(data.phone);
                //    $("#eeimagePath").val(data.imagePath);
                },
                error: function(){
                    console.log('AJAX load did not work');
                    alert("error");
                }
            });
        });//end edit fetch

        $("#updatebtnemployee").on('click', function(e) {
            e.preventDefault();
            var id = $('#eeemployee_id').val();
            //var data = $("#updateItemform").serialize();
            // console.log(data);

            var data = $('#ayform')[0];
            var formData = new FormData(data);
            var table =$('#etable').DataTable();
            var eRow = $("tr td:contains(" + id + ")").closest('tr');
            console.log(data);

            $.ajax({
                type: "POST",
                // url: "api/item/"+ id,
                url: "api/employee/update/" + id,
                data: formData,
                contentType: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    // $('#editItemModal').each(function(){
                    //         $(this).modal('hide'); });

                    $('#editemployeeModal').modal("hide");
                    table.row(eRow).data(data).invalidate().draw(false);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });//end update


        $("#etable tbody").on("click", "a.deletebtn", function (e) {
            var table = $('#etable').DataTable();
            var id = $(this).data('id');
            var $row = $(this).closest('tr');
            console.log(id);
    
            e.preventDefault();
            bootbox.confirm({
                message: "Do you want to delete this Employee",
                buttons: {
                    confirm: {
                        label: "Yes",
                        className: "btn-success",
                    },
                    cancel: {
                        label: "No",
                        className: "btn-danger",
                    },
                },
                callback: function (result) {
                    if (result)
                        $.ajax({
                            type: "DELETE",
                            url: "/api/employee/" + id,
                            // url:`http://localhost:5000/api/v1/customers/${id}`,
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                // bootbox.alert('success');
                                // $tr.find("td").fadeOut(2000, function () {
                                //     $tr.remove();
                                // $row.fadeOut(4000, function(){
                                //     table.row($row).remove().draw(false)
                                // });
                                bootbox.alert(data.success)
                               
                            },
                            error: function (error) {
                                console.log(error);
                            },
                        });
                },
            });
        });//DELETE


        $("#etable tbody").on("click", "a.restorebtn", function (e) {
            var table = $('#etable').DataTable();
            var id = $(this).data('id');
            var $row = $(this).closest('tr');
            console.log(id);
    
            e.preventDefault();
            bootbox.confirm({
                message: "Do you want to Restore this employee",
                buttons: {
                    confirm: {
                        label: "Yes",
                        className: "btn-success",
                    },
                    cancel: {
                        label: "No",
                        className: "btn-danger",
                    },
                },
                callback: function (result) {
                    if (result)
                        $.ajax({
                            type: "get",
                            url: "/api/restore/employee/" + id,
                            // url:`http://localhost:5000/api/v1/customers/${id}`,
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                // bootbox.alert('success');
                                // $tr.find("td").fadeOut(2000, function () {
                                //     $tr.remove();
                                // $row.fadeOut(4000, function(){
                                //     table.row($row).remove().draw(false)
                                // });
                                bootbox.alert(data.success)
                               
                            },
                            error: function (error) {
                                console.log(error);
                            },
                        });
                },
            });
        });//Resotore

}); //Document.ready end