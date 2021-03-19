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
						Unicode
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Text is required">
						<input class="input100" type="text" name="message">
						<span class="label-input100">Message</span>
					</div>
					
                    <div class="wrap-input100 rs2">
						<input class="input100" disabled type="number" name="size">
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
							
								$msg = $_POST['message'];
								
								$list = array();
								array_push($list,run_length_algorithm_encode($msg));  
								array_push($list,run_length_algorithm_Decode(run_length_algorithm_encode($msg)));  
								$Obj = new \stdClass();
								$Obj->title = "run_length_algorithm";
								$Obj->language = "PHP";
								$Obj->result = $list;
								$params = array();
								array_push($params, $msg);
								$Obj->params = $params;
								$Obj->question = "run_length_algorithm";
								$Obj->status = 200;
								$output = new \stdClass();
								$output->data=(object)$Obj;
								$output->status=200;
								$JSON = json_encode($output);
								echo $JSON;
							}

							function run_length_algorithm_encode($msg){ 
								$encoded_msg = "" ;
								$i = 0;
								while ($i <= (strlen($msg))-1){
									$count = 1;
									$ch = $msg[$i]; 
									$j = $i ;
									while ($j < (strlen($msg))-1){
										if ($msg[$j] == $msg[$j+1]){
											$count = $count+1;
											$j = $j+1;
										}
										else{
											break;
										}
									}
									$encoded_msg=$encoded_msg . $ch . (string)($count);
									$i = $j+1;
								}
								return $encoded_msg; 
							}
							function run_length_algorithm_Decode($msg){
								$decoded_msg = "";
								$count='0';
								$last_char='';
								for($i=0; $i<strlen($msg); $i++){
									if(is_numeric($msg[$i])){
										$count =$count . $msg[$i];
									}
									else{
										for ($j=0; $j<(int)($count);$j++) {
											$decoded_msg=$decoded_msg . $last_char;
										}
										$last_char=$msg[$i];
										$count="0";
									}
								}
								for($i=0; $i<(int)($count);$i++) {
									$decoded_msg=$decoded_msg . $last_char;
								}
								return $decoded_msg; 
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