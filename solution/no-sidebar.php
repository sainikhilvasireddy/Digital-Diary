<?php
 ob_start();
 session_start();
 require_once 'connect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: index.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['login']) ) {
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
   echo $emailError;
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  echo $emailError;
   
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  
   
  }
  
  // if there's no error, continue to login
  if (!$error) {
   $password = $pass; // password hashing using SHA256
  
   $res=mysql_query("SELECT name,pass,email FROM login WHERE email='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( ($count == 1) && ($row['pass']==$password) ) {
     $_SESSION['user'] = $row['email'];
     $_SESSION['name'] =$row['name'];
       header("Location: home1.php");
    exit();
   } else { 
    $errMSG = "Incorrect Credentials, Try again...";
   echo $errMSG;
    
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
		<title>LOGIN</title>
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
	<body class="login">

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">DIGITAL DAIRY LOGIN</a></h1>
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.php">HOME</a></li>
                                                               
							</ul>
						</nav>
					<div class="login">
                                            <form action="" method="post">          
				<input type="text" placeholder="email" name="email"><br>
				<input type="password" placeholder="password" name="pass"><br>
                                <button type="submit" value="login"name="login">Login</button>
                                            </form>
		</div>

				</div>
			</div>

		<!-- Main -->
			

		<!-- Footer -->
			<div id="footer">
				<div class="container">

					<!-- Lists -->
						<div class="row">
							
							<div class="4u">
								<section>
									<h2>CONTACT US</h2>
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

					
				</div>
			</div>

	</body>
</html>