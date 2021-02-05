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
						Figures to Currency
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Currency is required">
						<input class="input100" type="text" name="currency">
						<span class="label-input100">Currency</span>
					</div>
					
                    <div class="wrap-input100">
						<input class="input100" type="text" disabled name="array2">
						<span class="label-input100">Disabled</span>
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
								$number =  $_POST['currency'];
								$no = floor($number);
								$point = round($number - $no, 2) * 100;
								$hundred = null;
								$digits_1 = strlen($no);
								$i = 0;
								$str = array();
								$words = array('0' => '', '1' => 'one', '2' => 'two',
								'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
								'7' => 'seven', '8' => 'eight', '9' => 'nine',
								'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
								'13' => 'thirteen', '14' => 'fourteen',
								'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
								'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
								'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
								'60' => 'sixty', '70' => 'seventy',
								'80' => 'eighty', '90' => 'ninety');
								$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
								while ($i < $digits_1) {
									$divider = ($i == 2) ? 10 : 100;
									$number = floor($no % $divider);
									$no = floor($no / $divider);
									$i += ($divider == 10) ? 1 : 2;
									if ($number) {
									$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
									$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
									$str [] = ($number < 21) ? $words[$number] .
										" " . $digits[$counter] . $plural . " " . $hundred
										:
										$words[floor($number / 10) * 10]
										. " " . $words[$number % 10] . " "
										. $digits[$counter] . $plural . " " . $hundred;
									} else $str[] = null;
								}
								$str = array_reverse($str);
								$result = implode('', $str);
								$points = ($point) ?
								"." . $words[$point / 10] . " " . 
										$words[$point = $point % 10] : '';
								echo $result . "rupees " . $points . " paise";
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