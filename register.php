<?php

include("baglanti.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
</head>
<body>


<div class="mt-5 d-flex align-items-center justify-content-center">
  <div class="register-box">

    <div class="d-flex justify-content-center mb-3 fw-bold">
      <h1><b>REGİSTER</b></h1>
    </div>
    
    <form id="formLogin"  method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
            <input type="text" class="form-control" name="kullanici_adi" id="kullanici_adi">
          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="name@example.com">
          <span class="gizli" id="emailControl">email control</span>
        
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" id="password">Şifre</label>
          <input type="password" class="form-control" id="sifre" name="sifre">
          <span id="durum" class="gizli">durum</span>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" id="password">Şifre Tekrar*</label>
          <input type="password" class="form-control" id="sifre-tekrar" name="sifre">
          <span id="sifre-tekrar-durum" class="gizli">durum</span>
          <span id="message"></span>
        </div>

        <a class="btn button" name="create" id="create">Kaydol</a>
        <span class="mt-5 mb-5">Zaten hesabın var mı? <a href="login.php">Giriş yap!</a></span>
        
    </form>

    
</div>


    



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(function(){


        $('#sifre').on('keydown',function(){
          let sifre = $("#sifre").val();
          let uzunluk = $("#sifre").val().length + 1;
          let durum = $("#durum");

          if(uzunluk < 6){
            durum.addClass("zayif");
            durum.removeClass("guclu");
            durum.text("şifre en az 6 karakter olmalıdır!");
          }else if(uzunluk >= 6 && sifre.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/) && sifre.match(/([0-9])/)){
            durum.addClass("guclu");
            durum.removeClass("zayif");
            durum.text("şifre güçlü");
          }else{
            durum.text("şifre en az 6 karakter olmalı. Şifre büyük harf, küçük harf ve rakam içermeli!");
          }

        });

        $('#email').on('keydown',function(){
          
          let email = $("#email").val();
          let regex = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+.)+([.])+[a-zA-Z0-9.-]{2,4}$/;

          console.log(regex.test(email));
          if (regex.test(email)==false){
          $('#emailControl').addClass("zayif");
          $('#emailControl').removeClass("guclu");
          $('#emailControl').text("geçersiz email adresi girdiniz!");
          }else{
            $('#emailControl').removeClass("zayif");
            $('#emailControl').addClass("guclu");
            $('#emailControl').text("email adresi geçerli!");
          }
        });

        $('#sifre-tekrar').on('keyup',function(){
          let sifre1 = $("#sifre").val();
          let sifre2 = $("#sifre-tekrar").val();

          if(sifre1 == sifre2){
              $("#message").text("şifreler uyuşuyor").css("color","green");
          }else{
            $("#message").text("şifreler uyuşmuyor!").css("color","red");

          }

        });


        $(document).on('click','#create',function(){
          kullanici_adi=$('#kullanici_adi').val();
          email=$('#email').val();
          sifre=$('#sifre').val();
          if(kullanici_adi == ""){
            alert("kullanıcı adı boş bırakılamaz.");
          }else if(email == ""){
            alert("email boş bırakılamaz.");
          }else if(sifre == ""){
            alert("şifre boş bırakılamaz.");
          }else if(sifre.length < 5){
            alert("şifre 5 karakterden küçük olamaz.");
          }else{
            $.post("kayit.php",{"kullanici_adi":kullanici_adi,"email":email,"sifre":sifre,"userAdd":"userAdd"}).done(function(data){
            console.log(data);
            if(data==1){
              alert("kayit başarılı!");
              window.location.assign('http://localhost/Login-Form/login.php');
            }
            else if(data==2){
              alert("Email adresi kullanılıyor!");
            }
            else if(data==0){
              alert("kayıt eklenirken bir problem oluştu!");
            }
          });
          }

        });



      });
    </script>

  </body>
</html>