<?php
$servidor = "mysql.klausinvest.com";
$usuario = "klausinvest";
$senha = "nick70KL@US";
$dbname = "klausinvest";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

date_default_timezone_set("America/Sao_Paulo");
ini_set('smtp_port', '587');
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Klaus | Portal do Investidor</title>
  <!--Favicon-->
  <link rel="icon" type="img" href="img/klaus_favicon.png">
  <link rel="stylesheet" type="text/css" href="css/login_style.css" charset="utf-8" />
  <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
  
  <style>
     /* Default height for small devices portrait */
     @media (min-width: 360px){
            body{
              height: 90vh;
            }

            form{
                height: 50%;
            }

            .card{
              width: 400px;
              background-color: #111;
              border-radius: 20px;
              border-color:white;
              color:white;
              margin-top: 60px;
              height: 320px;
            }

            .card-title{
              font-size: 13px;
            }

            a{
              margin-right: 320px;
              font-size:20px;
              z-index: 1000000;
            }

            a:hover{
              margin-right: 320px;
               font-size:20px;
            }

            .card-header{
              color: white;
              font-family: 'Oswald', sans-serif;
              font-size: 25px;
              margin-top: -48px;

            }

            #inputEmail{
             margin-top: 20px;
             font-size:14px;
             width: 130%;
             margin-left: -20px;
            }

            #inputCpf{
              margin-top: -10px;
              font-size:14px;
              width: 130%;
              margin-left: -20px;
            } 

            #recSenha{
              margin-top: 3px;
              font-size:18px;
              font-weight: 500;
              width: 75%;
              border-radius: 20px;
              border-color: white;
              border-width:2px;
            }


            

            footer{
              display: none;
          }

         

         }
     
    /* Default height for medium devices */
      @media(min-width: 640px){
          .card{
            margin-top: 60px;
            height: 330px;
           
           } 

           .card-title{
             font-size:13px;
             font-weight:500;
             margin:0;

           }

           #inputEmail{
            
           }

           #inputCpf{
             margin-top: -10px;
           } 

           #recSenha{
          font-size:18px;
          font-weight: 500;
          width: 75%;
          border-radius: 20px;
          border-color: white;
        }
          footer{
              display: none;
          }
            
         
         }

     /* Height for devices larger than 992px */
     @media (min-width: 992px) {
      .card{
        width: 580px;
        background-color: #111;
        border-radius: 20px;
        border-color:white;
        color:white;
      }

      .card-body{
          width: 580px;
      }

      a{
        margin-right: 500px;
        font-size:20px;
        z-index: 1000000;
      }

      a:hover{
        margin-right: 500px;
         font-size:20px;
      }
     
        .card-title{
          font-size:15.8px;
          font-weight:500;
          margin:10;

        }

        #inputEmail{
          margin-top: 20px;
          margin-bottom: -15px;
          margin-left: -80px;
          width: 280%;
        }

    

        #recSenha{
          font-size:18px;
          font-weight: 500;
          width: 40%;
          border-radius: 20px;
          border-color: white;
          margin-top: 5px;
          text-align: center;
        }

        
          footer{
              display: block;
              height:35px;
              padding:0px;
          }

        }
       
       /* Height for devices larger than 1400px */
     @media (min-width: 1400px) {
      
      
     }
   </style>

<body style="background: linear-gradient(0deg, rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('img/bg.jpg'); background-size: cover;">
    <?php
      if(isset($_POST['acao']) && $_POST['acao'] == 'recuperar'):
          $email = strip_tags(filter_input(INPUT_POST, 'emailRecupera', FILTER_SANITIZE_STRING));
          $verificar = "SELECT 'email' FROM 'users' WHERE email ='$email'";
          if($verificar == true){
             $codigo = base64_encode($email);
             $data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));
             $mensagem = '<p>Segue o e-mail de recuperação de senha, clique no link abaixo:<br> <a href="https://klausinvest.com/recuperar/atualizarsenha.php?codigo='.$codigo.'">Recuperar Senha</a></p>';
             $email_remetente = 'contato@klausinvest.com';
             $headers = "MIME-Version: 1.1\n";
             $headers .= "Content-type: text/html; charset-iso-8859-1\n";
             $headers .= "From: $email_remetente\n";
             $headers .= "Return-Path: $email_remetente\n";
             $headers .= "Reply-To: $email\n";
             $inserir = "INSERT INTO 'codigos' SET codigo = '$codigo', data ='$data_expirar'";
             if($inserir){
             if(mail("$email", "Assunto", "$mensagem", $headers, "-f$email_remetente")){
                echo "<div class='alert alert-success' role='alert'> Enviamos um e-mail com um link de recuperação de senha para o endereço de e-mail informado</div>";
             }
          }
         }
        
      endif;  
     

    ?>
    <div class="card text-center">
      <a href="index.php" style="margin-top:25px;"><i class="fas fa-arrow-left"></i></a>
        <h5 class="card-header"><i class="fas fa-unlock-alt"></i>&nbsp;&nbsp;Esqueceu sua senha?</h5>
      <div class="card-body">
        <h6 class="card-title">Informe o seu E-mail cadastrado para receber <br>o link de redefinição de senha</h6>
        <p class="card-text"></p>
  <form action="" method="POST" action="multipart/form-data">
    <div class="form-group">
    <?php
      if(isset($_GET['recuperar']) && $_GET['recuperar'] == 'sim'){
      ?>
        <input type="email" name="emailRecupera" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Seu E-mail" required/>
         </div>
        <input type="hidden" name="acao" value="recuperar"/><br>
        <button type="submit" class="btn btn-primary" id="recSenha">Enviar</button>
     
  <?php }else{?>
        <input type="text" name="emailLoga" value=""/>
        <input type="password" name="senhaLoga" value=""/>
        <input type="hidden" name="acao" value="logar"/>
        <input type="submit" value="Logar"/>
        <a href="?recuperar=sim">Esqueceu sua senha?</a>
  <?php }?>
  </form> 
    </div>
  </div>
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