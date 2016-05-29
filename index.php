<?php 
session_start(); 
error_reporting(0);
include "koneksi.php";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Selamat datang di web donor darah</title>
	<link rel="stylesheet" href="asset/style.css"></link> <!-- html 5 -->
</head>

<body>
	<main id="page" >
		<header id="header"> 
			<img src="asset/header.jpg">
			<nav>
				<?php include "menu.php"; ?>
			</nav>
		</header>

		<section>
			<?php 
				include "content.php"; 
				include "content-admin.php";
			?>
		</section>

		<aside> 
			<?php include "sidebar.php"; ?>
		</aside>

		<div style="clear:both"></div>

		<footer> 
			<!-- <hr> -->
			<p>Copyright 2016 - Donor Darah FILKOM</p>

		</footer>
	</main>
</div>
</body>
</html>
