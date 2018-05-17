window.onload = function() {
    var allMonths = [
        'January', 'February', 'March', 'April', 'May',
        'June', 'July', 'August', 'September',
        'October', 'November', 'December'
    ];

    const months = new Array();
    const quantities = new Array();
    $.ajax("/order/getStatistic", {
        dataType: "json",
        method: "post",
        success: function (data) {
            console.log(data);
            for (index in data) {
                months.push(allMonths[data[index]['month'] - 1]);
                quantities.push(data[index]['quantity']);
            }
        },
        error: function (data, status) {

        }
    });

    var ctx = document.getElementById("myChart").getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: "Статистика заказов по месяцам",
                backgroundColor: 'rgb(30, 144, 255)',
                borderColor: 'rgb(0, 0, 139)',
                data: quantities,
            }]
        },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            min: 0,
                            max: 10,
                            stepSize: 1

                        }
                    }]
            }
        }
    });
}



