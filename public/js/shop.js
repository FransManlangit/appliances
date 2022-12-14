// var repairCount = 0;
// var priceTotal = 0;
// var quantity = 0;
// var clone = "";

// $(document).ready(function () {
//     $.ajax({
//         type: "GET",
//         url: "/api/repair",
//         dataType: 'json',
//         success: function (data) {
//             console.log(data);
//             $.each(data, function (key, value) {
//                 // console.log(key);
//                 id = value.repair_id;
//                 var repair = "<div class='repair'><div class='repairDetails'><div class='repairImage'><img src="+"/storage/" + value.imagePath + " width='200px', height='200px'/></div><div class='repairText'><p class='price-container'>Price: Php <span class='price'>" + value.sell_price + "</span></p><p>" + value.description + "</p></div><input type='number' class='qty' name='quantity' min='1' max='5'><p class='repairId'>" + value.repair_id + "</p>      </div><button type='button' class='btn btn-primary add' >Add to cart</button></div>";
//                 $("#repairs").append(repair);

//             });

//         },
//         error: function () {
//             console.log('AJAX load did not work');
//             alert("error");
//         }
//     });
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/repair",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
                // console.log(key);
                id = value.repair_id;
                var repair = "<div class='repair'><div class='repairDetails'><div class='repairImage'><img src="+"/storage/" + value.imagePath + " width='200px', height='200px'/></div><div class='repairText'><p class='price-container'>Price: Php <span class='price'>" + value.sell_price + "</span></p><p>" + value.description + "</p></div><input type='number' class='qty' name='quantity' min='1' max='5'><p class='repairId'>" + value.repair_id + "</p>      </div><button type='button' class='btn btn-primary add' >Add to cart</button></div>";
                $("#repairs").append(repair);

            });

        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });

    
    $("#repair").on('click', '.add', function () {
        repairCount ++;
        $('#repairCount').text(repairCount).css('display', 'block');
        clone =  $(this).siblings().clone().appendTo('#cartrepairs')
                   .append('<button class="removerepair">Remove repair</button>');
        var price = parseInt($(this).siblings().find('.price').text()); 
        priceTotal += price;
        $('#cartTotal').text("Total: $" + priceTotal);
        });
    
    
        $('#shoppingCart').on('click', '.removerepair', function(){
            $(this).parent().remove();  
            repairCount --;
            $('#repairCount').text(repairCount);
      
            // Remove Cost of Deleted repair from Total Price
            var price = parseInt($(this).siblings().find('.price').text());
            priceTotal -= price;
            $('#cartTotal').text("Total: php" + priceTotal);
      
            if (repairCount == 0) {
              $('#repairCount').css('display', 'none');
            }
          });

    $('.openCloseCart').click(function(){
        $('#shoppingCart').toggle();
    });

    $('#emptyCart').click(function() {
        repairCount = 0;
        priceTotal = 0;

        $('#repairCount').css('display', 'none');
        $('#cartrepairs').text('');
        $('#cartTotal').text("Total: $", priceTotal);
    });

    $("#repairs").on('click', '.add', function () {
        repairCount ++;
        $('#repairCount').text(repairCount).css('display', 'block');
        clone =  $(this).siblings().clone().appendTo('#cartrepairs')
                   .append('<button class="removerepair">Remove repair</button>');
        var price = parseInt($(this).siblings().find('.price').text()); 
        priceTotal += price;
        $('#cartTotal').text("Total: â‚¬" + priceTotal);
        });
    
    
        $('#shoppingCart').on('click', '.removerepair', function(){
            $(this).parent().remove();  
            repairCount --;
            $('#repairCount').text(repairCount);
      
            // Remove Cost of Deleted repair from Total Price
            var price = parseInt($(this).siblings().find('.price').text());
            priceTotal -= price;
            $('#cartTotal').text("Total: php" + priceTotal);
      
            if (repairCount == 0) {
              $('#repairCount').css('display', 'none');
            }
          });
          $('#emptyCart').click(function() {
            repairCount = 0;
            priceTotal = 0;
      
            $('#repairCount').css('display', 'none');
            $('#cartrepairs').text('');
            $('#cartTotal').text("Total: $" + priceTotal);
          }); 

          
          $('#checkout').click(function () {
            repairCount = 0;
            priceTotal = 0;
            let repairs = new Array();
            
            $("#cartrepairs").find(".repairDetails").each(function (i, element) {
                // console.log(element);
                let repairid = 0;
                let qty = 0;
    
                qty = parseInt($(element).find($(".qty")).val());
                repairid = parseInt($(element).find($(".repairId")).html());
    
                repairs.push(
                    {
                        "repair_id": repairid,
                        "quantity": qty
                    }
                );
    
            });
            console.log(JSON.stringify(repairs));
            var data = JSON.stringify(repairs);
    
            $.ajax({
                type: "POST",
                url: "/api/repair/checkout",
                data: data,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                dataType: "json",
                processData: false,
                contentType: 'application/json; charset=utf-8',
                success: function (data) {
                    console.log(data);
                    alert(data.status);
                },
                error: function (error) {
                    alert(data.status);
                }
            });
            $('#repairCount').css('display', 'none');
            $('#cartrepairs').text('');
            $('#cartTotal').text("Total: â‚¬" + priceTotal);
    
            // console.log(clone.find(".repairDetails"));
    
        });
})