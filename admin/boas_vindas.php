<?php
include('./config.php');
include('./userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);

if($_POST['code'])
{
$code=$_POST['code'];
$secret=$userDetails->google_auth_code;
require_once 'googleLib/GoogleAuthenticator.php';
$ga = new GoogleAuthenticator();
$checkResult = $ga->verifyCode($secret, $code, 2);    // 2 = 2*30sec clock tolerance

if ($checkResult) 
{
$_SESSION['googleCode']=$code;


} 
else 
{
echo 'FAILED';
}

}


include('./session.php');
$userDetails=$userClass->userDetails($session_uid);

?>
<!DOCTYPE html>
<html>
<head>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<!--Tag Responsiva-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="author" content="Rafael Melchioretto">
	<title>KLAUS | Portal do Investidor</title>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!--Favicon-->
	<link rel="icon" type="img" href="../img/klaus_favicon.png">
	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	<!--Jquery-->
</head>
<body style="background: linear-gradient(0deg, rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url('../img/c14.jpg'); background-size: cover;"> 
	<div class="container">
		<div class="row">	
			<div class="col">
			</div>	
			<div class="col-sm-12 col-lg-6">
				<div class="card text-center" style="margin-top: 20%;">
				  <div class="card-header" style="background-color: #444;">
				    <h5 class="card-title text-white" style="padding-top: 10px; ">BEM VINDO!</h5>
				  </div>
				  <div class="card-body" style="background-color: #222;"> 
				    <p class="card-text h3 mt-2 text-white"><?php echo $userDetails->name; ?></p><br>
				    <a href="./views/home_admin.php" class="btn btn-success">Dashboard</a>
				  </div>
				</div>
			</div>	
			<div class="col">	
			</div>
	</div>	
	</div>	
</body>
</html>