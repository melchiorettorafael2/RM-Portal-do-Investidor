<?php 
error_reporting(0);
@$language = $_GET['language'];

include("config.php");
if(!empty($_SESSION['uid']))
{
  header("Location: google_auth2.php");
}





include('class/userClass.php');
$userClass = new userClass();

require_once 'googleLib/GoogleAuthenticator.php';
$ga = new GoogleAuthenticator();
$secret = $ga->createSecret();


$conta_inativa='';
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

        $url=BASE_URL.'google_auth2.php';
        header("Location: $url");

    }
    if($uid && $language=='en_usa'){
        $url=BASE_URL.'google_auth2.php?language=en_usa';
        header("Location: $url");
    }
    

    
  
    else
    {
        $errorMsgLogin="1";
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
      $url=BASE_URL.'index.php';
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

    <title>Klaus | Portal do Investidor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Favicon-->
    <link rel="icon" type="img" href="img/klaus_favicon4.png">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/login006.css" charset="utf-8" />
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!--Sweet Alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <style type="text/css">
      @media (min-width: 360px){
           body {   
               background: linear-gradient(0deg, rgba(0,0,0,0.0),rgba(0,0,0,0.0)),url('../img/google_bg83.png');
                background-size: cover;
                background-repeat: no-repeat;
                height: 98vh;
             }  

              video{
                    position: fixed;
                    top: 0;
                    left: 0;
                    object-fit: cover;
                    width: 380%;
                    
                }

        .sign-in-container {
                 width: 99.5%;
                 height:99.6%;
                 margin: 1px;
                 z-index: 1000;
                
             }
             
            #select_lang{
                display:flex;
                position: relative;
                margin-top:640px;
                margin-left:215px;
            } 
            
           .dropdown-menu > li > a:hover {
                background-image: none;
                background-color: #1b7be2;
                color:white;
            }
            
              #dropdown-menu li{
                height:20px;
            }
            
             #dropdown-menu a{
                margin-top:4px;
                margin-bottom:4px;
            }
            



      }
      
 
      

       @media (min-width: 640px){
             body {
          
                    background-size: cover;
                    background-repeat: no-repeat;
                    height: 95vh;
             }  

             

            

              
 
           .container {
            background-color: #fff;
            border-radius: 10px;
                box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 380px;
            max-width: 100%;
            min-height: 450px;
            border-radius:7%;
            margin-top: 0px;
            border-color:white;
           } 

           form{
            border-radius: 7%;
           }
            .
            .overlay-container {
                position: absolute;
                top: 0;
                left: 50%;
                width: 100%;
                height:10%;
                overflow: hidden;
                transition: transform 0.6s ease-in-out;
            }

            .error_mobile{
                display: block;
                margin-top: 50px;
            }

            .errorMsgReg{
                display: none;
            }

            .sign-in-container {
                 width: 99.5%;
                 height:99.6%;
                 margin: 1px;
                 z-index: 1000000;
             }

            #titulo_login h1{
            display: none;
            }
            
            .logo_mobile{
              display:block;  
            }

            .logo_mobile h1{
            color: white;
            text-align: center;
            font-family: 'Oswald', sans-serif;
            font-size: 43px;
            margin-top: -50px;
            }

            #errorMsgReg{
                display:none;
            }

            h3{
                padding-top: 5px;
                margin-top: 5px;
                margin-bottom: 5px;
                font-size: 24px;
            }

            input {
                background-color: #eee;
                border-style:none;
                padding: 12px 15px;
                margin: 8px 0;
                width: 50%;
                margin-top: 15px;

            }

            #text-email{
                margin-top: 10px;
                width: 100%;
                height: 40px;
                font-size: 14px;
                padding: 5px;
            }

            #text-senha{
                margin-top:3px; 
                width: 100%;
                height: 40px;
                font-size: 14px;
                margin-bottom: 5px;
                padding: 5px;
            }

            #btn_login{
                width: 100%;
                margin-top: 20px;
                height: 48px;
                font-size: 16px;
                margin-top: 15px;
            }

            #btn_login:hover{
                width: 100%;
                margin-top: 20px;
                height: 48px;
                font-size: 16px;
                margin-top: 15px;
            }

            .reset_senha{
                margin-top: 10px;
                font-size: 15px;
                display: block;
                margin-bottom: 10px;
            }

             .reset_senha:hover{
                margin-top: 10px;
                font-size: 15px;
                display: block;
                margin-bottom: 10px;
            }
          

            #btn_cadastrar{
             border-radius:20px;
             border-color: white;   
             width: 65%;   
             height: 42px;   
             font-size: 14px;
             border-width:2px;
            }

      

            hr{  
                background-color:white;
                display: block;
                height: 0.1px;
            }
            footer{
                display: none;
                
            }
        
        }
        
         @media (min-width: 1100px){
            body {
                 background: linear-gradient(0deg, rgba(0,0,0,0.0),rgba(0,0,0,0.0)),url('../img/google_bg82.png');
            
                    background-size: cover;
                    background-repeat: no-repeat;
                    height: 95vh;
             }  

              #fundo_desktop{
                display: flex;
              }

          

                video{
                    position: fixed;
                    top: 0;
                    left: 0;
                    object-fit: cover;
                    width: 100%;
                    
                }

   
           .container {
            background-color: #fff;
            border-radius: 10px;
                box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 380px;
            max-width: 100%;
            min-height: 450px;
            border-radius:7%;
            margin-top: 0px;
            border-color:white;
           } 

           form{
            border-radius: 7%;
           }
            .
            .overlay-container {
                position: absolute;
                top: 0;
                left: 50%;
                width: 100%;
                height:10%;
                overflow: hidden;
                transition: transform 0.6s ease-in-out;
            }

            .error_mobile{
                display: block;
                margin-top: 50px;
            }

            .errorMsgReg{
                display: none;
            }

            .sign-in-container {
                 width: 99.5%;
                 height:99.6%;
                 margin: 1px;
                 z-index: 1000000;
             }

            #titulo_login h1{
            display: none;
            }
            
            .logo_mobile{
              display:block;  
            }

            .logo_mobile h1{
            color: white;
            text-align: center;
            font-family: 'Oswald', sans-serif;
            font-size: 43px;
            margin-top: -50px;
            }

            #errorMsgReg{
                display:none;
            }
            
            #select_lang{
                margin-top:600px;
                margin-left:750px;
            }
            
             
            #dropdown-menu a{
                color: black;
            }

            #dropdown-menu a:hover{
                color: white;
            }

            #dropdown-menu li:hover{
                background-color: #28cc85;
                color: white;
            }


            h3{
                padding-top: 5px;
                margin-top: 5px;
                margin-bottom: 5px;
                font-size: 24px;
            }

            input {
                background-color: #eee;
                border-style:none;
                padding: 12px 15px;
                margin: 8px 0;
                width: 50%;
                margin-top: 15px;

            }

            #text-email{
                margin-top: 10px;
                width: 96.5%;
                height: 40px;
                font-size: 14px;
                padding: 5px;
            }

            #text-senha{
                margin-top:3px; 
                width: 96.5%;
                height: 40px;
                font-size: 14px;
                margin-bottom: 5px;
                padding: 5px;
            }

            #btn_login{
                width: 100%;
                margin-top: 20px;
                height: 48px;
                font-size: 16px;
                margin-top: 15px;
            }

            #btn_login:hover{
                width: 100%;
                margin-top: 20px;
                height: 48px;
                font-size: 16px;
                margin-top: 15px;
            }

            .reset_senha{
                margin-top: 10px;
                font-size: 15px;
                display: block;
                margin-bottom: 10px;
            }

             .reset_senha:hover{
                margin-top: 10px;
                font-size: 15px;
                display: block;
                margin-bottom: 10px;
            }
          

            #btn_cadastrar{
             border-radius:20px;
             border-color: white;   
             width: 65%;   
             height: 42px;   
             font-size: 14px;
             border-width:2px;
            }
            
            #dropdown-menu li{
                height:20px;
            }
            
             #dropdown-menu a{
                margin-top:4px;
            }
            

            hr{  
                background-color:white;
                display: block;
                height: 0.1px;
            }
            footer{
                display: block;
                
            }
        
        }
        
        
         @media (min-width: 1700px){
           
            body{
               padding-top:0px;   
               zoom:1.1;
               height: 85vh;
           }
           
          #container{
                margin-top: 100px;
                max-height: 80%;
            }
           
             #select_lang{
                margin-top:835px;
                margin-left:950px;
            }
             
      }
}
    </style>
</head>


<body>
  
</div>
  <script>
   <?php if ($language ==='en_usa') { ?> 
    var erroLogin = "<?php echo $errorMsgLogin;?>";
    if(erroLogin==1){
      swal("Authentication Error","Incorrect login or password!","error");  
    }
    <?php } else { ?> 
       var erroLogin = "<?php echo $errorMsgLogin;?>";
       if(erroLogin==1){
        swal("Login ou senha Incorretos!","Envie um e-mail para contato@klausinvest.com caso não esteja conseguindo acessar sua conta!","error");
    }     
     <?php } ?>    
  </script>
  
    <script>
   <?php if ($language ==='en_usa') { ?> 
    var conta_inativa = "<?php echo $errorMsgLogin;?>";
    if(conta_inativa==2){
      swal("Authentication Error","Incorrect login or password!","error");  
    }
    <?php } else { ?> 
       var conta_inativa = "<?php echo $errorMsgLogin;?>";
       if(conta_inativa==2){
        swal("Conta Inativa","Entre em contato através do e-mail contato@klausinvest.com para solicitar a reativação da conta!","warning");
    }     
     <?php } ?>    
  </script>


<div class="container" id="container" style="margin-top: 20px; position:fixed;">
    <div class="form-container sign-in-container"> 
        <form method="post" action="" name="login"><br><br>
     
               <div>
                <div class="logo_mobile">
                    <img src="img/INVEST5.png" style="width:280px; margin-top:-50px; margin-bottom:-20px;">
                    <hr style="height:0.1px;">
                </div>
            <?php if ($language ==='en_usa') { ?>
                 <h3 id="portal">Investor Portal</h3>    
           <?php } else { ?> 
                 <h3 id="portal">Portal do Investidor</h3>
              <?php } ?>   
    
           
        
           <input type="email" name="usernameEmail" placeholder="E-mail" autocomplete="off" id="text-email" required />

        <?php if ($language ==='en_usa') { ?>

                <input type="password" name="password" placeholder="Password" autocomplete="off" id="text-senha" required/>

        <?php } else { ?>     

            <input type="password" name="password" placeholder="Senha" autocomplete="off" id="text-senha" required/>
            <?php } ?>  
            
            <input type="submit" class="btn btn-light" name="loginSubmit" id="btn_login" value="Login" style="margin-bottom: 10px;">

        <?php if ($language ==='en_usa') { ?>
  
            <a href="recuperarsenha7.php?recuperar=sim&&language=en_usa" class="reset_senha" id="forgot"> Forgot your Password?</a> 

          <?php } else { ?>    
                <a href="recuperarsenha7.php?recuperar=sim" class="reset_senha" id="forgot"> Esqueceu a Senha?</a> 

          <?php } ?>  
            
            <hr>
        <?php if ($language ==='en_usa') { ?>
          <button  id="btn_cadastrar" class="btn btn-primary" type="button" onclick="window.location.href='cadastro.php?language=en_usa'"><i class="fas fa-plus-circle"></i>&nbsp; Sign-up</button>   
            
            <?php } else { ?>  
              <button  id="btn_cadastrar" class="btn btn-primary" type="button" onclick="window.location.href='cadastro.php'"><i class="fas fa-plus-circle"></i>&nbsp; Cadastre-se</button>
            <?php } ?> 
            </div>     
        </form>

    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                
            </div>
            <div class="overlay-panel overlay-right" id="titulo_login">
          
                <h1>KLAUS.</h1>
            </div>
        </div>
    </div>
</div>
<div class="btn-group dropup" id="select_lang">
   <?php if ($language ==='en_usa') { ?> 
    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" style="height:40px;"><img id="flag" src="img/usa2_flag.png" style="width:28px; margin-right: 5px;"><spam id="idioma">EN_US</spam>
    <span class="caret"></span></button>
     <?php } else { ?> 
           <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" style="height:40px;"><img id="flag" src="img/br_flag.png" style="width:28px; margin-right: 5px;"><spam id="idioma">PT-BR</spam>
    <span class="caret"></span></button> 
      <?php } ?>   
    <ul class="dropdown-menu" id="dropdown-menu"> 
      <li onclick="toggleLanguage('Portuguese')"><a href="index.php" class="dropdown-item" style="margin-top:-8px;"> PT-BR</a></li>
          <div class="dropdown-divider"></div>
      <li onclick="toggleLanguage('English')"><a href="index.php?language=<?php echo 'en_usa';?>" class="dropdown-item" style="margin-top:-8px;"> EN-US</a></li>
    </ul>
  </div>

<footer>
    <p>
        
        &copy;&nbsp;<?php echo date("Y");?> KLAUS INVEST 
        
    </p>
</footer>

</div>



<!--/Google Translate-->
<script>
  function toggleLanguage(language) {
    var imagens = [
   "img/usa2_flag.png",
   "img/br_flag.png" 
];
    var img = document.getElementById("flag");
    var portal = document.getElementById("portal");
    var forgot = document.getElementById("forgot");
    var cadastro = document.getElementById("btn_cadastrar");
    var senha = document.getElementsById("text-senha");
    var img_src = img.src;
    var img_idx = imagens.indexOf(img_src);
    let idioma = document.getElementById("idioma");
    let description = document.getElementById("description");
    if (language === "English") {
      idioma.innerHTML = "EN-US";
      img.src = imagens[ img_idx == imagens.length-1 ? 0 : img_idx+1 ];
      portal.innerHTML ="Investor Portal";
      forgot.innerHTML ="Forgot your Password?";
      cadastro.innerHTML ="Sign-Up";
      senha. ="Password";
    }
    else {
      idioma.innerHTML = "PT-BR";
      img.src = imagens[ img_idx == imagens.length-1 ? 0 : img_idx+2 ];
      portal.innerHTML ="Portal do Investidor";
      forgot.innerHTML ="Esqueceu a Senha?";
      cadastro.innerHTML ="Cadastre-se";
      senha.placeholder ="Senha";
    }
  }

</script>

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