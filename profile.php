<?php
	include 'baglanti.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<?php 

	
	session_start();
?>	


<div class="mt-5 d-flex align-items-center justify-content-center">
  <div class="profile-box">

    <div class="d-flex justify-content-center mb-3 fw-bold">
      <h2><b>Kullanıcı Bilgileri</b></h2>
    </div>
    
    <form class="content"  method="POST">
        <div class="mb-3">
            <p><strong>Kullanınıcı Adı: </strong> <?php echo $_SESSION['kullanici_adi']; ?></p>
            <p><strong>Email Adresi: </strong> <?php echo $_SESSION['email']; ?></p>
			<?php  $_SESSION['kayit_tarihi'] = date("d-m-Y");?>
            <p><strong>Kayıt Tarihi: </strong> <?php echo $_SESSION['kayit_tarihi']; ?></p>  
	    </div>
		<div class="mt-5 mb-3">
			<a href="cikis.php" class="btn buton-hover me-1">çıkış yap</a>
			<a href="#" id="sil" linkid="<?php echo $_SESSION['id']?>" class="btn buton-hover">kullanıcıyı sil</a>
		</div>
        
    </form>

    
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

$(function(){

	$(document).on('click','#sil',function(){
			let kullanici_id=$(this).attr('linkid');
			console.log(kullanici_id);
			
            $.post("sil.php",{"kullanici_id":kullanici_id,"kullaniciSil":"kullaniciSil"}).done(function(data){
				console.log(data);
				if(data == 1){
					alert("Kullanici başarıyla silindi");
					window.location.assign('http://localhost/Login-Form/login.php');
				}else if(data == 0){
					alert("Kullanici silinemedi lütfen tekrar deneyin.");
				}
			});
    	});
	

});
</script>
</body>
</html>



