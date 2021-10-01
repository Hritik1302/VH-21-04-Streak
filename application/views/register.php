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
	<title>New user Registration</title>
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

		/* .reg-box {
			border: #89abe3ff 0.5px solid;
			box-shadow: 1px 1px #89abe3ff;
		} */
		.btn-primary {
			background-color: #89abe3ff;
			border-color: #89abe3ff;
		}

		.title {
			font-weight: 200;
		}

		.btn-primary.disabled,
		.btn-primary:disabled {
			color: #fff;
			background-color: #89abe3ff;
			border-color: #89abe3ff;
		}
	</style>
</head>

<body>
	<div class="container container-fluid d-flex align-items-center justify-content-center">
		<div class="reg-box p-3 w-25 sm-w-25">
			<div class="title h4">
				<span>Register New user</span>
			</div>
			<form class="p-2">
				<div class="form-group mb-3">
					<label for="name1">Orginazation/Individual Name</label>
					<input type="text" class="form-control" id="name1" aria-describedby="namelHelp" placeholder="Enter Orginazation Name">
          <small id="re-name" class="form-text text-muted d-none" style="color:red!important">Please enter you name.</small>
				</div>
				<div class="form-group mb-3">
					<label for="income1">Estimated monthly income</label>
					<input type="number" class="form-control" min="0" id="income1" aria-describedby="emailEstimated" placeholder="Income">
          <small id="re-income" class="form-text text-muted d-none" style="color:red!important">Cannot be empty.</small>
        </div>
				<div class="form-group mb-3">
					<label for="email1">Email address</label>
					<input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="re-email" class="form-text text-muted d-none" style="color:red!important">Please Enter a valid email.</small>
				</div>
				<div class="form-group mb-3">
					<label for="pass1">Password</label>
					<input type="password" class="form-control" id="pass1" placeholder="Password">
				</div>
				<div class="form-group mb-3">
					<label for="pass2">Re-Enter Password</label>
					<input type="password" class="form-control" id="pass2" placeholder="Confirm Password">
					<small id="re-pass" class="form-text text-muted d-none" style="color:red!important">Password do not match.</small>
				</div>
				<div class="form-check mb-3">
					<input type="checkbox" class="form-check-input" id="terms1">
					<label class="form-check-label" for="terms1">I agree to terms and condition</label>
				</div>
				<button type="submit" class="btn btn-primary register" disabled>Submit</button>
			</form>
		</div>
	</div>
	</div>
</body>
<script>
	var pass = 0;
	var email = 0;
	$("#pass2 #pass1").on("input", function() {
		if ($("#pass1").val() != $("#pass2").val()) {
			$("#re-pass").removeClass("d-none");
			pass = 0;
		} else {
			$("#re-pass").addClass("d-none");
			pass = 1;
		}
	})


	$("#email1").on("input", function() {
		if (!validateEmail($("#email1").val())) {
			$("#re-email").removeClass("d-none");
			email = 0;
		} else {
			$("#re-email").addClass("d-none");
			email = 1;
		}
	})

	$("input").on("change input keyup keydown", function() {
    checkError();
			if ($("#terms1").is(":checked") && (pass === 1 && email === 1) && checkError()) {
					$(".register").removeAttr("disabled");
				}
				if (!$("#terms1").is(":checked") || !(pass === 1 && email === 1) || !checkError()) {
					$(".register").attr("disabled", "true");
				}
			})

		function checkError() {
			if (validateName($("#name1").val())) {
				$("#re-name").removeClass("d-none");
        return false;
			} else {
				$("#re-name").addClass("d-none");
			}

			if (validateName($("#income1").val())) {
				$("#re-income").removeClass("d-none");
        return false;
			} else {
				$("#re-income").addClass("d-none");
			}
      if(!validateName($("#income1").val()) && !validateName($("#name1").val())){
        return true;
      }
		}

	function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test($email);
	}

	function validateName($name) {
		var nameReg = /^\s*$/ ;
		return nameReg.test($name);
	}
</script>

</html>
