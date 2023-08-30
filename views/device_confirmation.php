<?php
include('./config.php');

if(empty($_SESSION['uid']))
{
	header("Location: index.php");
}

include('class/userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);
@$secret=$userDetails->google_auth_code;
@$email=$userDetails->email;
@$code = $_POST['code'];

require_once 'googleLib/GoogleAuthenticator.php';

$ga = new GoogleAuthenticator();

$qrCodeUrl = $ga->getQRCodeGoogleUrl($email, $secret,'Klaus.');

$codega = $ga->getCode($secret);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Klaus | Portal do Investidor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--Favicon-->
    <link rel="icon" type="img" href="img/klaus_favicon.png">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/google_auth08.css" charset="utf-8" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

     <style>   
     @media (min-width: 360px){
        body{
            background:linear-gradient(0deg, rgba(0, 0, 0,0.4), rgba(0, 0, 0,0.4)), url(img/c25.png);
            margin-top:-20px; 
            zoom:0.48;
        }
          #container{
                    margin-left:10px;                
                }
                
           
           #wiki{
                font-size: 30px;
                margin-left: 110px;
                margin-top: 0px;
           }        
    }
        @media (min-width: 640px){
           body{
               margin-top:20px;
               padding-top:0px; 
               zoom:1;
           }
           
           #container{
                    margin-left:50px;                
                }
           
           #wiki{
                font-size: 15px;
                margin-left: 32px;
                margin-top: -15px;
           } 
       }

            @media (min-width: 992px){
                #container{
                    margin-left:260px;                
                }
           body{
               margin-top:0px;
               padding-top:0px; 
               zoom:1;
           }
           #wiki{
                font-size: 16px;
                margin-left: 38px;
                margin-top: -10px;
           }
       }
             @media (min-width: 1500px){
           body{
               padding-top:0px; 
               zoom:1.2;
           }
           #container{
                    margin-left:370px;                
                }
       }
      </style>    
       <script type="text/javascript">
          
         
        function validar()
         {
           var code = document.getElementById('code').value;
            var codega = "<?php echo $codega;?>";

            if(code == ""){
               alert('Digite o código gerado pelo Google Authenticator no seu celular!');
               

            }
            
            
            if(codega != code && code!=""){
            alert('Código Inválido!\nDigite o código gerado pelo Google Authenticator no seu celular!');
            
            }

         }
         
     </script>
   
</head>
<body>
 
	<div id="container" style="position:fixed;">

		<h2 class="text-center mt-5 mb-3 text-white">Verificação de Segurança<span>Google Authenticator</span></h2>
		<div class="card text-center" id='device'>
<div class="card-header">
<p class="text-center mt-4 mb-4"><a href="<?php echo BASE_URL; ?>logout.php" class="logout_btn" id="voltar"><i class="fas fa-arrow-left"></i></a>&nbsp;&nbsp;&nbsp;Google Authenticator</p>
<p id="wiki"><a href="https://www.youtube.com/watch?v=1Rn6ZYmIrz0&t=59s" target="blank">Como utilizo o Google Authenticator?</a></p>
</div>
<div id="img">
<img src='../img/google_auth.png' />
</div>

<form method="post" action="./loader.php" id="form" onsubmit="validar();">
<center><label style="text-align: center;">Insira o código do Google Authenticator</label></center>
<center><input type="text" name="code" id="code" /></center>
<center><button type="submit" class="btn btn-primary" id="enviar"/>Enviar</button></center>
</form>
</div>

<div class="mt-3" style="text-align:center;">
	<h3 style="color:white; margin-top: 5px;">Instale o Google Authenticator no seu celular.</h3>
<a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8" target="_blank"><img class='app' src="img/iphone.png" /></a>

<a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank"><img class="app" src="img/android.png" /></a>
</div>
</div>
<!--Google Translate-->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt-br'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--/Google Translate-->
</body>
</html>