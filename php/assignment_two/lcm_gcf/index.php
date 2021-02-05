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
						Calculate LCM and GCF
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Text is required">
						<input class="input100" type="text" name="Numberlist">
						<span class="label-input100">NumberList</span>
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
							
								$param_list = $_POST['Numberlist'];
								if(validateVarianceNumber($param_list)){
									$Numberlist = getNumberList($param_list);
									$hcf=calculateGCD($Numberlist);
									$lcm=calculateLCM($Numberlist);
								
									$list = array();
									array_push($list, ($hcf));
									array_push($list, ($lcm));
								

									$Obj = new \stdClass();
									$Obj->title = "GCF and LCM";
									$Obj->language = "PHP";
									$Obj->result = $list;
									$params = array();
									array_push($params, $param_list);
									$Obj->params = $params;
									$Obj->question = "GCF and LCM";
									$Obj->status = 200;
									$output = new \stdClass();
									$output->data=(object)$Obj;
									$output->status=200;
									$JSON = json_encode($output);
									echo $JSON;

								}else{
									$Obj = new \stdClass();
									$Obj->title = "GCF and LCM";
									$Obj->language = "PHP";
									$Obj->question = "GCF and LCM";
									$Obj->error = "Invalid Characters";
									$Obj->status = 200;
									$list = array();
									array_push($list, $param_list);
									$Obj->params = $list;
									$output = new \stdClass();
									$output->data=(object)$Obj;
									$output->status=200;
									$JSON = json_encode($output);
									echo $JSON;
								}
							
							}
							function calculateGCD($NList){
								$result = $NList[0];
								for($i=0;$i<count($NList);$i++){
									$result = GCD($NList[$i] , $result); 
									if($result == 1){
									return 1 ;
									}
								}
								return $result; 
							}
							function calculateLCM($NList){
								$result = $NList[0];
								for($i=0;$i<count($NList);$i++){
									$result = ((($NList[$i] * $result)) /  (GCD($NList[$i], $result)));
								} 
								return $result;
							}
							function GCD($a,$b){
								if ($a == 0){
									return $b; 
								}
								return GCD($b % $a, $a);
							} 

							function getNumberList($given_set){
								$split_value = array();
								$tmp = '';
								for ($i = 0; $i < strlen($given_set); $i++){
									if($given_set[$i]===" "){
											array_push($split_value, (double)$tmp);
										$tmp = '';
									}
									else{
										$tmp .= (string)$given_set[$i];
									}
								}
								if($tmp != ' ' && $tmp != '')
									array_push($split_value,(double)$tmp);
								return $split_value;
							}

							function validateVarianceNumber($string){
									for ($i = 0; $i < strlen($string); $i++){
										
										if(($string[$i]=='.' || $string[$i]==' ' || ($string[$i]>='0' && $string[$i]<='9')))
										{
											continue;
										}else
										{
											return false;
										}
									}
									return true;
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