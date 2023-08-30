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
@$language = $_GET['language'];
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
  @$montante=0.00;
  @$saldo=0.00;
  @$rentabilidade=0.00;
  @$username=$_POST['usernameReg'];
  @$email=$_POST['emailReg'];
  @$password=$_POST['passwordReg'];
    @$name=$_POST['nameReg'];
    @$telefone=$_POST['telReg'];
    @$cpf=$_POST['cpfReg'];
    @$banco=$_POST['bancoReg'];
    @$agencia=$_POST['agenciaReg'];
    @$conta_corrente=$_POST['conta_correnteReg'];
  @$username_check = $username;
  @$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
  @$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
  $profile_pic = 'profile2.png';

  if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
  {
    
    @$uid=$userClass->userRegistration(@$username,@$password,@$email,@$name,@$secret,@$telefone,@$cpf,@$banco,@$agencia,@$conta_corrente,@$profile_pic,@$montante,@$rentabilidade,@$saldo, @$id_investidor);
    if($uid)
    {
      $url=BASE_URL.'contrato4.php';
      header("Location: $url");
    }
    else
    {
      $errorMsgReg="Usuario já cadastrado.";
    }
    
  }
    else
    {
      $errorMsgReg="Senha deve conter pelo menos 6 caracteres!";
    }

    


}

?>
<!DOCTYPE html>
<html>
<head>

    <title>Klaus | Portal do Investidor</title>
    <!--Tag Responsiva-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--Favicon-->
    <link rel="icon" type="img" href="img/klaus_favicon4.png">
      <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/login006.css" charset="utf-8" />
     <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--JQuery Mask-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <style>
       /* Default height for small devices portrait */
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

                 
          .card{
            border-radius: 20px;
            background-color: white;
            margin-left: 40px;
            max-width: 380px;
            max-height: 520px;
            margin:0;
           margin-top: 0px;
          }

          .card-body{
            border-radius: 20px;
          }

          #logo img{
            display: none;
          }

          #logo hr{
            display: none;
          }

          #logo a{
            display: none;
          }

           h3{
            font-size: 28px;
            text-align: center;
            margin-top:-38px;
            font-weight: 500;
            margin-right:-15px;
          }

          .voltar a{
            font-size: 21px;
            margin-left: 5px;

          }
          
       


          #hr_mobile{
            display: block;
            background-color:white;
          }

          #nome{
            margin-left: -47px;
            width: 168px;
          }
          #user{
            width: 168px;
            margin-left: 3px;
          }

          #email{
            margin-left: -47px;
            width: 168px;
            margin-top:6px;
          }

          #tel{
            width: 168px;
            margin-left: 3px;
              margin-top:6px;
          }

          #cpf{
            margin-left: -47px;
            width: 168px;
            margin-top:6px;
          }

           #banco{
            width: 168px;
            margin-left: 3px;
            margin-top:6px;
          }

           #agencia{
            margin-left: -47px;
            width: 168px;
            margin-top:6px;
          }

          #conta{
            width: 168px;
            margin-left: 3px;
            margin-top:6px;
          }

           #senha{
            margin-left: -47px;
            width: 168px;
            margin-top:6px;
          }

          #conf_senha{
            width: 168px;
            margin-left: 3px;
            margin-top:6px;
          }


          #btn_inscrever{
            width: 80%;
            border-radius: 20px;
            font-size: 16px;
            height: 42px;
            font-weight: 500;
            border-width:2px;
          }
          
          #conta_icone{
              display:none;
          }

         

              footer{
                display: none;
            }

           

           }
       
      /* Default height for medium devices */
        @media(min-width: 640px){

          .card{
            border-radius: 20px;
            background-color: white;
            max-width: 530px;
            max-height: 430px;
            margin-top: 14%;
            margin-bottom: 2%;
          }

           
          .card-body{
            max-height: 100%;
          }

          .voltar a{
            display: block;
            font-size:20px;
            margin-left: 10px;
          }

          .voltar h3{
            margin-top: -45px;
            font-size:26px;
          }

          #hr_mobile{
            display: block;
            margin-bottom: 4px;
          }

          #logo hr{
            display: none;
          }

          #nome{
            margin-left: -47px;
            width: 118%;
          }
          #user{
            width: 118%;
            margin-left: 3px;
          }

          #email{
            width: 118%;
            margin-left: -47px;
            margin-top: 2px;
          }

          #tel{
            width: 118%;
            margin-left: 3px;
            margin-top: 2px;
          }

          #cpf{
            width: 118%;
            margin-left: -47px;
            margin-top: 2px;
          }

           #banco{
            width: 118%;
            margin-left: 3px;
            margin-top: 2px;
          }

           #agencia{
            width: 118%;
            margin-left: -47px;
            margin-top: 2px;
          }

          #conta{
            width: 118%;
            margin-left: 3px;
            margin-top: 2px;
          }

           #senha{
            width: 118%;
            margin-left: -47px;
            margin-top: 2px;
          }

          #conf_senha{
            width: 118%;
            margin-left: 3px;
            margin-top: 2px;
          }

          #btn_inscrever{
            width: 50%;
            border-radius: 20px;
            font-size: 16px;
            height: 40px;
          } 

            footer{
                display: none;
            }
              
           
           }

       /* Height for devices larger than 992px */
       @media (min-width: 1100px) {

          body {
                  background: linear-gradient(0deg, rgba(0,0,0,0.0),rgba(0,0,0,0.0)),url('../img/google_bg82.png');
            
                    background-size: cover;
                    background-repeat: no-repeat;
                    height: 95vh;
             }  

           video{
                    position: fixed;
                    top: 0;
                    left: 0;
                    object-fit: cover;
                    width: 100%;
                    
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

          form{
            margin-top: 7px;
          }
            .card-body{
              border-radius: 20px;

            }

            .card{
              border-radius: 20px;
              background-color: white;
              width: 730px;
              height: 570px;
              max-height:100%; 
              max-width:85%;
              margin-top: 10px;
            }


            #logo img{
              display: block;
              margin-top: -70px;
            }

            #logo a{
              display:block;
              font-size:20px;
            }

            #logo hr{
              display: block;
            }

            #hr_mobile{
              display: none;
            }

            .voltar a i{
              display: none;
            }

            .voltar h3{
              margin-top: 10px;
              font-size: 26px;
            }
            
             #conta_icone{
              display:inline;
          }

              

            hr{
              width: 100%;
            }

            #nome{
            margin-top:5px; 
            width: 120%;
            margin-right: 30px;
          }
          #user{
            margin-left: 6px;
            margin-top:5px;
            width: 120%;
          }

          #email{
            margin-right: 30px;
            margin-top:10px;
            width: 120%;
          }

          #tel{
            margin-left: 6px;
            margin-top:10px;
            width: 120%;  
          }

          #cpf{
            margin-right: 30px;
            margin-top:10px;
            width: 120%;
          }

           #banco{
            margin-left: 6px;
            margin-top:10px;
            width: 120%;
          }

           #agencia{
            margin-right: 30px;
            margin-top:10px;
            width: 120%;
          }

          #conta{
            margin-left: 6px;
            margin-top:10px;
            width: 120%;
           
          }

           #senha{
            margin-right: 30px;
            margin-top:10px;
            width: 120%;
          }

          #conf_senha{
            margin-left: 6px;
            margin-top:10px;
            width: 120%;
            margin-bottom: 10px;
          }


            #btn_inscrever{
              width: 35%;
              border-radius: 20px;
              font-size: 16px;
              height: 45px;
            }

            footer{
                display: block;
                height:35px;
                padding:0px;
            }

          }
         
           @media (min-width: 1600px){
           
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
     <script>
       function confSenha(){
        var senha = document.getElementById('senha').value;
        var conf_senha = document.getElementById('conf_senha').value;

        if (senha!=conf_senha){
          alert('Senhas não conferem!');
          var senha = document.getElementById('senha').value="";
          var conf_senha = document.getElementById('conf_senha').value="";
        }else{
        }
       }
     </script>
     <script>
       var erro ="<?php echo $errorMsgReg;?>";
      if(erro !="")
          {
            alert(erro);
      }
     </script>
</head>
<body>
  


  <div class="d-flex justify-content-center mt-5">

    <div class="card">
     
      <div class="card-body" style="background-color: #111;">

        <div class="col-md-12" id="logo">
        <?php if ($language ==='en_usa') { ?>
    
          <a href="index.php?language=en_usa"><i class="fas fa-arrow-left" id="left_arrow"></i></a><img src="img/INVEST5.png" style="width:250px; margin-top:-85px; margin-bottom:-10px; margin-left: 150px;">
        <?php } else { ?>  
          <a href="<?php echo BASE_URL; ?>logout.php"><i class="fas fa-arrow-left" id="left_arrow"></i></a><img src="img/INVEST5.png" style="width:250px; margin-bottom:-10px; margin-left: 150px;">


        <?php } ?>  

        <hr style="background-color:white;">
        </div>
       <div class="voltar">  
       <?php if ($language ==='en_usa') { ?>
         <a href="index.php?language=en_usa"><i class="fas fa-arrow-left" id="left_arrow"></i></a><h3><i class="fas fa-user-circle" id="conta_icone">&nbsp;&nbsp;</i>Create your Account</h3>
         <?php } else { ?>  
          <a href="index.php"><i class="fas fa-arrow-left" id="left_arrow"></i></a><h3><i class="fas fa-user-circle" id="conta_icone">&nbsp;&nbsp;</i>Crie sua conta</h3>
           <?php } ?>  
        </div> 
        
         <hr id="hr_mobile">
        <div class="row">
          <div class="col">
<form  class="needs-validation" method="post" action="" name="signup" novalidate>
<div class="form-row">
    <div class="col-6 mb-0 p-0">
      <?php if ($language ==='en_usa') { ?>
      <input type="text" class="form-control" name="nameReg" placeholder="Full Name" id="nome" id="validationTooltipUsername" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -12px; margin-left: -47px;">
        Enter your full name.
        <?php } else { ?> 
          <input type="text" class="form-control" name="nameReg" placeholder="Nome Completo" id="nome" id="validationTooltipUsername" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -12px; margin-left: -47px;">
        Informe o seu nome e sobrenome.
        <?php } ?>  
      </div>
      
    </div>
      <div class="col-6  mb-1 p-0">
    <?php if ($language ==='en_usa') { ?>      
      <input type="text" class="form-control" id="user" name="usernameReg" placeholder="User Name" id="validationTooltip02" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: 6px;">
        Enter a username.
        <?php } else { ?> 
        <input type="text" class="form-control" id="user" name="usernameReg" placeholder="Nome de usuário" id="validationTooltip02" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: 6px;">
        Informe um nome de usuário.
        
        <?php } ?> 
      </div>
    </div>
   
  </div>
  <div class="form-row" >
    <div class="form-group col-6  p-0 mb-1">
      <?php if ($language ==='en_usa') { ?>  
      <input type="email" class="form-control" id="email"name="emailReg" placeholder="E-mail" class="validationTooltip03" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -12px; margin-left: -47px;">
        Enter your E-mail
         <?php } else { ?>
             <input type="email" class="form-control" id="email"name="emailReg" placeholder="E-mail" class="validationTooltip03" required>
                  <div class="invalid-tooltip" style="font-size: 10px; margin-top: -12px; margin-left: -47px;">
                    Informe o seu principal E-mail.
         <?php } ?> 
         
      </div>
    </div>
    <div class="form-group  col-6 p-0 mb-1">
  <?php if ($language ==='en_usa') { ?>  
      <input type="text" class="form-control" name="telReg" id="tel" placeholder="Cellphone Number" onkeypress="$(this).mask('(00) 00000-0009');" class="validationTooltip04" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -15px; margin-left: 6px;">
        Enter your Cellphone Number.
         <?php } else { ?>
            <input type="text" class="form-control" name="telReg" id="tel" placeholder="Telefone" onkeypress="$(this).mask('(00) 00000-0009');" class="validationTooltip04" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -15px; margin-left: 6px;">
        Informe o nº do seu celular
          <?php } ?> 
      </div>
    </div>
 
  </div>
  <div class="form-row">
      
    <div class="form-group col-6  p-0 mb-1">
        <?php if ($language ==='en_usa') { ?>  
      <input type="text" class="form-control"  name="cpfReg" id="cpf" placeholder="SSN" onkeypress="$(this).mask('000.000.000-00');" class="validationTooltip06" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: -47px;">
        Enter your SSN.
        <?php } else { ?>
            <input type="text" class="form-control"  name="cpfReg" id="cpf" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00');" class="validationTooltip06" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: -47px;">
        Informe o seu CPF.
        <?php } ?> 
      </div> 
    </div>
        
        
            <div class="form-group col-6 p-0 mb-1">
                 <?php if ($language ==='en_usa') { ?>   
              <input type="text" id="banco" class="form-control" name="bancoReg" placeholder="Bank"  class="validationTooltip07" required>
              <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left:6px;">
                Inform your bank.
                <?php } else { ?>
                      <input type="text" id="banco" class="form-control" name="bancoReg" placeholder="Banco"  class="validationTooltip07" required>
                          <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left:6px;">
                            Informe o nome do seu banco.
                 <?php } ?> 
               </div> 
            </div>
  </div>

  <div class="form-row">
       

    <div class="form-group col-6 p-0 mb-1">
        <?php if ($language ==='en_usa') { ?>  
      <input type="text" id="agencia" class="form-control" name="agenciaReg" placeholder="Agency" onkeypress="$(this).mask('0000-0');" class="validationTooltip08" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: -47px;">
        Inform your agency number.
         <?php } else { ?>
            <input type="text" id="agencia" class="form-control" name="agenciaReg" placeholder="Agência" onkeypress="$(this).mask('0000-0');" class="validationTooltip08" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: -47px;">
        Informe o nº da sua agência.
         <?php } ?> 
       </div> 
    </div>
  
 

    <div class="form-group col-6 p-0 mb-1">
         <?php if ($language ==='en_usa') { ?>    
      <input type="text" id="conta" class="form-control" name="conta_correnteReg"  placeholder="Checking Account" onkeypress="$(this).mask('00000000000-0');" class="validationTooltip09" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: 7px;">
        Enter your checking account number
        <?php } else { ?>
            <input type="text" id="conta" class="form-control" name="conta_correnteReg"  placeholder="Conta Corrente" onkeypress="$(this).mask('00000000000-0');" class="validationTooltip09" required>
              <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: 7px;">
                Informe o nº da sua conta corrente.
        <?php } ?> 
      </div>  
    </div>
  </div>

  <div class="form-row">
         
        <div class="form-group col-6 p-0">
            <?php if ($language ==='en_usa') { ?> 
          <input type="password" id="senha" class="form-control" name="passwordReg" placeholder="Password"  class="validationTooltip10" required>
          <div class="invalid-tooltip" style="font-size: 10px; margin-left: -47px; margin-top: -12px;">
            Enter a password of at least 8 characters We recommend including numbers, lowercase and uppercase letters!  
        <?php } else { ?>
            <input type="password" id="senha" class="form-control" name="passwordReg" placeholder="Senha"  class="validationTooltip10" required>
              <div class="invalid-tooltip" style="font-size: 10px; margin-left: -47px; margin-top: -12px;">
                Digite uma senha de acesso com no mínimo 8 caracteres Recomendamos incluir números, letras minúsculas e maiúsculas!      
         <?php } ?> 
        
          </div> 
        </div>
         
      <div class="form-group col-6 p-0">
          <?php if ($language ==='en_usa') { ?> 
      <input type="password" id="conf_senha" class="form-control"  placeholder="Confirm your Password" class="validationTooltip11" onblur="confSenha();" required>
      <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: 7px;">
        Confirm your Password!
        <?php } else { ?>
                 <input type="password" id="conf_senha" class="form-control"  placeholder="Confirme a Senha" class="validationTooltip11" onblur="confSenha();" required>
                  <div class="invalid-tooltip" style="font-size: 10px; margin-top: -10px; margin-left: 7px;">
                    Confirme sua senha!
        
            <?php } ?> 


      </div>
    </div>
    </div>  

<?php if ($language ==='en_usa') { ?> 
    <input  class="btn btn-light" type="submit" class="button" name="signupSubmit" value="Register" id="btn_inscrever" style="margin-top:10px;">
<?php } else { ?>
        <input  class="btn btn-light" type="submit" class="button" name="signupSubmit" value="Cadastrar" id="btn_inscrever" style="margin-top:10px;">
<?php } ?> 


</form>
</div>
<footer>
    <p>
        
        &copy;&nbsp;<?php echo date("Y");?> KLAUSINVEST 
        
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