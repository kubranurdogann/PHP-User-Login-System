<?php 
include 'baglanti.php';
	session_start();

	if(isset($_POST["kullaniciSil"])){
        $id=$_POST['kullanici_id'];

        $sorgu=$db->prepare("DELETE FROM kullanicilar WHERE id='$id'");
		$sorgu->execute();
        echo 1;
    }else{
        echo 0;
    }
?>