<?php
require_once('php/auth_session.php');
require_once('php/db_con.php');
$id = $_SESSION['Users_Id'];
$sql = "SELECT masters_users.Email_Id, masters_profile.Monthly_Inc, masters_profile.User_Name, masters_profile.Contact_Number, masters_profile.Monthly_Inc, masters_profile.Currency FROM masters_users INNER JOIN masters_profile ON masters_users.Users_Id = masters_profile.Users_Id WHERE masters_users.Users_Id = '$id'";
$sql_result = mysqli_query($conn, $sql);
$sql_result_array = mysqli_fetch_array($sql_result);

if (isset($_POST['update'])) {
    $User_Name = $_POST['User_Name'];
    $Monthly_Inc = $_POST['Monthly_Inc'];
    $Currency = $_POST['currency'];
    $update = "UPDATE `masters_profile` SET masters_profile.User_Name = '$User_Name', masters_profile.Monthly_Inc= '$Monthly_Inc', masters_profile.Currency = '$Currency' WHERE masters_profile.Users_Id = '$id' ";
    $update_result = mysqli_query($conn, $update);
    if ($update_result == TRUE) {
        header('location:profile.php');
    }
}




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
                                    <div class="d-flex align-items-center mb-4">
                                        <h5 class="page-title">Dashboard</h5>
                                        <ul class="breadcrumb ml-2">
                                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Update Profile</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-9 col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Basic information</h5>
                                    </div>
                                    <div class="card-body">

                                        <form method="POST">
                                            <div class="row form-group">
                                                <label for="User_Name" class="col-sm-3 col-form-label input-label">Full Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="User_Name" name="User_Name" value="<?php echo $sql_result_array['User_Name'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="Email_Id" class="col-sm-3 col-form-label input-label">Email Id</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" id="Email_Id" name="Email_Id" value="<?php echo $sql_result_array['Email_Id'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="Contact_Number" class="col-sm-3 col-form-label input-label">Contact Number</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="Contact_Number" name="Contact_Number" value="<?php echo $sql_result_array['Contact_Number'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label for="Monthly_Inc" class="col-sm-3 col-form-label input-label">MonthlyInc</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="Monthly_Inc" name="Monthly_Inc" value="<?php echo $sql_result_array['Monthly_Inc'] ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">

                                                <label class="col-sm-3 col-form-label input-label">Currency</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="currency" required>
                                                        <option selected="selected" value="INR">INR</option>
                                                        <option value="USD">USD</option>
                                                        <option value="EURO">EURO</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


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