<?php
$this->load->view('template/cdn');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,100&display=swap" rel="stylesheet">
	<title>Login</title>
	<style media="screen">
		* {
			font-family: 'Poppins', sans-serif;
		}

		body {
			background-color: #fcf6f5ff;
		}

		.container {
			min-height: 100vh; // height of the browser viewport
			display: flex;
			align-items: center;
		}

		.login-box {
			border: #89abe3ff 0.5px solid;
			box-shadow: 1px 1px #89abe3ff;
		}

		.btn-primary {
			background-color: #89abe3ff;
			border-color: #89abe3ff;
		}

		.title {
			font-weight: 200;
		}
	</style>
</head>

<body>
	<div class="container container-fluid d-flex align-items-center justify-content-center">
		<div class="reg-box p-3 w-25 sm-w-25">
			<div class="title h4">
				<span>Login</span>
				<small id="re-error" class="form-text text-muted d-none" style="color:red!important">Please check you email and password and try again.</small>
			</div>
			<form class="p-2">
				<div class="form-group mb-3">
					<label for="email1">Email address</label>
					<input type="text" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="re-email" class="form-text text-muted d-none" style="color:red!important">Please Enter a valid email.</small>
				</div>
				<div class="form-group mb-3">
					<label for="pass1">Password</label>
					<input type="password" class="form-control" id="pass1" placeholder="Password">
					<small id="re-pass" class="form-text text-muted d-none" style="color:red!important">Password cannot empty.</small>
				</div>
				<input type="submit" class="btn btn-primary ">
			</form>
		</div>
	</div>
	</div>
</body>

<script>
	email = 0
	pass = 0

	function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test($email);
	}

	function validateName($name) {
		var nameReg = /^\s*$/;
		return nameReg.test($name);
	}

$("input").on("change, input",function(e){
  validate();
})
function validate(){
  if (!validateEmail($("#email1").val())) {
    $("#re-email").removeClass("d-none");
    email = 1
  } else {
    $("#re-email").addClass("d-none");
    email = 0
  }

  if (!validateName($("#pass1").val())) {
    $("#re-pass").removeClass("d-none");
    pass = 1
  } else {
    $("#re-pass").addClass("d-none");
    pass = 0
  }
  return 0
}

	$("form").submit(function(e) {
		e.preventDefault(); // avoid to execute the actual submit of the form.
    validate();
		if (pass === 1 && email === 1) {
			var form = $(this);
			var url = "Login Validate Url";
			$.ajax({
				type: "POST",
				url: url,
				data: form.serialize(), // serializes the form's elements.
				success: function(data) {
					alert(data); // show response from the php script.
				}
			});
		}
    else{  validate();}
	});
</script>

</html>
