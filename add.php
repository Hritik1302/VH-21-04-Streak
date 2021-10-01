<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>VH-21-04-Streak | Add Item</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        .wrapper {
            margin: auto;
            max-width: 640px;
            padding-top: 60px;
            text-align: center;
        }

        .container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            /*border: 0.5px solid rgba(130, 130, 130, 0.25);*/
            /*box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1), 
              0 0 0 1px rgba(0, 0, 0, 0.1);*/
        }

        h1 {
            color: #130f40;
            font-family: 'Varela Round', sans-serif;
            letter-spacing: -.5px;
            font-weight: 700;
            padding-bottom: 10px;
        }

        .upload-container {
            background-color: rgb(239, 239, 239);
            border-radius: 6px;
            padding: 10px;
        }

        .border-container {
            border: 5px dashed rgba(198, 198, 198, 0.65);
            /*   border-radius: 4px; */
            padding: 20px;
        }

        .border-container p {
            color: #130f40;
            font-weight: 600;
            font-size: 1.1em;
            letter-spacing: -1px;
            margin-top: 30px;
            margin-bottom: 0;
            opacity: 0.65;
        }

        #file-browser {
            text-decoration: none;
            color: rgb(22, 42, 255);
            border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
        }

        #file-browser:hover {
            color: rgb(0, 0, 255);
            border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
        }

        .icons {
            color: #95afc0;
            opacity: 0.55;
        }
    </style>
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

            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow main-drop ml-md-3">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img src="assets/img/avatar.jpg" alt="">
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
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <ul class="breadcrumb ml-2">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Add Item</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="login-right-wrap">
                            <h1>Add your Items Manually</h1>
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Document Number</label>
                                            <input class="form-control" type="text" name="doc_no" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Category</label>
                                            <input class="form-control" type="text" name="cate" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Vendor Name <small>(Optional)</small></label>
                                            <input class="form-control" type="text" name="vendor_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Amount <small>Rs.</small></label>
                                            <input class="form-control" type="number" min="0" step="1" name="amount" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-lg btn-block btn-primary" type="submit" name="register">Register</button>
                                </div>
                            </form>
                            <div class="text-center dont-have">Already have an account? <a href="index.php">Login</a></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-right-wrap">
                            <form>
                                <div class="wrapper">
                                    <div class="container">
                                        <h1>Upload a file</h1>
                                        <div class="upload-container">
                                            <div class="border-container">
                                                <div class="icons fa-4x">
                                                    <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                                                    <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                                                    <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                                                </div>
                                                <!--<input type="file" id="file-upload">-->
                                                <p>Drag and drop files here, or
                                                    <a href="#" id="file-browser">browse</a> your computer.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-lg btn-primary" type="submit" name="upload">Upload</button>
                                </div>
                            </form>
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

    <script>
        $("#file-upload").css("opacity", "0");

        $("#file-browser").click(function(e) {
            e.preventDefault();
            $("#file-upload").trigger("click");
        });
    </script>
</body>

</html>