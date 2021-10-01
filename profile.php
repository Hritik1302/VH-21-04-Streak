<?php
require_once('php/db_con.php');
// $id = $_SESSION['User_Id'];
// $sql = "SELECT * `masters_users` WHERE 'User_Id' = $id ORDER BY 'User_Id' DESC LIMIT 1";
// $sql_result = mysqli_query($conn, $sql);
// $sql_result_array = mysqli_fetch_array($sql_result);
// $name = $sql_result_array['name'];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>VH-21-04-Profile</title>

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
            <a href="javascript:void(0);" id="toggle_btn"> <i class="fas fa-bars"></i>
            </a>
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i>
            </a>


            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow main-drop ml-md-3">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img src="assets/img/avatar.jpg" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.php"><i class="feather-user"></i> My Profile</a>
                        <a class="dropdown-item" href="login.php"><i class="feather-power"></i> Logout</a>
                    </div>
                </li>
            </ul>

        </div>
        <div class="page-wrapper ml-3">
            <div class="content container-fluid">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center">
                                        <h5 class="page-title">Dashboard</h5>
                                        <ul class="breadcrumb ml-2">
                                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="profile-cover">
                            <div class="profile-cover-wrap">
                                <img class="profile-cover-img" src="assets/img/avatar_demo.jpg" alt="Profile Cover">

                                <div class="cover-content">
                                    <div class="custom-file-btn">
                                        <input type="file" class="custom-file-btn-input" id="cover_upload">
                                        <label class="custom-file-btn-label btn btn-sm btn-white" for="cover_upload">
                                            <i class="fas fa-camera"></i>
                                            <span class="d-none d-sm-inline-block ml-1">Update Cover</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-center my-4">
                            <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
                                <img class="avatar-img" src="assets/img/avatar.jpg" alt="Profile Image">
                                <input type="file" id="avatar_upload">
                                <span class="avatar-edit">
                                    <i class="feather-edit-2 avatar-uploader-icon shadow-soft"></i>
                                </span>
                            </label>
                            <h2>Hritik Kanojiya <i class="fas fa-certificate text-primary small" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"></i></h2>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="notifications">
            <div class="topnav-dropdown-header">
                <span class="notification-title">Notifications</span>
                <a href="javascript:void(0)" class="clear-noti"> <i class="feather-x-circle"></i> </a>
            </div>
            <div class="noti-content">
                <ul class="notification-list">
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="assets/img/profiles/avatar-02.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                    <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="assets/img/profiles/avatar-03.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
                                    <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="assets/img/profiles/avatar-06.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="assets/img/profiles/avatar-17.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
                                    <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="#">
                            <div class="media">
                                <span class="avatar">
                                    <img alt="" src="assets/img/profiles/avatar-13.jpg" class="rounded-circle">
                                </span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                    <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="topnav-dropdown-footer">
                <a href="javascript:void(0);">View all Notifications</a>
            </div>
        </div>

    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>