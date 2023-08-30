<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Klaus | Portal do Investidor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0,">
        <link rel="stylesheet" type="text/css" href="css/login04.css" charset="utf-8" />

     <!--Bootstrap-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../css/login_style.css"> 
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--Favicon-->
    <link rel="icon" type="img" href="../img/klaus_favicon.png">
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
        width: 400px;
        background-color: #111;
        border-radius: 20px;
        border-color:white;
        color:white;
      }

      .card-body{
        margin-left: -20px;
          width: 430px;
          height: 200px;
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
     
        #titulo{
          font-size:24px;
          font-weight:500;
          margin-top: -55px;

        }

        #inputEmail{
          margin-top: -40px;
          margin-bottom: 20px;
          margin-left: 10px;
          width: 100%;
        }

        #inputCpf{

          margin-left: 10px;
          width: 100%;
        }

        #voltar{
          margin-left: 25px;
          margin-top: 26px;
        }
    

        #recSenha{
          font-size:16px;
          font-weight: 500;
          width: 48%;
          border-radius: 20px;
          border-color: white;
          padding-top: 30px;
          text-align: center;
          padding: 9px;
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
<body style="background: linear-gradient(0deg, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('../img/c25.png'); background-size: cover;">

    <div class="card text-center">
        <a href="../index.php" id="voltar"><i class="fas fa-arrow-left"></i></a>

    <h3 class="card-header" id="titulo"><i class="fas fa-key"></i>&nbsp;&nbsp;Digite sua nova senha:</h3><br>
        <div class="card-body"><br>
        <form action="" method="post" ectype="multipart/form-data"><br><br><br>
            <input type="password" name="novasenha" value="" id="inputEmail" placeholder="Nova Senha"/>
            <input type="password" name="conf_senha" value="" id="inputCpf" placeholder="Confirme sua nova senha"/>
            <input type="hidden" name="acao" value="mudar"/><br>
            <input type="submit" class="btn btn-primary" id="recSenha" value="Alterar Senha"/> 
        </form>
    </div>
    </div>
   
    <footer>
      <p>
        
        &copy;&nbsp;<?php echo date("Y");?> KLAUSINVEST 
        
      </p>
    </footer>
</body>
</html>