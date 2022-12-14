$(document).ready(function () {
    $('#rtable').DataTable({
        ajax:{
            url:"/api/repair/all",
            // url:"http://localhost:5000/api/v1/appliances",
            dataSrc: ""
        },
        dom:'Bfrtip',
        buttons:[
            'pdf',
            'excel',
            {
                text:'Add repair',
                className: 'btn btn-primary',
                action: function(r, dt, node, config){
                    $("#rform").trigger("reset");
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
                        data.repair_id + "><i class='fa-solid fa-pen-to-square' aria-hidden='true' style='font-size:40px' ></i></a>";
                },
            },
            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='deletebtn' data-id=" + data.repair_id + "><i class='fa-solid fa-trash' style='font-size:40px; color:red'></a></i>";
                },
            },

            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='restorebtn' data-id=" + data.repair_id + "><i class='fa-solid fa-rotate-right' style='font-size:30px; color:red'></a></i>";
                },  orderable: false, searchable: false
            },
        ]
        
    })//end datatables

    $("#repairSubmit").on("click", function (r) {
        r.preventDefault();
        // var data = $("#iform").serialize();
        var data = $('#rform')[0];
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

                   var $rtable = $('#rtable').DataTable();
                   $rtable.row.add(data.repair).draw(false); 
            },

            error:function (error){
                console.log(error);
            }
        })
    });


}); //Document.ready end