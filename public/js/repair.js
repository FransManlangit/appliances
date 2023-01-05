$(document).ready(function () {
    $('#rptable').DataTable({
        ajax:{
            url:"/api/repair/all",
            // url:"http://localhost:5000/api/v1/repairs",
            dataSrc: ""
        },
        dom:'Bfrtip',
        buttons:[
            'pdf',
            'excel',
            {
                text:'Add repair',
                className: 'btn btn-primary',
                action: function(rp, dt, node, config){
                    $("#rpform").trigger("reset");
                    $('#repairModal').modal('show');
                }
            }
        ],
        columns:[
            {data: 'repair_id'},
            {data: 'type'},
            {data: 'description'},
            {data: 'price'},
       
          
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
                        data.repair_id + "><i class='fa fa-pencil' aria-hidden='true' style='font-size:26px' aria-hidden='true' style='font-size:40px' ></i></a>";
                },
            },
            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='deletebtn' data-id=" + data.repair_id + "><i class='fa-solid fa-trash' style='font-size:40px; color:red'></a></i>";
                },
            },

            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='restorebtn' data-id=" + data.repair_id + "><i class='fa-solid fa-rotate-right' style='font-size:30px; color:green'></a></i>";
                },  orderable: false, searchable: false
            },
        ]
        
    })//end datatables

    $("#repairSubmit").on("click", function (rp) {
        rp.preventDefault();
        // var data = $("#iform").serialize();
        var data = $('#rpform')[0];
        console.log(data);
        let formData = new FormData(data);

        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

        $.ajax({
            type: "post",
            url: "/api/repair",
            data: formData,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType:"json", 

            success:function(data){
                   console.log(data);
                   $("#repairModal").modal("hide");

                   var $rptable = $('#rptable').DataTable();
                   $rptable.row.add(data.repair).draw(false); 
            },

            error:function (error){
                console.log(error);
            }
        })
    });

    
    $("#rptable tbody").on("click", "a.editBtn", function (rp) {
        rp.preventDefault();
        var id = $(this).data('id');
        $('#editrepairModal').modal('show');


        $.ajax({
            type: "GET",
            url: "api/repair/" + id + "/edit",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function(data){
                   console.log(data);
                   $("#eerepair_id").val(data.repair_id);
                   $("#eetype").val(data.type);
                   $("#eedescription").val(data.description);
                   $("#eeprice").val(data.price);
                
                //    $("#eeimagePath").val(data.imagePath);
                },
                error: function(){
                    console.log('AJAX load did not work');
                    alert("error");
                }
            });
        });//end edit fetch


        $("#updatebtnrepair").on('click', function(rp) {
            rp.preventDefault();
            var id = $('#eerepair_id').val();
            //var data = $("#updateItemform").serialize();
            // console.log(data);
            var data = $('#ayform')[0];
           var formData = new FormData(data);

            var table =$('#rptable').DataTable();
            var cRow = $("tr td:contains(" + id + ")").closest('tr');
            // var data =$("#ayform").serialize();
            console.log(data);
            $.ajax({
                type: "POST",
                // url: "api/item/"+ id,
                // url: `api/repair/update/${id}`,
                 url: "api/repair/update/" + id,
                data: formData,
                contentType: false,
                processData: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    // $('#editItemModal').each(function(){
                    //         $(this).modal('hide'); });

                    $('#editrepairModal').modal("hide");
                    table.row(cRow).data(data).invalidate().draw(false);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });//end update


        $("#rptable tbody").on("click", "a.deletebtn", function (rp) {
            var table = $('#rptable').DataTable();
            var id = $(this).data('id');
            var $row = $(this).closest('tr');
            console.log(id);
    
            rp.preventDefault();
            bootbox.confirm({
                message: "Do you want to delete this repair",
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
                            url: "/api/repair/" + id,
                            // url:`http://localhost:5000/api/v1/repairs/${id}`,
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

        $("#rptable tbody").on("click", "a.restorebtn", function (rp) {
            var table = $('#rptable').DataTable();
            var id = $(this).data('id');
            var $row = $(this).closest('tr');
            console.log(id);
    
            rp.preventDefault();
            bootbox.confirm({
                message: "Do you want to Restore this repair",
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
                            url: "/api/restore/repair/" + id,
                            // url:`http://localhost:5000/api/v1/repairs/${id}`,
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