$(document).ready(function() {
    $('#atable').DataTable({
            ajax: {
                url: "/api/appliance/all",
                // url:"http://localhost:5000/api/v1/appliances",
                dataSrc: ""
            },
            dom: 'Bfrtip',
            buttons: [
                'pdf',
                'excel',
                {
                    text: 'Add appliance',
                    className: 'btn btn-primary',
                    action: function(a, dt, node, config) {
                        $("#aform").trigger("reset");
                        $('#applianceModal').modal('show');
                        $('#editapplianceModal').modal('show');
                    }
                }
            ],
            columns: [
                { data: 'appliance_id' },
                { data: 'customer_id' },
                { data: 'model' },
                { data: 'brand' },

                {
                    data: null,
                    render: function(data, type, JsonResultRow, row) {
                        return '<img src="/storage/' + JsonResultRow.imagePath + '" width="80px" height="80px">';
                    },
                },

                // {data: null,
                //     render:function(data, type, row){
                //         // console.log(data.img_path)
                //         // return <img src="/storage/${data.img_path}" width="100px" height="100px">;
                //         return <imtg src= ${data.imagePath} "height="100px" width="100px">;
                //     }
                // },
                {
                    data: null,
                    render: function(data, type, row) {
                        return "<a href='#' class='editBtn id='editbtn' data-id=" +
                            data.appliance_id + "><i class='fa fa-pencil' aria-hidden='true' style='font-size:26px' aria-hidden='true' style='font-size:40px' ></i></a>";
                    },
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return "<a href='#' class='deletebtn' data-id=" + data.appliance_id + "><i class='fa-solid fa-trash' style='font-size:40px; color:green'></a></i>";
                    },
                },

                {
                    data: null,
                    render: function(data, type, row) {
                        return "<a href='#' class='restorebtn' data-id=" + data.appliance_id + "><i class='fa-solid fa-rotate-right' style='font-size:30px; color:red'></a></i>";
                    },
                    orderable: false,
                    searchable: false
                },
            ]

        }) //end datatables


    $("#applianceSubmit").on("click", function(a) {
        a.preventDefault();
        validationForCreateAppliances.form();
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
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",

            success: function(data) {
                console.log(data);

                $(location).attr('href', "appliance-insert");
            },

            error: function(error) {
                console.log(error);
            }
        })
    });



    var validationForCreateAppliances =  $("#aform").validate({
        rules: {
           appliance_id:{required:true},
          customer_id: { required:true},
           model: { required:true},
            brand:  { required:true},
           uploads: { required:true},
          
    
            },
        messages: {
            appliance_id:"Field is Required ",
           customer_id: "Field is Required ",
            model: "Comment is Required ",
           brand: "Price is Required ",
            uploads: "Field is Required ",
          
            },
    });
    
    
    // validation for update
    var validationForUpdateAppliances =  $("#ayform").validate({
        rules: {
            repair_id:{required:true},
           type: { required:true},
           description: { required:true},
            price: { required:true, number: true},
           uploads: { required:true},
            },

        messages: {
            repair_id:"Field is Required ",
            type: "Comment is Required ",
            description: "Price is Required ",
            price: "Date is Required ",
            uploads: "Field is Required ",
            },
    });


    $("#atable tbody").on("click", "a.editBtn", function (a) {
        a.preventDefault();
        validationFormUpdateAppliances.form();
        var id = $(this).data('id');
        $('#editapplianceModal').modal('show');


        $.ajax({
            type: "GET",
            url: "api/appliance/" + id + "/edit",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function(data){
                   console.log(data);
                   $("#eeapplaince_id").val(data.applaince_id);
                   $("#eemodel").val(data.model);
                   $("#eebrand").val(data.brand);
                 
                //    $("#eeimagePath").val(data.imagePath);
                },
                error: function(){
                    console.log('AJAX load did not work');
                    alert("error");
                }
            });
        });//end edit fetch
}); //Document.ready endatables