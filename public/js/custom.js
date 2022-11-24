$(document).ready(function () {
    $('#ctable').DataTable({
        ajax:{
            url:"/api/customer",
            dataSrc: ""
        },
        dom:'Bfrtip',
        buttons:[
            'pdf',
            'excel',
            {
                text:'Add New Customer',
                className: 'btn btn-primary',
                action: function(e, dt, node, config){
                    $("#cform").trigger("reset");
                    $('#customerModal').modal('show');
                }
            }
        ],
        columns:[
            {data: 'customer_id'},
            {data: 'lname'},
            {data: 'fname'},
            {data: 'addressline'},
            {data: 'town'},
            {data: 'zipcode'},
            {data: 'phone'},
            {data: null,
                render: function (data,type,JsonResultRow,row) {
                    return '<img src="/storage/' + JsonResultRow.imagePath + '" width="100px" height="100px">';
                },
            },
            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='editBtn id='editbtn' data-id=" +
                        data.customer_id + "><i class='fa-solid fa-pen-to-square' aria-hidden='true' style='font-size:30px' ></i></a>";
                },
            },
            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='deletebtn' data-id=" + data.customer_id + "><i class='fa-sharp fa-solid fa-trash' style='font-size:30px; color:red'></a></i>";
                },
            },
        ]
        
    })//end datatables

// }); //end of document


$("#customerSubmit").on("click", function (e) {
    e.preventDefault();
    // var data = $("#iform").serialize();
    var data = $('#cform')[0];
    console.log(data);
    let formData = new FormData(data);

    console.log(formData);
    for (var pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
    }

    $.ajax({
        type: "POST",
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

});