 <?php
include('config.php');

if(empty($_SESSION['uid']))
{
	header("Location: ./index.php");
}

include('./userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);
$secret=$userDetails->google_auth_code;
$email=$userDetails->email;

require_once 'googleLib/GoogleAuthenticator.php';

$ga = new GoogleAuthenticator();

$qrCodeUrl = $ga->getQRCodeGoogleUrl($email, $secret,'Klaus.');


?>
<!DOCTYPE html>
<html>
<head>
	<!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!--Favicon-->
    <link rel="icon" type="img" href="../img/klaus_favicon.png">
    <!--Css-->
    <title>KLAUS | Portal do Investidor</title>
    <link rel="stylesheet" type="text/css" href="../css/google_auth.css" charset="utf-8" />
</head>
<body style="background: linear-gradient(0deg, rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('../img/bg.jpg'); background-size: cover;">
	<div id="container">
		<h2 class="text-center mt-5 mb-3 text-white">Verificação de Segurança Google Authenticator</h2>
		<div class="card text-center" id='device' style="width: 350px;">

<p class="text-center mt-2">Insira o código de verificação gerado pelo Google Authenticator no seu celular.</p>
<div id="img">
<img src='../img/google_auth.png' style="width:200px;" />
</div>

<form method="post" action="./boas_vindas.php">
<center><label style="text-align: center;">Insira o código do Google Authenticator</label></center>
<center><input type="password" name="code" /></center>
<center><button type="submit" class="btn btn-success"/>Enviar</button></center>
</form>
</div>
<div class="mt-3" style="text-align:center;">
	<h3 style="color:white;">Instale o Google Authenticator no seu celular.</h3>
<a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8" target="_blank"><img class='app' src="../img/iphone.png" /></a>

<a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank"><img class="app" src="../img/android.png" /></a>
</div>
</div>
</body>
</html>

