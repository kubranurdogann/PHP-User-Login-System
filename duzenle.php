<?php
include 'baglanti.php';
session_start();

if(isset($_POST["duzenle"])){
  $kullanici_adi=$_POST['kullanici_adi'];
  $email=$_POST['email'];
  $sifre=md5($_POST['sifre']);
}

?>


<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="duzenle.css">
<body>

<div class="mt-5 d-flex align-items-center justify-content-center">
  <div class="edit-box">

    <div class="d-flex justify-content-center mb-3 fw-bold">
      <h3><b>Kullanici Bilgilerini Düzenle</b></h3>
    </div>
    
    <form id="formLogin" method="POST">
      <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kullanıcı adı</label>
            <input type="text" class="form-control"  id="yeni_kullanici_adi">
      </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control"  id="yeni_email" aria-describedby="emailHelp" placeholder="name@example.com">
          <span id="emailControl"></span>
      </div>
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" id="password">Yeni Şifre</label>
          <input type="password" class="form-control" id="yeni_sifre">
          <span id="durum"></span>
      </div> 
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" id="password">Şifre Tekrar</label>
          <input type="password" class="form-control" id="yeni_sifre_tekrar" >
          <span id="message"></span>

        </div>
        <br>
        <a id="kaydet" class="btn button">değişiklikleri kaydet</a>  
        <a href="profile.php" class="btn button">vazgeç</a>   
    </form>

    
</div>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>

    $(function(){

    $(document).on('click','#kaydet',function(){
      let kullanici_adi2 = $("#yeni_kullanici_adi").val();
      let email2 = $("#yeni_email").val();
      let sifre2 = $("#yeni_sifre").val();
      
    });
	</script>
</body>
</html>