<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>VH-21-04-Streak | Registration</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <h2 style="color:white" class="text-center">VH-21-04-Streak</h2>
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Full Name</label>
                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email Address</label>
                                            <input class="form-control" type="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Contact No.</label>
                                            <input class="form-control" type="tel" name="phone" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="form-control-label">Monthly Income</label>
                                            <input class="form-control" type="number" min="0" step="1" name="monthly_income" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Currency</label>
                                            <select class="form-control" name="currency" required>
                                                <option selected="selected" value="INR">INR</option>
                                                <option value="USD">USD</option>
                                                <option value="EURO">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Password</label>
                                            <input class="form-control" type="password" id="pass" name="pass" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Confirm Password</label>
                                            <input class="form-control" type="password" id="cpass" name="cpass" required>
                                        </div>
                                    </div>
                                </div>
                                <div id="pass_error" class="d-none form-text text-danger">Password does not Match.</div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-lg btn-primary" type="submit" id="register" name="register">Register</button>
                                </div>
                            </form>
                            <div class="text-center dont-have">Already have an account? <a href="index.php">Login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/script.js"></script>

    <script>
        let logic = false;

        $('#cpass').on('input', function() {
            let password = $('#pass').val();
            logic = ($(this).val() === password) ? true : false;
            if (!logic) {
                $('#pass_error').removeClass('d-none');
            } else {
                $('#pass_error').addClass('d-none');
            }
        })

        $("#register").on('click', function(e) {

            e.preventDefault();
            if (logic) {
                var form = $('form');
                var url = 'php/ajax/register.php';
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {
                        console.log(data);
                        console.table(data); // show response from the php script.
                    }
                });
            }
        });
    </script>

</body>

</html>