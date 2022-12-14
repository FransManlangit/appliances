// $(document).ready(function () {
//     $('#ctable').DataTable({
//         ajax:{
//             url:"/api/customer",
//             dataSrc: ""
//         },
//         dom:'Bfrtip',
//         buttons:[
//             'pdf',
//             'excel',
//             {
//                 text:'Add New Customer',
//                 className: 'btn btn-primary',
//                 action: function(e, dt, node, config){
//                     $("#cform").trigger("reset");
//                     $('#customerModal').modal('show');
//                 }
//             }
//         ],
//         columns:[
//             {data: 'customer_id'},
//             {data: 'lname'},
//             {data: 'fname'},
//             {data: 'addressline'},
//             {data: 'town'},
//             {data: 'zipcode'},
//             {data: 'phone'},
//             {data: null,
//                 render: function (data,type,JsonResultRow,row) {
//                     return '<img src="/storage/' + JsonResultRow.imagePath + '" width="100px" height="100px">';
//                 },
//             },
//             {data: null,
//                 render: function (data, type, row) {
//                     return "<a href='#' class='editBtn id='editbtn' data-id=" +
//                         data.customer_id + "><i class='fa-solid fa-pen-to-square' aria-hidden='true' style='font-size:30px' ></i></a>";
//                 },
//             },
//             {data: null,
//                 render: function (data, type, row) {
//                     return "<a href='#' class='deletebtn' data-id=" + data.customer_id + "><i class='fa-sharp fa-solid fa-trash' style='font-size:30px; color:red'></a></i>";
//                 },
//             },
//         ]
        
//     })//end datatables

// // }); //end of document


// $("#customerSubmit").on("click", function (e) {
//     e.preventDefault();
//     // var data = $("#iform").serialize();
//     var data = $('#cform')[0];
//     console.log(data);
//     let formData = new FormData(data);

//     console.log(formData);
//     for (var pair of formData.entries()) {
//         console.log(pair[0] + ', ' + pair[1]);
//     }

//     $.ajax({
//         type: "POST",
//         url: "/api/customer",
//         data: formData,
//         contentType: false,
//         processData: false,
//         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
//         dataType:"json", 

//         success:function(data){
//                console.log(data);
//                $("#customerModal").modal("hide");

//                var $ctable = $('#ctable').DataTable();
//                $ctable.row.add(data.customer).draw(false); 
//         },

//         error:function (error){
//             console.log(error);
//         }
//     })
// });

// });



$(document).ready(function () {
    $('#ctable').DataTable({
        ajax:{
            url:"/api/customer/all",
            // url:"http://localhost:5000/api/v1/customers",
            dataSrc: ""
        },
        dom:'Bfrtip',
        buttons:[
            'pdf',
            'excel',
            {
                text:'Add customer',
                className: 'btn btn-primary',
                action: function(c, dt, node, config){
                    $("#cform").trigger("reset");
                    $('#customerModal').modal('show');
                }
            }
        ],
        columns:[
            {data: 'customer_id'},
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
                        data.customer_id + "><i class='fa-solid fa-pen-to-square' aria-hidden='true' style='font-size:40px' ></i></a>";
                },
            },
            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='deletebtn' data-id=" + data.customer_id + "><i class='fa-solid fa-trash' style='font-size:40px; color:red'></a></i>";
                },
            },

            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='restorebtn' data-id=" + data.customer_id + "><i class='fa-solid fa-rotate-right' style='font-size:30px; color:red'></a></i>";
                },  orderable: false, searchable: false
            },
        ]
        
    })//end datatables

    $("#customerSubmit").on("click", function (c) {
        c.preventDefault();
        // var data = $("#iform").serialize();
        var data = $('#cform')[0];
        console.log(data);
        let formData = new FormData(data);

        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

        $.ajax({
            type: "post",
            url: "/api/customer",
            data: formData,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType:"json", 

            success:function(data){
                   console.log(data);
                   $("#customerModal").modal("hide");

                   var $ctable = $('#ctable').DataTable();
                   $ctable.row.add(data.customer).draw(false); 
            },

            error:function (error){
                console.log(error);
            }
        })
    });


    

    $("#ctable tbody").on("click", "a.editBtn", function (c) {
        c.preventDefault();
        var id = $(this).data('id');
        $('#editcustomerModal').modal('show');


        $.ajax({
            type: "GET",
            url: "api/customer/" + id + "/edit",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function(data){
                   console.log(data);
                   $("#eecustomer_id").val(data.customer_id);
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



         
        $("#updatebtncustomer").on('click', function(c) {
            c.preventDefault();
            var id = $('#eecustomer_id').val();
            //var data = $("#updateItemform").serialize();
            console.log(data);

            var table =$('#ctable').DataTable();
            var cRow = $("tr td:contains(" + id + ")").closest('tr');
            var data =$("#ayform").serialize();

            $.ajax({
                type: "PUT",
                // url: "api/item/"+ id,
                url: `api/item/${id}`,
                data: data,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    // $('#editItemModal').each(function(){
                    //         $(this).modal('hide'); });

                    $('#editItemModal').modal("hide");
                    table.row(cRow).data(data).invalidate().draw(false);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });//end update

        // $('#editcustomerModal').on('show.bs.modal', function(e) {
        //     var id = $(e.relatedTarget).attr('data-id');
        //     // console.log(id);
        //     $('<input>')
        //     .attr({
        //         type: 'hidden', 
        //         id:'customer_id',
        //         name: 'customer_id',
        //         value: id
        //     })
        //     .appendTo('#updateformcustomer');
            
        //     $.ajax({
        //         type: "GET",
        //         url: "api/customer/" + id + "/edit",
        //         success: function(data){
        //             //  console.log(data);
        //             $("#ccustomer_id").val(data.customer_id);
        //                       //    $("#cuser_id").val(data.user_id);
        //                         $("#cfname").val(data.fname);
        //                          $("#clname").val(data.lname);
        //                           $("#caddressline").val(data.addressline);
        //                            $("#ctown").val(data.town);
        //                           $("#czipcode").val(data.zipcode);
        //                          $("#cphone").val(data.phone);
        //                           $("#cimagePath").val(data.imagePath);
        //             },
        //             error: function(){
        //                 console.log('AJAX load did not work');
        //                 alert("error");
        //             }
        //         });
        //     });
    
        //     $('#editcustomerModal').on('hidden.bs.modal', function (e) {
        //         $("#updateformcustomer").trigger("reset");
        //         $("#customer_id").remove();
        //       });
              
            
        //     $("#updatebtncustomer").on('click', function(e) {
        //         var id = $('#customer_id').val();
        //          var data = $("#updateformcustomer").serialize();
        //         console.log(data);
        //         $.ajax({
        //             type: "PUT",
        //             url: "api/customer/"+ id,
        //             data: data,
        //             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //             dataType: "json",
        //             success: function(data) {
        //                 console.log(data);
    
        //                 $("#editcustomerModal").css('backgroundColor','hsl(143, 100%, 50%)').each(function () {
        //                     $(this).modal("hide");
        //                     window.location.reload();
                      
        //                 });
        //             },
        //             error: function(error) {
        //                 console.log(error);
        //             }
        //         });
        //     });
        
        $("#ctable tbody").on("click", "a.deletebtn", function (c) {
            var table = $('#ctable').DataTable();
            var id = $(this).data('id');
            var $row = $(this).closest('tr');
            console.log(id);
    
            c.preventDefault();
            bootbox.confirm({
                message: "Do you want to delete this customer",
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
                            url: "/api/customer/" + id,
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
                                $row.fadeOut(4000, function(){
                                    table.row($row).remove().draw(false)
                                });
                                bootbox.alert(data.success)
                               
                            },
                            error: function (error) {
                                console.log(error);
                            },
                        });
                },
            });
        });//DELETE
}); //Document.ready end
