<?php 
	session_start();
	$db = new PDO ("mysql:host=localhost;dbname=Panel;charset=utf8","root","berke144277");

	//if (!null == ($fname && $sname)) {
	if ( !empty(isset($_POST['username'])) && !empty(isset($_POST['username'])) ) {
		$sorgu = $db ->prepare("SELECT * FROM Kullanicilar WHERE KullaniciAd=? && Sifre=?");
		$sorgu -> execute(array($_POST['username'] ,$_POST['password']));
		$islem =$sorgu ->fetchAll(PDO::FETCH_OBJ);
		if ($sorgu->rowCount() > 0) {
			$_SESSION["login"] = true;
			$_SESSION["user"] = $_POST['username'];
			$_SESSION["pass"] = $_POST['password'];
			header('Location: login_panel_item/LoginPanel.php'); 
		
		}else{
			echo "kullanıcı adı veya şifre yanlış";
			$db -> exec("insert into FalseKAdi (KullaniciAd,Sifre) values ('".$_POST['username']."','".$_POST['password']."')");
		}
	} else {
		echo "Bilgilerinizi Hepsini Girin";
	}
 ?>
