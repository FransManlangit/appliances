$("#customerbtn").on("click", function (e) {
    e.preventDefault();
    $("#items").hide("slow");-
    $("#customers").show();
});

$.ajax({
    type: "GET",
    url: "/api/customer/all",
    dataType: "json",
    success: function (data) {
        console.log(data);
        $.each(data, function (key, value) {
            console.log(value);
            var id = value.customer_id;
            var tr = $("<tr>");
            tr.append($("<td>").html(value.customer_id));
            tr.append($("<td>").html(value.title));
            tr.append($("<td>").html(value.lname));
            tr.append($("<td>").html(value.fname));
            tr.append($("<td>").html(value.addressline));
            tr.append($("<td>").html(value.phone));
            tr.append($("<td>").html(value.creditlimit));
            tr.append($("<td>").html(value.level));
            tr.append("<td align='center'><a href='#' data-bs-toggle='modal' data-bs-target='#editModal' id='editbtn' data-id="+ id + "><i class='fa-solid fa-user-pen' aria-hidden='true' style='font-size:24px' ></a></i></td>");
            tr.append("<td align='center'><a href='#' class='deletebtn' data-id=" + id +"><i  class='fa-sharp fa-solid fa-trash' style='font-size:24px; color:red'></a></i></td>");
            tr.append("<td align='center'><a href="+'/customer/'+ id +'/restore'+"><i class='fa-solid fa-trash-can-arrow-up' aria-hidden='true' style='font-size:24px; color:green' ></a></i></td>");
            
            $("#cbody").append(tr);
        });
    },
    error: function () {
        console.log("AJAX load did not work");
        alert("error");
    },
});

$("#myFormSubmit").on("click", function (e) {
    e.preventDefault();
    var data = $("#cform").serialize();
    console.log(data);
    $.ajax({
        type: "POST",
        url: "/api/customer",
        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            // $("myModal").modal("hide");
            $("#myModal").each(function () {
                $(this).modal("hide");
            });
            var tr = $("<tr>");
            tr.append($("<td>").html(data.customer_id));
            tr.append($("<td>").html(data.title));
            tr.append($("<td>").html(data.lname));
            tr.append($("<td>").html(data.fname));
            tr.append($("<td>").html(data.addressline));
            tr.append($("<td>").html(data.phone));
            tr.append($("<td>").html(data.creditlimit));
            tr.append($("<td>").html(data.level));
            tr.append("<td align='center'><a href='#' data-bs-toggle='modal' data-bs-target='#editModal' id='editbtn' data-id="+ data.customer_id + "><i class='fa-solid fa-user-pen' aria-hidden='true' style='font-size:24px' ></a></i></td>");
            tr.append("<td align='center'><a href='#'  class='deletebtn' data-id=" + data.customer_id +"><i  class='fa-sharp fa-solid fa-trash' style='font-size:24px; color:red' ></a></i></td>");
            tr.append("<td align='center'><a href="+'/customer/'+id+'/restore'+"><i class='fa-solid fa-trash-can-arrow-up' aria-hidden='true' style='font-size:24px; color:green' ></a></i></td>");
            $("#cbody").prepend(tr);
        },
        error: function (error) {
            console.log(error);
        },
    });
});

$("#cbody").on("click", ".deletebtn", function (e) {
    var id = $(this).data("id");
    var $tr = $(this).closest("tr");
    // var id = $(e.relatedTarget).attr('id');
    console.log(id);
    e.preventDefault();
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
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        // bootbox.alert('success');

                        $tr.find("td").css('backgroundColor','hsl(0,100%,50%').fadeOut(2000, function () {
                            $tr.remove();
                        });
                        
                        
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
        },
    });
});

$("#editModal").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).attr("data-id");
    // console.log(id);
    $("<input>")
        .attr({
            type: "hidden",
            id: "customerid",
            name: "customer_id",
            value: id,
        })
        .appendTo("#updateform");
    $.ajax({
        type: "GET",
        url: "/api/customer/" + id + "/edit",
        success: function (data) {
            // console.log(data);
            $("#etitle").val(data.title);
            $("#elname").val(data.lname);
            $("#efname").val(data.fname);
            $("#eaddress").val(data.addressline);
            $("#etown").val(data.town);
            $("#ezipcode").val(data.zipcode);
            $("#ephone").val(data.phone);
            $("#ecreditlimit").val(data.creditlimit);
            $("#elevel").val(data.level);
        },
        error: function () {
            console.log("AJAX load did not work");
            alert("error");
        },
    });
});

$("#editModal").on("hidden.bs.modal", function (e) {
    $("#updateform").trigger("reset");
});

$("#updatebtn").on("click", function (e) {
    var id = $("#customerid").val();
    var data = $("#updateform").serialize();
    console.log(data);
    $.ajax({
        type: "PUT",
        url: "/api/customer/" + id,
        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (data) {
            console.log(data);

            $("#editModal").css('backgroundColor','hsl(143, 100%, 50%)').each(function () {
                $(this).modal("hide");
                window.location.reload();
            });

        },
        error: function (error) {
            console.log(error);
        },
    });
});
