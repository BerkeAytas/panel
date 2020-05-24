<?php 
/*
//$db -> exec("insert into deneme (ad, soyad,no) values ('cio','taylan','144')");
$query = $db -> prepare("insert into deneme (ad, soyad,no) values (?,?,?)");
$query -> execute (array("engin","ucar","211"));
*/
/*
try {
	$db =new PDO ("mysql:host=localhost:dbname=deneme;charset=utf8","root","berke144277");
	echo "kayıt başarlılı";
} catch (Exception $e) {
	echo "kayıt hatalı".$e;
}*/
//$query = $db -> prepare("insert into deneme (ad,soyad,no) values(?,?,?)");
//$query -> execute (array("engin","uçar","211"));
	//////////////////
	
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


//$tname = $_POST['tname'];
//isset burda kullanılmıyor bunun yerine boş olup olmadığını kontrol etmek için !null kullnaılır 
/*
if (!null == ($fname && $sname && $tname)) {
	$db -> exec("insert into deneme (ad,soyad,no) values ('$fname','$sname','$tname')");
	echo "Kayıt Yapıldı :)";
} else {
	echo "Bilgilerinizi Hepsini Girin";
}
*/
/*
if (($_POST["firstname"]==$user) && ($_POST["password"]==$pass)) {
			//$_SESSION["login"] = "true";
			$_SESSION["user"] = $user;
			$_SESSION["pass"] = $pass;
			//include 'login.php';
			$db -> exec("insert into Kullanicilar (KullaniciAd,Sifre) values ('$fname','$sname')");
		}else{
			echo "kullanıcı adı veya şifre yanlış";
			$db -> exec("insert into FalseKAdi (KullaniciAd,Sifre) values ('$fname','$sname')");
		}
*/
//altaki sorgu ifadesi çalışıyor ama function da bir sorun var
/*function select(){
	$sorgu = $db -> prepare ("select * from deneme");
	$sorgu -> execute();
	$sonuc = $sorgu -> fetchall();

	foreach($sonuc as $bilgi){
		echo $bilgi["id"]." ".$bilgi["ad"]." ".$bilgi["soyad"]." ".$bilgi["no"];
		echo "<br>";
	}
}*/
/*
kullanıcı adı 	:berke 
şifre 			:aytas
olan kullanıcı girişi yapılacak
-html de verileri düzenlenicek alta kayıt yapınız veya giriş yapınız çıkıcak
-js ile sayfada düzenlemeler yapılacak
-js ile form oluşturucaksın
-phpde if else ile verileri phpadminden çekilicek
//
phpmyadminde:

*/



 ?>