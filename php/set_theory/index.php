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
						Set Theory
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Array 1 is required">
						<input class="input100" type="text" name="array1">
						<span class="label-input100">Array 1</span>
					</div>
					
                    <div class="wrap-input100 rs2 validate-input" data-validate = "Array 2 is required">
						<input class="input100" type="text" name="array2">
						<span class="label-input100">Array 2</span>
					</div>

					<div class="container-login100-form-btn">
						<select class="btn btn-secondary dropdown-toggle" id="operation" name="operation">
							<option value="union">Union</option>
							<option value="intersection">Intersection</option>
							<option value="difference">Difference</option>
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
							include('union.php');
							include('intersection.php');
							include('difference.php');
							
							$array1 =  (isset($_POST["array1"])?$_POST["array1"]:"");
							$array1 = explode(', ', $array1);
							
							$array2 =  (isset($_POST["array2"])?$_POST["array2"]:"");
							$array2 = explode(', ', $array2);

							
							
							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['operation'] == 'union') {
									$result = unionFunc($array1, $array2);
									$result = implode(', ', $result);
									echo $result;
								}

								elseif ($_POST['operation'] == 'intersection') {
									$result = intersectionFunc($array1, $array2);
									$result = implode(', ', $result);
									echo $result;
								}

								elseif ($_POST['operation'] == 'difference') {
									$result = array_diff($array1, $array2);
									$result = implode(', ', $result);
									echo $result;
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