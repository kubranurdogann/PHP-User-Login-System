<?php

include("baglanti.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form with PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="login.css">
</head>
<body>


<div class="mt-5 d-flex align-items-center justify-content-center">
  <div class="login-box">

    <div class="d-flex justify-content-center mb-3 fw-bold">
      <h1><b>LOGIN</b></h1>
    </div>
    
    <form id="formLogin" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="" class="form-control" id="email" aria-describedby="emailHelp" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" id="password">Şifre</label>
          <input type="password" class="form-control" id="sifre">
        </div>
          <a href="#" type="submit" class="btn button" id="submit">Giriş</a>

          <span class="mt-5 mb-5">Hesabın yok mu? <a href="register.php">Kaydol</a></span>
    
    </form>

    
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>
      $(function(){

        $(document).on('click','#submit',function(){

          email=$('#email').val();
          sifre=$('#sifre').val();

          if(email == ""){
            alert("email boş bırakılamaz.");
          }else if(sifre == ""){
            alert("şifre bırakılamaz.");
          }else{

            $.post("confirm.php",{"email":email,"sifre":sifre,"userConfirm":"userConfirm"}).done(function(data){
              console.log(data);
              
              if(data == 1){
                $(window).attr('location', 'profile.php');
              }else if(data == 0){
                alert("şifre yanlış");
              }else{
                alert("email adresi kayıtlı değil.");
              }


            });

          }


          });



      });
    </script>

  </body>
</html>