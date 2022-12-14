$(document).ready(function () {
    $('#atable').DataTable({
        ajax:{
            url:"/api/appliance/all",
            // url:"http://localhost:5000/api/v1/appliances",
            dataSrc: ""
        },
        dom:'Bfrtip',
        buttons:[
            'pdf',
            'excel',
            {
                text:'Add appliance',
                className: 'btn btn-primary',
                action: function(a, dt, node, config){
                    $("#aform").trigger("reset");
                    $('#applianceModal').modal('show');
                }
            }
        ],
        columns:[
            {data: 'appliance_id'},
            {data: 'model'},
            {data: 'brand'},
            
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
                        data.appliance_id + "><i class='fa-solid fa-pen-to-square' aria-hidden='true' style='font-size:40px' ></i></a>";
                },
            },
            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='deletebtn' data-id=" + data.appliance_id + "><i class='fa-solid fa-trash' style='font-size:40px; color:red'></a></i>";
                },
            },

            {data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='restorebtn' data-id=" + data.appliance_id + "><i class='fa-solid fa-rotate-right' style='font-size:30px; color:red'></a></i>";
                },  orderable: false, searchable: false
            },
        ]
        
    })//end datatables


    $("#applianceSubmit").on("click", function (a) {
        a.preventDefault();
        // var data = $("#iform").serialize();
        var data = $('#aform')[0];
        console.log(data);
        let formData = new FormData(data);

        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

        $.ajax({
            type: "post",
            url: "/api/appliance",
            data: formData,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType:"json", 

            success:function(data){
                   console.log(data);
                   $("#applianceModal").modal("hide");

                   var $atable = $('#atable').DataTable();
                   $atable.row.add(data.appliance).draw(false); 
            },

            error:function (error){
                console.log(error);
            }
        })
    });
}); //Document.ready endatables