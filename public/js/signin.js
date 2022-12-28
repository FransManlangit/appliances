$('.form').find('input, textarea').on('keyup blur focus', function(e) {

    var $this = $(this),
        label = $this.prev('label');

    if (e.type === 'keyup') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.removeClass('highlight');
        }
    } else if (e.type === 'focus') {

        if ($this.val() === '') {
            label.removeClass('highlight');
        } else if ($this.val() !== '') {
            label.addClass('highlight');
        }
    }

});

$('.tab a').on('click', function(e) {

    e.preventDefault();

    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');

    target = $(this).attr('href');

    $('.tab-content > div').not(target).hide();

    $(target).fadeIn(600);

});

$(document).ready(function(){
    $("#signinUser").on('click', function(e) {
        e.preventDefault();

        var data = $('#signinForm')[0];
        var formData = new FormData(data);
        console.log(data);

        $.ajax({
            type: "POST",
            url: "api/signin",
            data: formData,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), },
dataType: "json",
            accepts: {
                json: 'application/json'
            },
            success: function(data) {
                $(location).attr('href', "home");
},
            error: function(error) {
                console.log(error);
               

            }
        });

    });

    
});