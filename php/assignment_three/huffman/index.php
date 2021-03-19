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
						Huffman message
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Text is required">
						<input class="input100" type="text" name="huffman_message">
						<span class="label-input100">Huffman message</span>
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
						<h2 href="#" class="txt1">
						<?php
							$global_node_res=array();
							class node {
							public $freq;
							public $char;
							public $left;
							public $right;
							public $huff;
							function set_val($freq,$char,$left,$right) {
								$this->freq = $freq;
								$this->char = $char;
								$this->left = $left;
								$this->right = $right;
								$this->huff = "";
							}
							function get_freq() {
								return $this->freq;
							}
							function get_char() {
								return $this->char;
							}
							function get_huff() {
								return $this->huff;
							}
							function get_left() {
								return $this->left;
							}
							function get_right() {
								return $this->right;
							}
							}

							if ($_SERVER["REQUEST_METHOD"] == "POST") {
							
								$msg = $_POST['huffman_message'];
								$freq = array();  
								$huffman_message=$msg;
								for($i = 0; $i < strlen($msg); $i++) {  
									array_push($freq, 1);  
									for($j = $i+1; $j <strlen($msg); $j++) {  
										if($msg[$i] == $msg[$j]) {  
											$freq[$i]++;  
											$msg[$j] = '0';  
										}  
									}  
								}  
								$h_char=array();
								$h_freq=array();
								for($i = 0; $i < count($freq); $i++) {  
									if($msg[$i] != ' ' && $msg[$i] != '0'){  
										array_push($h_char, $msg[$i]);  
										array_push($h_freq, $freq[$i]);  
									}  
								}  

								$nodes=array();
								for($i = 0; $i < count($h_char); $i++) {  
										$Node = new node();
										$Node->set_val($h_freq[$i],$h_char[$i],null,null);
										array_push($nodes,$Node);  
								}
								while (count($nodes)>1) {
									usort($nodes,function($first,$second){
										return $first->freq > $second->freq;
									});
									$left = new node();
									$left = $nodes[0];
									$right = new node();
									$right = $nodes[1];
									$left->huff = 0;
									$right->huff = 1;
									$newNode = new node();
									$newNode->set_val($left->get_freq()+$right->get_freq(), $left->get_char().$right->get_char(), $left, $right);
									array_splice($nodes, 0, 2);  
									array_push($nodes,$newNode);  
								}
								traverse($nodes[0],"");
								$list = array();
								array_push($list,$global_node_res);  
								$Obj = new \stdClass();
								$Obj->title = "huffman_technique";
								$Obj->language = "PHP";
								$Obj->result = $list;
								$params = array();
								array_push($params, $huffman_message);
								$Obj->params = $params;
								$Obj->question = "huffman_technique";
								$Obj->status = 200;
								$output = new \stdClass();
								$output->data=(object)$Obj;
								$output->status=200;
								$JSON = json_encode($output);
								echo $JSON;
							}

							function traverse($node,$val){
								global $global_node_res;
								$newVal = $val . (string)($node->get_huff());
								if($node->get_left()){
									traverse($node->get_left(), $newVal);
								}
								if($node->get_right()){
									traverse($node->get_right(), $newVal);
								}
								if($node->get_left()==null && $node->get_right()==null){
									array_push($global_node_res, $node->get_char()."->".$newVal);
								}
							}


							?>
						</h2>
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