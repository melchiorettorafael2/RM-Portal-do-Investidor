<?php 
include("config.php");


if(!empty($_SESSION['uid']))
{
    
}

include('class/userClass.php');
$userClass = new userClass();

require_once 'googleLib/GoogleAuthenticator.php';
$ga = new GoogleAuthenticator();
$secret = $ga->createSecret();

$errorMsgReg='';
$errorMsgLogin='';
if (!empty($_POST['loginSubmit'])) 
{
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
 if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
   {
    $uid=$userClass->userLogin($usernameEmail,$password,$secret);
    if($uid)
    {
        $url=BASE_URL.'device_confirmations.php';
        header("Location: $url");
    }
    else
    {
        $errorMsgLogin="Please check login details.";
    }
   }
}

if (!empty($_POST['signupSubmit'])) 
{

  $username=$_POST['usernameReg'];
  $email=$_POST['emailReg'];
  $password=$_POST['passwordReg'];
    $name=$_POST['nameReg'];
    $telefone=$_POST['telReg'];
    $cpf=$_POST['cpfReg'];
    $banco=$_POST['bancoReg'];
    $agencia=$_POST['agenciaReg'];
    $conta_corrente=$_POST['conta_correnteReg'];
  $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
  $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
  $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
  $profile_pic = 'profile.png';

  if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
  {
    
    $uid=$userClass->userRegistration($username,$password,$email,$name,$secret,$telefone,$cpf,$banco,$agencia,$conta_corrente,$profile_pic);
    if($uid)
    {
      $url=BASE_URL.'contrato.php';
      header("Location: $url");
    }
    else
    {
      $errorMsgReg="Usuario já cadastrado.";
    }
    
  }
    else
    {
      $errorMsgReg="Detalhes Inválidos.";
    }


}

?>
<!DOCTYPE html>
<html>
<head>

    <title>Klaus | Portal do Investidor</title>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--Favicon-->
    <link rel="icon" type="img" href="img/klaus_favicon.png">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/login_style.css" charset="utf-8" />
     <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--JQuery Mask-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>
<body style="background-image: url('img/bg.jpg'); ">


  <div class="d-flex justify-content-center mt-4">

    <div class="card" style="width: 48rem; height: 590px;">
     
      <div class="card-body" style="background-color: #111;">

        <div class="col-md-12" id="logo" >
           <h1 style="color:white; font-family: 'Oswald', sans-serif; text-align: center; font-size:50px;">KLAUS.</h1>
        <hr style="background-color:white;">
        <h3 class="text-white" style="text-align: center; font-size: 35px; "><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Crie sua conta</h3>
        </div>
      
        <div class="row" style="margin-top: 20px;">
          <div class="col">
<form  class="needs-validation" method="post" action="" name="signup" novalidate>
<div class="form-row">
    <div class="col-7 mb-0" style="width:450px;">

      <input type="text" class="form-control" name="nameReg" placeholder="Nome Completo" id="validationTooltipUsername" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px;">
        Informe o seu nome e sobrenome.
      </div>
    </div>
    
      <div class="col-5 mb-1" style="width:450px;">
      <input type="text" class="form-control" name="usernameReg" placeholder="Nome de usuário" id="validationTooltip02" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px;">
        Informe um nome de usuário.
      </div>
    </div>
   
  </div>
  <div class="form-row" >
    <div class="form-group col-md-7 p-1 mb-1" style="width:450px;">
      
      <input type="email" class="form-control" name="emailReg" placeholder="E-mail" class="validationTooltip03" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px;">
        Informe o seu principal E-mail.
      </div>
    </div>
    <div class="form-group col-md-5 p-1 mb-0" style="width:450px;">
     
      <input type="text" class="form-control" name="telReg" placeholder="Telefone" onkeypress="$(this).mask('(00) 00000-0009');" class="validationTooltip04" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -15px;">
        Informe o nº do seu celular.
      </div>
    </div>
 
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 p-1 mb-1" style="width:450px;">
      <input type="text" class="form-control"  name="cpfReg" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00');" class="validationTooltip06" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px;">
        Informe o seu CPF.
      </div> 
    </div>
    
    <div class="form-group col-md-6 p-1 mb-1" style="width:450px;">
      <input type="text" class="form-control" name="bancoReg" placeholder="Banco"  class="validationTooltip07" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px;">
        Informe o nome do seu banco.
       </div> 
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6 p-1 mb-1" style="width:450px;">
      <input type="text" class="form-control" name="agenciaReg" placeholder="Agência" onkeypress="$(this).mask('0000-0');" class="validationTooltip08" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px;">
        Informe o nº da sua agência.
       </div> 
    </div>
    
    <div class="form-group col-md-6 p-1 mb-0" style="width:450px;">
      <input type="text" class="form-control" name="conta_correnteReg"  placeholder="Conta Corrente" onkeypress="$(this).mask('00000000000-0');" class="validationTooltip09" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -15px;">
        Informe o nº da sua conta corrente.
      </div>  
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-6" style="width:450px;">
      <input type="password" class="form-control" name="passwordReg" placeholder="Senha"  class="validationTooltip10" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px;">
        Digite uma senha de acesso com no mínimo 8 caracteres Recomendamos incluir números, letras minúsculas e maiúsculas!  
      </div> 
    </div>

      <div class="form-group col-6" style="width:450px;">
      <input type="password" class="form-control"  placeholder="Confirme a Senha" class="validationTooltip11" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px;">
        Senhas não conferem! 
      </div>
    </div>
    </div>

    <input  class="btn btn-light" type="submit" class="button" name="signupSubmit" value="Cadastrar" id="btn_inscrever" style="margin-top:10px;">
</form>

<footer>
    <p>
        
        &copy; KLAUS. 2021
        
    </p>
    </footer>
    <script>
    // Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
        var forms = document.getElementsByClassName('needs-validation');
        // Faz um loop neles e evita o envio
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>

  </body>

   </html> 