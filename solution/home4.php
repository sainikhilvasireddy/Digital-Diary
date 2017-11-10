<?php
 ob_start();
 session_start();
 include 'connect.php';

 if ( isset($_POST['submit']) ) {
  
  // clean user inputs to prevent sql injections
  $date = $_POST['date'];
  $pass = trim($_POST['matter']);
  $email=$_SESSION['user'];
  // basic name validation
 
  if( !$error ) {
   
   $query = "INSERT INTO dairy(date,matter,email) VALUES('$date','$pass','$email')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
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
		<title>Right Sidebar - Horizons by TEMPLATED</title>
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
	<body class="right-sidebar">

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="home1.php">Home</a></li>
                                                                <li><a href="logout.php">Logout</a></li>
													</ul>
						</nav>

				</div>
			</div>

		<!-- Main -->
			<div id="main" class="wrapper style1">
				<div class="container">
					<div class="row">
					
						<!-- Content -->
						<div id="content" class="8u skel-cell-important">
							<section>
								<header class="major">
									<h1>welcome <?php echo $_SESSION['name'];?></h1>
									
								</header>
									<h1>Your important dates are:</h1>
						<?php include 'connect.php';session_start();$x=$_SESSION['user'];
                                                 $query = "SELECT date,matter FROM dairy where email='$x'";
                                                 $res = mysql_query($query);
                                                 if($res!=""){
                                                            if (mysql_num_rows($res) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($res)) {
        print( '<b>Date:</b>'.$row["date"].' <b>Notes:</b> '.$row["matter"].'<br>' );    
    }
} 
}else {
    echo "0 results";
}
?>
                     
                                                        </section>
						

						<!-- Sidebar -->
                                                                           
                                                <h1>Your memories are:</h1>
                                                  <?php include 'connect.php';session_start();$x=$_SESSION['user'];
                                                 $query = "SELECT date,matter FROM dairy1 where email='$x'";
                                                 $res = mysql_query($query);
                                                 if($res!=""){
                                                            if (mysql_num_rows($res) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($res)) {
        print( '<b>Date:</b>'.$row["date"].' <b>Memory:</b> '.$row["matter"].'<br>' );    
    }
} 
}else {
    echo "0 results";
}
                                                  ?>
                                                </div>
					</div>
				</div>
			</div>

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