<?php
 
 include('config.php');

 if(isset($_POST['recSenha'])){

   $email = $_POST['email'];

   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $erro[] = "Email inválido!";

   }

   
   if(count($erro) == 0){

   $novaSenha = substr(md5(time()), 0, 6);
   $nsCriptografada =  md5($novaSenha);
  

   if(mail($email, "Alteração de Senha", "Sua nova senha:" .$novaSenha)){
   $sql_code ="UPDATE users SET password = '$nsCriptografada' WHERE email ='$email'";
   } 
  }
 }


?>
<html>
<html>
<head>
<meta charset="utf-8">
 <title>Klaus | Portal do Investidor</title>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!--Favicon-->
    <link rel="icon" type="img" href="img/klaus_favicon.png">
    <link rel="stylesheet" type="text/css" href="css/login_style.css" charset="utf-8" />
</head>

<body>
   
    <div class="d-flex justify-content-center mt-5">
      <div class="card" style="width: 36rem; height: 260px; background-color: #111;">
        <div class="card-body" style="background-color: #111;">

          <div class="d-flex justify-content-center">
            <h1 style="font-family:'Oswald', sans-serif; text-align: center; margin-bottom:15px; color:white; font-size:40px;">KLAUS.</h1>
        </div>
          <hr style="background-color:white; margin-top: -5px;">

          <form action="" method="POST" style="height: 100px; margin-top: 40px;">
            
              <label class="h5 text-white">Informe o endereço de e-mail cadastrado.</label>
              <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Seu email" name="email">
          
            
            <button type="submit" class="btn btn-success"  name="recSenha" style="margin-top: 20px;">Enviar</button>
          </form>
        
        </div>
          </div>
        </div>
          <footer>
            <p>
              
              &copy; KLAUS. 2021
              
            </p>
          </footer>
        </div>
      </div>
    </div>
  </div>
</body>
</html> 