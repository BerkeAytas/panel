<?php 
	session_start();
	if($_SESSION["login"]) {
		$db = new PDO ("mysql:host=localhost;dbname=Panel;charset=utf8","root","berke144277");
		$sorgu = $db ->prepare("SELECT * FROM Kullanicilar WHERE KullaniciAd=? && Sifre=?");
		$sorgu -> execute(array($_SESSION['user'] ,$_SESSION['pass']));
		$islem =$sorgu ->fetchAll(PDO::FETCH_OBJ);
		if ($sorgu->rowCount() < 1) {
			header('Location: index.html'); 
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/stil.css">
</head>
<body>
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 header">
					<div class="hName">
						<h3>Admin Panel</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 dashboard">
					<ul class="dashboard-item text-center">
						<li>
							<a href="login_panel_item/loginPanel.php" class="item">Dashboard</a>
						</li>
						<li>
							<a href="login_panel_item/user_login.php" class="item">User Login</a>
						</li>
						<li>
							<a href="login_panel_item/show_user.php" class="item">Show Users</a>
						</li>
						<li>
							<a href="login_panel_item/user_delete.php" class="item">User Delete</a>
						</li>
					</ul>
				</div>
				<div class="col-md-10">
					
				</div>
			</div>
		</div>
	</header>
</body>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</html>