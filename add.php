<?php require_once 'php/auth_session.php' ?>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        .wrapper {
            margin: auto;
            max-width: 640px;
            /* padding-top: 60px; */
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

        .select2-container .select2-selection--single {
            height: 47px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 48px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 10px;
            width: 25px;
        }

        .select2-container .select2-selection--single {
            border: 1px solid #ccc;
        }

        label.error {
            color: red;
        }
    </style>
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

        <div class="page-wrapper">
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

                <div class="row justify-content-around">
                    <div class="col-md-5 p-4" style="background: white;border-radius: 25px;">
                        <div class="login-right-wrap">
                            <h1 class="text-center">Add your Items Manually</h1>
                            <form action="" id="manual-form" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Vendor Name <small>(Optional)</small></label>
                                            <select class="form-control dynamic-select" name="vendor_name">
                                                <option selected="selected" value="NULL">Empty(None)</option>
                                                <option value="Dmart">Dmart</option>
                                                <option value="Reliance Stores">Reliance Stores</option>
                                                <option value="Big Bazzar">Big Bazzar</option>
                                                <option value="Jio Mart">Jio Mart</option>
                                                <option value="Zomato">Zomato</option>
                                                <option value="Swiggy">Swiggy</option>
                                                <option value="Amazon">Amazon</option>
                                                <option value="Flipkart">Flipkart</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Bill Date</label>
                                            <input class="form-control" type="date" name="bill_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Category</label>
                                            <select class="form-control dynamic-select" name="category">
                                                <option selected="selected">Grocery</option>
                                                <option>Health Care</option>
                                                <option>Utility</option>
                                                <option>Restaurants</option>
                                                <option>Papers</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Amount</label>
                                            <input class="form-control" type="number" min="0" step="1" name="amount" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            $url = 'https://free.currconv.com/api/v7/currencies?apiKey=f1453288cb239163fc60';
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
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-lg btn-primary" type="submit" id="submit_manually" name="submit_manually">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5 p-4" style="background: white;border-radius: 25px;">
                        <div class="login-right-wrap">
                            <h1 class="text-center">Upload your Bill</h1>
                            <form>
                                <div class="wrapper">
                                    <div class="container">
                                        <div class="upload-container">
                                            <div class="border-container">
                                                <div class="icons fa-4x">
                                                    <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                                                    <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                                                    <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                                                </div>
                                                <input type="file" id="file-upload" style="opacity: 0;">
                                                <p>Drag and drop files here, or
                                                    <a href="#" id="file-browser">browse</a> your computer.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center mt-3">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('document').ready(function() {
            let todayDate = new Date().toISOString().slice(0, 10);

            $("input[name=bill_date]").val(todayDate);

            $("#file-upload").css("opacity", "0");

            $("#file-browser").click(function(e) {
                e.preventDefault();
                $("#file-upload").trigger("click");
            });

            $(".dynamic-select").select2({
                tags: false
            });
        })

        $("#submit_manually").on('click', function(e) {
            e.preventDefault();
            if ($("#manual-form").valid()) {
                var form = $('form');
                var url = 'php/ajax/add.php';
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(data) {
                        if (data == 200) {
                            Swal.fire({
                                title: 'Bill Added succesfully',
                                icon: 'success',
                                showCancelButton: true,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                cancelButtonText: 'View Insights',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Add another',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'add.php';
                                } else if (result.isDismissed) {
                                    window.location.href = 'dashboard.php';
                                }
                            })
                        } else {
                            Swal.fire(
                                'Something went wrong!',
                                'Try again later',
                                'error'
                            )
                        }
                    }
                });
            }
        });

        $("#manual-form").validate({
            rules: {
                bill_date: {
                    required: true,
                },
                category: {
                    required: true,
                },
                amount: {
                    required: true,
                    digits: true
                },
                curreny: {
                    required: true,
                }
            },
            messages: {
                bill_date: {
                    required: "Enter Proper Bill Date",
                },
                category: {
                    required: "Please Select a Category",
                },
                amount: {
                    required: "Please Enter a valid Amount",
                },
                curreny: {
                    required: "Please Enter a valid Currency",
                }
            }
        });
    </script>
</body>

</html>