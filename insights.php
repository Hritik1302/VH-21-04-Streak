<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>VH-21-04-Streak | Insights</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/simple-calendar/simple-calendar.css">
    <link rel="stylesheet" href="assets/css/feather.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

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

        <div class="page-wrapper ml-4">
            <div class="row pt-4 justify-content-around">
                <div class="col-md-5 text-center shadow-lg ">
                    <div class="container">
                        <h2>Pie Chart</h2>
                        <div class="mb-3">
                            <img src="https://quickchart.io/chart?c={type:'pie', data:{ labels:['January','February', 'March' ,'April', 'May' ], datasets:[{data:[50,60,70,180,190]}] } }" height="50%" width="90%">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 text-center shadow-lg">
                    <div class="container">
                        <h2>Bar Graph</h2>
                        <div class="mb-3">
                            <img src="https://quickchart.io/chart?c={type:'bar',data:{labels:['January','February', 'March','April', 'May'], datasets:[{label:'Dogs',data:[50,60,70,180,190]},{label:'Cats',data:[100,200,300,400,500]}]}}" height="50%" width="90%">
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/dsh-apaxcharts.js"></script>
    <script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
    <script src="assets/js/calander.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>