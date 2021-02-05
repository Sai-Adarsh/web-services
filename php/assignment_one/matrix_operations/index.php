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
						Matrix Operations
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Matrix is required">
						<input class="input100" type="text" name="matrix">
						<span class="label-input100">Matrix</span>
					</div>
					
                    <div class="wrap-input100">
						<input class="input100" type="text" disabled name="array2">
						<span class="label-input100">Disabled</span>
					</div>

					<div class="container-login100-form-btn">
						<select class="btn btn-secondary dropdown-toggle" id="operation" name="operation">
							<option value="transpose">Transponse</option>
							<option value="lower_diagonal">Lower Diagonal</option>
							<option value="upper_diagonal">Upper Diagonal</option>
						</select>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Run
						</button>
					</div>
                    
                    <div class="text-center w-full p-t-23">
						<a href="#" class="txt1">
							<?php
								include('transpose.php');
								include('lower_diagonal.php');
								include('upper_diagonal.php');
								
								if ($_SERVER["REQUEST_METHOD"] == "POST") {

									$str = $_POST['matrix'];
									if ($_POST['operation'] == 'transpose') {
										$result_json = array('result' => transpose($str));
									}

									elseif ($_POST['operation'] == 'lower_diagonal') {
										$result_json = array('result' => lowerDiagonal($str));
									}

									elseif ($_POST['operation'] == 'upper_diagonal') {
										$result_json = array('result' => upperDiagonal($str));
									}

									header('Cache-Control: no-cache, must-revalidate');
									header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
									echo json_encode($result_json);
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