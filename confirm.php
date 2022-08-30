<?php

	include 'baglanti.php';
    

	if(isset($_POST["userConfirm"])){

		
		$email=$_POST['email'];
		$sifre=md5($_POST['sifre']);


        
		$kullanici_sor=$db->prepare("SELECT * FROM kullanicilar WHERE `email`='$email'");
		$kullanici_sor->execute();
		$get=$kullanici_sor->fetch(PDO::FETCH_ASSOC);
		
		if($get['statu'] == 1){
			
			if ($get['sifre']==$sifre) {
				echo 1;
				session_start();
				$_SESSION['email']=$email;
				$_SESSION['kullanici_adi']=$get['kullanici_adi'];
				$_SESSION['kayit_tarihi']=$get['kayit_tarihi'];
				$_SESSION['id']=$get['id'];

			}else{
				echo 0;
			}
		}else{
			echo 2;
		}


	}    




?>