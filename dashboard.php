<?php
require_once 'php/auth_session.php';
require_once 'php/db_con.php';
$Users_id = $_SESSION['Users_Id'];
$query = mysqli_query($conn, "SELECT * FROM `category_list` WHERE `User_Id` = '$Users_id'");

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
        max-height: 320px;
    }
</style>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i></a>

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

        <div class="page-wrapper m-4 pb-5">
            <div class="row pt-4">
                <div class="col-12 col-md-6 col-lg-3 d-flex flex-wrap">
                    <div class="card detail-box1 details-box">
                        <div class="card-body">
                            <div class="dash-contetnt">
                                <div class="mb-3">
                                    <img src="assets/img/icons/accident.svg" alt="" width="26">
                                </div>
                                <h4 class="text-white">Total Products</h4>
                                <h2 class="text-white">NA</h2>
                                <div class="growth-indicator">
                                    <span class="text-white"><i class="fas fa-angle-double-up mr-1"></i> (14.25%)</span>
                                </div>
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
                                <h4 class="text-white">Total Items</h4>
                                <h2 class="text-white">NA</h2>
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
                        $html .= '<input type="hidden" value="' . $row2['Bill_Amount'] . '" name="' . $row['Category'] . '">';
                    }
                }
                $html .= '</div></div></div>';
                echo $html;
            }
            ?>


            <div class="row justify-content-around">
                <div class="col-md-5 p-4" style="background: white;border-radius: 25px;">
                    <div class="login-right-wrap">
                        <h1 class="text-center">Pie Chart</h1>
                        <canvas id="pie_chart"></canvas>
                    </div>
                </div>
                <div class="col-md-5 p-4" style="background: white;border-radius: 25px;">
                    <div class="login-right-wrap">
                        <h1 class="text-center">Bar Graph</h1>
                        <canvas id="bar_graph"></canvas>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around pt-3">
                <div class="col-md-5 p-4" style="background: white;border-radius: 25px;">
                    <div class="login-right-wrap">
                        <h1 class="text-center">Polar Chart</h1>
                        <canvas id="polar_chart"></canvas>
                    </div>
                </div>
                <div class="col-md-5 p-4" style="background: white;border-radius: 25px;">
                    <div class="login-right-wrap">
                        <h1 class="text-center">Radar Chart</h1>
                        <canvas id="radar_chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
    <script src="assets/js/calander.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        var ctx = document.getElementById('pie_chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Grocery', 'Utility', 'Daily Product', 'Paper'],
                datasets: [{
                    label: 'Items',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
            }
        });

        var ctx = document.getElementById('bar_graph').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Grocery', 'Utility', 'Daily Product', 'Paper'],
                datasets: [{
                    label: 'Items',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
            }
        });

        var ctx = document.getElementById('polar_chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['Grocery', 'Utility', 'Daily Product', 'Paper'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 159, 64, 1)'
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
            }
        });

        var ctx = document.getElementById('radar_chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Grocery', 'Utility', 'Daily Product', 'Paper'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(255, 159, 64, 1)'
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
            }
        });

        function UpdateChart(valuesArray, amountArray) {
            valuesArrayCount = valuesArray.length;
            colorArray = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'];
            borderArray = ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];

            chartName = ['radar', 'polarArea', 'bar', 'pie'];
            chartId = ['radar_chart', 'polar_chart', 'bar_chart', 'pie_chart'];

            for (let index = 0; index < 5; index++) {
                var ctx = document.getElementById(chartId[index]).getContext('2d');
                var myChart = new Chart(ctx, {
                    type: chartName[index],
                    data: {
                        labels: valuesArray[index],
                        datasets: [{
                            label: 'Chart JS',
                            data: amountArray[index],
                            backgroundColor: function(){
                                const shuffled = colorArray.sort(() => 0.5 - Math.random());
                                let selected = shuffled.slice(0, valuesArrayCount);
                                return selected;
                            },
                            borderColor: function(){
                                const shuffled = borderArray.sort(() => 0.5 - Math.random());
                                let selected = shuffled.slice(0, valuesArrayCount);
                                return selected;
                            },
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
            }
        }

        function UpdateCheckBox() {
            var checkboxValues = [];
            var checkboxAmount = [];
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
            // UpdateChart(checkboxValues, checkboxAmount);
        }

        UpdateCheckBox();
    </script>
</body>

</html>