$(document).ready(function(){
$("#signoutUser").on('click', function(e) {
    e.preventDefault();

    var data = $('#signoutForm')[0];
    var formData = new FormData(data);
    console.log(data);

    $.ajax({
        type: "GET",
        url: "api/logout",
        data: formData,
        contentType: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
dataType: "json",
        success: function(data) {
            console.log(data);
            $(location).attr('href', "home");
            
        },
        error: function(error) {
            console.log(error);
        }
    });
});
});