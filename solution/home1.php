<!DOCTYPE HTML>
<?php
 ob_start();
 session_start();
 include 'connect.php';?>
<html>
	<head>
		<title>DIGITAL DIARY</title>
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
	<body class="homepage">
		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo"><i>DIGITAL DIARY</i></a></h1>
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="home1.php">HOME</a></li>
								<li><a href="logout.php?logout">LOGOUT</a></li>
							</ul>
						</nav>


					<!-- Banner -->
						<div id="banner">
							<div class="container">
								<section>
									<header class="major">
										<h2>Welcome To Digital Diary!</h2>
										<span class="byline">&hellip; 'A digital diary to save your experiences,feelings and thoughts in the journey of life .it's a place where you can be honest, free of judgement and criticism . Digital diary helps in keeping a track of all your events and setting reminders for important events.'!</span>
									</header>
								</section>			
							</div>
						</div>

				</div>
			</div>

		<!-- Featured -->
			<div class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>Our Features</h2>
					</header>
					<div class="row no-collapse-1">
						<section class="4u">
							<a href="home4.php" class="image feature"><img src="images/pic05.jpg" alt=""></a>
							<p>Click above to retrieve your data.</p>
						</section>
						<section class="4u">
							<a href="home3.php" class="image feature"><img src="images/pic06.jpg" alt=""></a>
							<p>Click above to add your memory.</p>
						</section>
						<section class="4u">
							<a href="home2.php" class="image feature"><img src="images/pic07.jpg" alt=""></a>
							<p>Click above to add important dates.</p>
						</section>
	
					</div>
				</section>
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