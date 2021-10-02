<?php
require_once('php/auth_session.php');
require_once('php/db_con.php');
$id = $_SESSION['Users_Id'];
$sql = "SELECT masters_users.Email_Id, masters_profile.Monthly_Inc, masters_profile.User_Name, masters_profile.Contact_Number, masters_profile.Monthly_Inc, masters_profile.Currency FROM masters_users INNER JOIN masters_profile ON masters_users.Users_Id = masters_profile.Users_Id WHERE masters_users.Users_Id = '$id'";
$sql_result = mysqli_query($conn, $sql);
$sql_result_array = mysqli_fetch_array($sql_result);





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>VH-21-04-Streak</title>

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
                            <button type="button" class="btn btn-primary" onclick="window.open('index.php','_parent')">Dashboard</button>
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
                        <div class=" my-4">
                            <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
                                <img class="avatar-img" src="assets/img/avatar.jpg" alt="Profile Image">
                                <input type="file" id="avatar_upload">
                                <span class="avatar-edit">
                                    <i class="feather-edit-2 avatar-uploader-icon shadow-soft"></i>
                                </span>
                            </label>
                            <div class="text-center">
                                <h2><?php echo $sql_result_array['User_Name'] ?><i class="fas fa-certificate text-primary small" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified"></i></h2>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="card mb-0">
                                        <div class="card-header">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Profile</span>
                                            </h5>
                                        </div>
                                        <div>
                                            <div class="card-body pb-3">
                                                <div class="row mb-2">
                                                    <div class="col-12">
                                                        <label class="form-label" for="User_Name">Full Name</label>
                                                        <input type="text" class="form-control" id="User_Name" name="User_Name" value="<?php echo $sql_result_array['User_Name'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="Email_Id">Email Id</label>
                                                        <input type="email" class="form-control" id="Email_Id" name="Email_Id" value="<?php echo $sql_result_array['Email_Id'] ?>" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="Contact_Number">Contact Number</label>
                                                        <input type="number" class="form-control" id="Contact_Number" name="Contact_Number" value="<?php echo $sql_result_array['Contact_Number'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="Monthly_Inc">MonthlyInc</label>
                                                        <input type="number" class="form-control" id="Monthly_Inc" name="Monthly_Inc" value="<?php echo $sql_result_array['Monthly_Inc'] ?>" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="Currency">Currency</label>
                                                        <input type="text" class="form-control" id="Currency" name="Currency" value="<?php echo $sql_result_array['Currency'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end text-right mt-2">
                                                    <div class="col-4 mt-2">
                                                        <a href="update.php"><button type="submit" class="btn btn-primary">Edit Profile</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                            </div>
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

            <script src="assets/js/script.js"></script>
</body>

</html>