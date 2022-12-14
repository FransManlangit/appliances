$('.form').find('input, textarea').on('keyup blur focus', function(c) {

    var $this = $(this),
        label = $this.prev('label');

    if (c.type === 'keyup') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.addClass('active highlight');
        }
    } else if (c.type === 'blur') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.removeClass('highlight');
        }
    } else if (c.type === 'focus') {

        if ($this.val() === '') {
            label.removeClass('highlight');
        } else if ($this.val() !== '') {
            label.addClass('highlight');
        }
    }

});

$('.tab a').on('click', function(c) {

    c.preventDefault();

    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');

    target = $(this).attr('href');

    $('.tab-content > div').not(target).hide();

    $(target).fadeIn(600);

});

$(document).ready(function() {

    $("#customerSubmit").on("click", function(c) {
        c.preventDefault();
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
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",

            success: function(data) {
                console.log(data);
                // $("#customerModal").modal("hide");

                // var $ctable = $('#ctable').DataTable();
                // $ctable.row.add(data.customer).draw(false);

                $(location).attr('href', "signin");

                // function newFunction() {
                //     var element = document.getElementById("cform");
                //     element.reset()
                // }
            },

            error: function(error) {
                console.log(error);
            }
        })
    });
});