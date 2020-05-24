<?php 
session_start();
	if($_SESSION["login"]) {
		$db = new PDO ("mysql:host=localhost;dbname=Panel;charset=utf8","root","berke144277");
		$sorgu = $db ->prepare("SELECT * FROM Kullanicilar WHERE KullaniciAd=? && Sifre=?");
		$sorgu -> execute(array($_SESSION['user'] ,$_SESSION['pass']));
		$islem =$sorgu ->fetchAll(PDO::FETCH_OBJ);
		if ($sorgu->rowCount() < 1) {
			header('Location: ../index.html'); 
		}
	} else {
		header('Location: index.html');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/stil.css">
</head>
<body>
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 header">
					<h3 class="float-left">Admin Panel</h3>					
					<button onclick="dark();" class="mt-1 float-right btn btn-success">Dark</button>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 dashboard">
					<ul class="dashboard-item text-center">
						<li>
							<a href="loginPanel.php" class="item">Dashboard</a>
						</li>
						<li>
							<a href="user_login.php" class="item">User Login</a>
						</li>
						<li>
							<a href="show_user.php" class="item">Show Users</a>
						</li>
						<li>
							<a href="user_delete.php" class="item">User Delete</a>
						</li>
					</ul>
				</div>