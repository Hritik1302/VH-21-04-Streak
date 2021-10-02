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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                                            <li class="breadcrumb-item active">Update Profile</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-md-7">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Basic information</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="User_Name" class="col-form-label input-label">Full Name</label>
                                                        <input type="text" class="form-control" id="User_Name" name="User_Name" value="<?php echo $sql_result_array['User_Name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Email_Id" class="col-form-label input-label">Email Id</label>
                                                        <input type="email" class="form-control" id="Email_Id" name="Email_Id" value="<?php echo $sql_result_array['Email_Id'] ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Contact_Number" class="col-form-label input-label">Contact Number</label>
                                                        <input type="number" class="form-control" id="Contact_Number" name="Contact_Number" value="<?php echo $sql_result_array['Contact_Number'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Monthly_Inc" class="col-form-label input-label">Monthly Income</label>
                                                        <input type="number" class="form-control" id="Monthly_Inc" name="Monthly_Inc" value="<?php echo $sql_result_array['Monthly_Inc'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <?php
                                                        $url = 'https://free.currconv.com/api/v7/currencies?apiKey=8bfa59c615ffe94939f9';
                                                        $fetch = file_get_contents($url);
                                                        $data = json_decode($fetch);
                                                        ?>
                                                        <label class="form-control-label">Currency</label>
                                                        <select class="form-control dynamic-select" name="currency" required>
                                                            <?php foreach ($data->results as $sa) { ?>
                                                                <option value="<?php echo $sa->id; ?>"><?php echo $sa->currencyName; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3">
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

            <script src="assets/js/jquery-3.6.0.min.js"></script>

            <script src="assets/js/bootstrap.bundle.min.js"></script>

            <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

            <script src="assets/js/script.js"></script>

            <script>
                $(".dynamic-select").select2({
                    tags: false
                });
            </script>
</body>

</html>