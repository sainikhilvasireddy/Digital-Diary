<?php
 ob_start();
 session_start();
 include 'connect.php';
 if( isset($_SESSION['user'])!="" ){
  header("Location: index.php");
 }

 $error = false;

 if ( isset($_POST['submit']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  echo $nameError;
   
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  echo $nameError;
   
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
   echo $nameError;
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
   echo $emailError;
  } else {
   // check email exist or not
   $query = "SELECT email FROM login WHERE email='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
  echo $emailError;
    }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
   echo $passError;
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
   echo $passError;
  }
  $password = $pass;
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO login(name,pass,email) VALUES('$name','$password','$email')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
    echo $errMSG;
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
?>
<!DOCTYPE HTML>
<!--
	Horizons by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>SIGN UP</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">DIGITAL DIARY</a></h1>
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.php">HOME</a></li>
								<li><a href="no-sidebar.php">LOGIN</a></li>
							</ul>
						</nav>

				</div>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<div class="row">
					
						<!-- Sidebar -->
						<div id="sidebar" class="4u sidebar">
						<ul class="tab-group">
      </ul>
      <h1>
          <form action="" method="post">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Name<span class="req">*</span>
              </label>
              <input type="text" name="name"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"name="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"name="pass"required autocomplete="off"/>
          </div><br>
          
          <button type="submit" name="submit"class="button button-block"/>create</button>
          
          </form>
      </h1>
								</section>
							</div>
						</section>
						</div>
				</div>
			</div>
		</div>
							</div>				
					</div>
				</div>
			</div>

		<!-- Footer -->
			<div id="footer">
				<div class="container">

					<!-- Lists -->
						<div class="row">
							<div class="8u">
								
							</div>
							<div class="4u">
								<section>
									
									<ul class="contact">
										<li>
											<span class="address">Address</span>
											<span>AMRITA SCHOOL OF ENGINEERING <br />Kasavanahalli</br> Bengaluru, 560035</span>
										</li>
										<li>
											<span class="mail">Mail</span>
											<span><a href="#">Digitaldairy@yahoo.co.in</a></span>
										</li>
										<li>
											<span class="phone">Mobile</span>
											<span>8951531679</span>
										</li>
										<li>
											<span class="phone">Phone</span>
											<span>(080)25183700</span>
										</li>
									</ul>	
								</section>
							</div>
						</div>

					<!-- Copyright -->
						

				</div>
			</div>

	</body>
</html>