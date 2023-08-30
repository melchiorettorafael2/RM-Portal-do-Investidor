<?php 
include("./config.php");
if(!empty($_SESSION['uid']))
{
  
}

include('./userClass.php');
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
        $url='./device_confirmations.php';
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
        $url=BASE_URL.'device_confirmations.php';
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
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Favicon-->
    <link rel="icon" type="img" href="../img/klaus_favicon.png">
   <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom Style Sheet-->
    <link rel="stylesheet" type="text/css" href="./style_admin.css">
</head>
<body style="background: linear-gradient(0deg, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('../img/c23.jpg'); background-size: cover;">
<div class="container">
    <div class="d-flex justify-content-center h-100">

        <div class="card" style="height:420px; margin-top: 115px; background-color: rgba(255,255,255,0.9) !important;">
            <div class="card-header">
                <br>
                <a class="btn btn-sm btn-success" href="../index.php" style="margin-left: -20px; margin-top: -67px; "><i class="fas fa-arrow-left"></i></a> 
                <h1>Klaus-Admin</h1>
            </div>
      
            <div class="card-body mt-2">
                <form method="POST" action="" name="login">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="usernameEmail" placeholder="E-mail" autocomplete="off" id="text-email" style="width: 300px; height: 35px;"/>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                         <input type="password" name="password" placeholder="Senha" autocomplete="off" id="text-senha" style="width: 300px; height: 35px;"/>
                    </div>
                    <div class="errorMsg" style="color:red;"><?php echo $errorMsgLogin; ?></div>
                    <div>
                    <br>
                        <a  class="btn btn-block btn-primary" href="cadastro_admin.php" style="margin-bottom: 10px;"><i class="fas fa-plus-circle"></i> Cadastrar</a>

                         
                    
                    <div class="form-group" style="margin-top:10px;">
                        
                       <input type="submit" class="btn btn-block btn-dark" name="loginSubmit" id="btn_login" value="Login" style="margin-bottom: 10px;">
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
