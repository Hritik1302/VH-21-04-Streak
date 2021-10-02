<?php
error_reporting(0);
require_once 'php/auth_session.php';
require_once 'php/db_con.php';
$Users_id = $_SESSION['Users_Id'];
$query = mysqli_query($conn, "SELECT * FROM `category_list` WHERE `User_Id` = '$Users_id'");
$prefercurrency = '';
function convertCurrency($amount, $from_currency, $to_currency)
{
    $apikey = '9f129629d1a7d3c12a70';
    $from_Currency = urlencode($from_currency);
    $to_Currency = urlencode($to_currency);
    $queryfun =  "{$from_Currency}_{$to_Currency}";
    $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$queryfun}&compact=ultra&apiKey={$apikey}");
    $obj = json_decode($json, true);
    $val = floatval($obj["$queryfun"]);
    $total = $val * $amount;
    return number_format($total, 2, '.', '');
}
$query3 = mysqli_query($conn, "SELECT * FROM `masters_profile` WHERE `Users_Id` = '$Users_id'");
while ($row3 = mysqli_fetch_array($query3)) {
    $prefercurrency = $row3['Currency'];
}

$query4 = mysqli_query($conn, "SELECT `Bill_Amount`,`Currency` FROM bill_data WHERE Bill_Date > (NOW() - INTERVAL 1 MONTH) AND `User_Id` = '$Users_id'");
$total = 0;
while ($row4 = mysqli_fetch_array($query4)) {
    $amount = convertCurrency($row4['Bill_Amount'], $row4['Currency'], $prefercurrency);
    $total = $amount + $total;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>VH-21-04-Streak | Bill Managment</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/simple-calendar/simple-calendar.css">
    <link rel="stylesheet" href="assets/css/feather.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js" integrity="sha512-b3xr4frvDIeyC3gqR1/iOi6T+m3pLlQyXNuvn5FiRrrKiMUJK3du2QqZbCywH6JxS5EOfW0DY0M6WwdXFbCBLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<style>
    canvas {
        width: 100% !important;
        height: auto !important;
        max-height: 500px;
    }
</style>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="row">
                <div class="col-md-3">
                    <div class="message pl-3 pt-3" style="font-size: 1.5rem;font-weight: 600;">
                        VH-21-04-Streak
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-end">
                        <div class="buttons mt-auto mb-auto">
                            <button type="button" class="btn btn-primary" onclick="window.open('add.php','_parent')">Add Bill</button>
                        </div>
                        <ul class="nav user-menu">
                            <li class="nav-item dropdown has-arrow main-drop ml-md-3">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <span class="user-img"><img src="assets/img/avatar.jpg" alt="placeholder">
                                        <span class="status online"></span></span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profile.php"><i class="feather-user"></i> My Profile</a>
                                    <a class="dropdown-item" href="logout.php"><i class="feather-power"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-wrapper m-4 pb-5">
            <div class="row pt-4">
                <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
                    <div class="card detail-box1 details-box">
                        <div class="card-body">
                            <div class="dash-contetnt">
                                <div class="mb-3">
                                    <i class="fas fa-rupee-sign"></i>
                                </div>
                                <h4 class="text-white">Preferred Currency</h4>
                                <h2 class="text-white"><?= $prefercurrency ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
                    <div class="card detail-box2 details-box">
                        <div class="card-body">
                            <div class="dash-contetnt">
                                <div class="mb-3">
                                    <img src="assets/img/icons/visits.svg" alt="" width="26">
                                </div>
                                <h4 class="text-white">Total Amount Spent in Last Month</h4>
                                <h2 class="text-white"><?= $total . ' ' . $prefercurrency ?></h2>
                                <div class="growth-indicator">
                                    <span class="text-white"><i class="fas fa-angle-double-down mr-1"></i> (4.78%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
                    <div class="card detail-box3 details-box">
                        <div class="card-body">
                            <div class="dash-contetnt">
                                <div class="mb-3">
                                    <img src="assets/img/icons/hospital-bed.svg" alt="" width="26">
                                </div>
                                <h4 class="text-white">New Items</h4>
                                <h2 class="text-white">NA</h2>
                                <div class="growth-indicator">
                                    <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (18.32%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
                    <div class="card detail-box4 details-box">
                        <div class="card-body">
                            <div class="dash-contetnt">
                                <div class="mb-3">
                                    <img src="assets/img/icons/operating.svg" alt="" width="26">
                                </div>
                                <h4 class="text-white">Total Income</h4>
                                <h2 class="text-white">NA</h2>
                                <div class="growth-indicator">
                                    <span class="text-white"><i class="fas fa-angle-double-down mr-1"></i> (25.14%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (mysqli_num_rows($query) > 0) {
                $html = '<div class="card">
                <div class="card-header">
                    <h5 class="card-title">Compare Data</h5>
                </div>
                <div class="card-body">
                        <div class="row justify-content-around">';
                while ($row = mysqli_fetch_array($query)) {
                    $html .= '<div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="chk" id="chk" onclick="UpdateCheckBox(this)" value="' . $row['Category'] . '" checked> ' . $row['Category'] . '
                                    </label>
                                </div>';
                    $query2 = mysqli_query($conn, "SELECT * FROM `bill_data` WHERE `User_Id` = '$_SESSION[Users_Id]' AND `Bill_Category` = '$row[Category]'");
                    while ($row2 = mysqli_fetch_array($query2)) {
                        $conversion = convertCurrency($row2['Bill_Amount'], $row2['Currency'], $prefercurrency);

                        $html .= '<input type="hidden" value="' . $conversion . '" name="' . $row['Category'] . '">';
                    }
                }
                $html .= '</div></div></div>';
                echo $html;
            }
            ?>


            <div class="row justify-content-around">
                <div class="col-md-7 p-4" style="background: white;border-radius: 25px;">
                    <div class="login-right-wrap">
                        <h1 class="text-center">Your Monthly Expense Analysis</h1>
                        <canvas id="pie_chart"></canvas>
                    </div>
                </div>
                <div class="col-md-4 card">
                    <div class="card-header">
                        <h5 class="card-title">Analysis Report</h5>
                    </div>
                    <div class="card-body card-body-height">
                        <ul class="activity-feed">
                        <div class="pie_chart_message" style="font-size:25px"></div>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-md-3 p-4" style="background: white;border-radius: 25px;">
                    <div class="login-right-wrap">
                        <div class="pie_chart_message"></div>
                    </div>
                </div> -->
            </div>
            <div class="row justify-content-around pt-3">
                <div class="col-md-8 p-4" style="background: white;border-radius: 25px;">
                    <div class="login-right-wrap">
                        <h1 class="text-center">Your Expense Analysis Comparision with Last Month</h1>
                        <canvas id="bar_chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- <input type="hidden" name="" id= "value1">
        <input type="hidden" name="" id= "value2"> -->

    </div>
    </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
    <script src="assets/js/calander.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        // var ctx = document.getElementById('pie_chart').getContext('2d');
        // var myChart = new Chart(ctx, {
        //     type: 'pie',
        //     data: {
        //         labels: ['Grocery', 'Utility', 'Daily Product', 'Paper'],
        //         datasets: [{
        //             label: 'Items',
        //             data: [12, 19, 3, 5],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255, 99, 132, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });
        var checkboxValues = [];
        var checkboxAmount = [];

        $(document).ready(function() {

            function PieChart(valuesArray, amountArray) {
                valuesArrayCount = valuesArray.length;
                colorArray = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'];
                borderArray = ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];

                var shuffled = colorArray.sort(() => 0.5 - Math.random());
                let selectedColor = shuffled.slice(0, valuesArrayCount);

                var shuffled = borderArray.sort(() => 0.5 - Math.random());
                let selectedBorder = shuffled.slice(0, valuesArrayCount);

                var ctx = document.getElementById('pie_chart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: valuesArray,
                        datasets: [{
                            label: 'Chart JS',
                            data: amountArray,
                            backgroundColor: selectedColor,
                            borderColor: selectedBorder,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                var total = 0;
                for (let index = 0; index < valuesArrayCount; index++) {
                    total = total + parseInt(amountArray[index]);
                }

                for (let index = 0; index < valuesArrayCount; index++) {
                    var currentAmount = parseFloat(amountArray[index]);
                    var currentName = valuesArray[index];
                    var percent = parseInt((currentAmount / total) * 100);
                    var message = percent + '% spent on ' + currentName + '<br>';

                    var message = "<li class='feed-item'><span class='feed-text'>"+percent + '% spent on' + currentName+"</span></li>";
                    $('.pie_chart_message').append(message);
                }
            }

            function UpdateCheckBox() {
                $('input[name=chk]:checked').map(function() {
                    checkboxValues.push($(this).val());
                });

                for (let index = 0; index < checkboxValues.length; index++) {
                    var total = 0;
                    var a = checkboxValues[index];
                    $('input[name ="' + a + '"]').map(function() {
                        total = total + parseInt($(this).val());
                    });
                    checkboxAmount.push(total);
                }
                PieChart(checkboxValues, checkboxAmount);
            }

            UpdateCheckBox();
        })

        var url = 'php/ajax/pastone.php';
        var url2 = 'php/ajax/pasttwo.php';

        checkboxValuesB = [];

        $('input[name=chk]:checked').map(function() {
            checkboxValuesB.push($(this).val());
        });

        var amount1 = [];
        var amount2 = [];

        for (let index = 0; index < checkboxValuesB.length; index++) {
            $.ajax({
                type: "post",
                url: url,
                async: false,
                data: {
                    category: checkboxValuesB[index],
                },
                success: function(data) {
                    amount1.push(data);
                }
            });

            $.ajax({
                type: "post",
                url: url2,
                async: false,
                data: {
                    category: checkboxValuesB[index],
                },
                success: function(data) {
                    amount2.push(data);
                }
            });

            amount2[index] = amount2[index] - amount1[index];
        }

        // for (let index = 0; index < checkboxValuesB.length; index++) {
        //     var total = 0;
        //     var a = checkboxValuesB[index];
        //     $('input[name ="' + a + '"]').map(function() {
        //         total = total + parseInt($(this).val());
        //     });
        //     checkboxAmount.push(total);
        // }

        var barChartData = {
            labels: checkboxValuesB,
            datasets: [{
                    label: "Last Month",
                    backgroundColor: "pink",
                    borderColor: "red",
                    borderWidth: 1,
                    data: amount1
                },
                {
                    label: "This month",
                    backgroundColor: "lightblue",
                    borderColor: "blue",
                    borderWidth: 1,
                    data: amount2
                },
            ]
        };
        var chartOptions = {
            responsive: true,
            legend: {
                position: "top"
            },
            title: {
                display: true,
                text: "Chart.js Bar Chart"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
        var ctx = document.getElementById("bar_chart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: "bar",
            data: barChartData,
            options: chartOptions
        });

        // var myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: checkboxValues,
        //         datasets: [{
        //                 label: "Last Month",
        //                 backgroundColor: "pink",
        //                 borderColor: "red",
        //                 borderWidth: 1,
        //                 data: [3, 5, 7]
        //             },
        //             {
        //                 label: "This month",
        //                 backgroundColor: "lightblue",
        //                 borderColor: "blue",
        //                 borderWidth: 1,
        //                 data: [4, 4, 6]
        //             },
        //         ]
        //     },
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });
    </script>
</body>

</html>