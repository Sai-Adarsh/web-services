<!DOCTYPE html>
<html lang="en">
<head>
	<title>Web Services</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form class="login100-form validate-form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<span class="login100-form-title p-b-43">
						Date difference
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Start Date is required">
						<input class="input100" type="text" name="start_date">
						<span class="label-input100">Start Date (YYYY-MM-DD)</span>
					</div>
					
                    <div class="wrap-input100 rs2 validate-input" data-validate = "End Date is required">
						<input class="input100" type="text" name="end_date">
						<span class="label-input100">End Date (YYYY-MM-DD)</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Run
						</button>
					</div>
                    
                    <div class="text-center w-full p-t-23">
						<a href="#" class="txt1">
							<?php
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									// collect value of input field
									$start_date = $_POST['start_date'];
									$end_date = $_POST['end_date'];
									$start_date = date_create($start_date);
									$end_date = date_create($end_date);
									$diff= date_diff($end_date, $start_date);
									$diff = $diff->format('%R %y years %m months %d days %h hours %i seconds');
									// send the result now
									if (empty($start_date) || empty($end_date)) {
										echo "Dates are incorrect syntax";
									} else {
										echo $diff;
									}
								}
							?>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>




</body>
</html>