<?php 
include("config.php");
if(!empty($_SESSION['uid']))
{
  
}

include('userClass.php');
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
        $errorMsgLogin="Usuário ou senha inválidos!";
    }
   }
}

if (!empty($_POST['signupSubmit'])) 
{
    $username=$_POST['usernameReg'];
    $email=$_POST['emailReg'];
    $password=$_POST['passwordReg'];
    $name=$_POST['nameReg'];
    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

    if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
    {
    
    $uid=$userClass->userRegistration($username,$password,$email,$name,$secret);
    if($uid)
    {
        $url='./device_confirmations.php';
        header("Location: $url");
    }
    else
    {
      $errorMsgReg="E-mail já cadastrado!";
    }
    
    }
    else
    {
      $errorMsgReg="Usuário ou senha inválidos!";
    }


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Klaus | Admin</title>

	<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="icon" type="img" href="../img/klaus_favicon.png">
 <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom Style Sheet-->
	<link rel="stylesheet" type="text/css" href="style_admin.css">
</head>
<body style="background: linear-gradient(0deg, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../img/c23.jpg'); background-size: cover;">

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card" style="height:485px; margin-top: 80px; width: 500px; background-color: rgba(255,255,255,0.9) !important;">
			<div class="card-header">
				<br>
				<a class="btn btn-sm btn-success" href="./index.php" style="margin-top: -66px; margin-left: -20px;"><i class="fas fa-arrow-left"></i></a>
				<h1>Klaus-Admin</h1>
			</div>
			<div class="card-body mt-2">
				<form method="POST" action="" name="signup">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="nameReg" placeholder="Nome">
						<input type="text" class="form-control" name="usernameReg" placeholder="Usuário">
						
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" name="emailReg" placeholder="E-mail">
						
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="passwordReg" placeholder="Senha">
					</div>

						<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control"  placeholder="Confirme a Senha">
					</div>
					
					
					<div class="form-group" style="margin-top:37px;">

						
						<input  class="btn btn-block btn-dark" type="submit" class="button" name="signupSubmit" value="Cadastrar" id="btn_inscrever">
						
					</div>
				</form>
			</div>	
				
			 </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>