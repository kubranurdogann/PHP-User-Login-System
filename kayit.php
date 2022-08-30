<?php

	include 'baglanti.php';
	session_start();

	if(isset($_POST["userAdd"])){

		
		$kullanici_adi=$_POST['kullanici_adi'];
		$email=$_POST['email'];
		$sifre=md5($_POST['sifre']);


		$check_email=$db->prepare("SELECT * FROM kullanicilar WHERE `email`='$email'");
		$check_email->execute();
		$sayi=$check_email->rowCount();
		
		if($sayi>0){
			echo 2;
        }else{
			$see=$db->prepare("INSERT INTO `kullanicilar`(`kullanici_adi`, `email`, `sifre`) VALUES ('$kullanici_adi','$email','$sifre')");
			$see2=$see->execute();
			echo $see2==true?1:0;
		}

	}

?>
