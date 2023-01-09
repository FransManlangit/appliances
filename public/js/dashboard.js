$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/dashboard/title-chart",
        dataType: "json",
        success: function (data) {
            console.log(data);
            var myBarChart = "<div class='product'>";
            var ctx = document.getElementById("titleChart");
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Number of Active Customers',
                        data: data.data,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });

        },
        error: function (error) {
            console.log(error);
        }
    });


    $.ajax({
        type: "GET",
        url: "/api/dashboard/SalesChart",
        dataType: "json",
        success: function (data) {
            console.log(data);
            var ctx = document.getElementById("SalesChart");
            // var ctx = "<div class='product'>";
            var myBarChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Numbers of Supplies Ordered',
                        data: data.data,
                        backgroundColor: () => {
                             //generates random colours and puts them in string
                             var size = {
                                'width':100,
                                'height':100};
                             var colors = [];
                            for (var i = 0; i < data.data.length; i++) {
                              var letters = '0123456789ABCDEF'.split('');
                              var color = '#';
                              for (var x = 0; x < 6; x++) {
                                color += letters[Math.floor(Math.random() * 16)];
                              }
                              colors.push(color);
                            }

                            return colors;
                          },

                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1,
                        responsive: true,
                    }]
                },
                
            });
            
        },
        error: function (error) {
            console.log(error);
        }
    });

});