<?php
include('../config.php');
include('../class/userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);
$finance=$userClass->finance($_SESSION['uid']);
@$language = $_GET['language'];
error_reporting(0);

include('../session.php');
$userDetails=$userClass->userDetails($session_uid);

?>
<!DOCTYPE html>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!--Favicon-->
  <link rel="icon" type="img" href="../img/klaus_favicon.png">
  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <!--Jquery-->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <!--JQuery Mask-->
    <script src="jquery.mask.min.js"></script>
  <!-- CDN do Chart.js -->
  <script src="Chart.js"></script>
    <!-- Sweet Alert-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style type="text/css">
     /* Default height for small devices landscape*/
     @media (min-width: 360px){
        body{
        margin-left: -239.2px;
        
        }

        header{
        position: fixed;
        background:black; 
        padding: 18px;
        width:700px;
        height: 70px;
        z-index: 10000000;
       }

       .container{
        width: 102%;
        margin-left: -9px;
       }

       .sidebar{
        display:block;
        z-index: 100000000;
        margin-left: -250px;
       }  

            #check:checked~header{
              width:700px;
              transition: none;
            }

            #check:checked~.sidebar{
              display: inline;
              width: 100%;
              left:250px;
              height: 99%;
              z-index: 100000;
              transition: 0.1s;
              transition-property: left;
            }

            #check:checked~.logout_btn{
              margin-right: 35px;
              margin-top: -36.3px;
            }

            #check:checked~.sidebar i{
              display: inline;
              
            }

            #check:checked~.sidebar hr{
              display: block;
            }

            #check:checked~.sidebar a{
              color: #fff;
              display: block;
              width: 100%;
              line-height: 250%;
              text-decoration: none;
              text-align: left;
              box-sizing: border-box;
              transition: 0.2s;
              transition-property: background;
              margin-top: 5px;
              margin-bottom: 10px;
              margin-left:0px;
              padding-left:0px;
              
            }

            #check:checked~.sidebar a:hover{
            background-color: #0FCC7D;
            text-decoration: none;
            color: white;
            width:100%;
            margin-left:0px;
            padding-left:-30px;
            transition: 0.5s;
            transition-property: all;
          }
            #check:checked~.sidebar a span{
              display: inline;
            }


            #check:checked~.sidebar h4{
              color: #ccc;
              margin-top: 0;
              margin-bottom: 20px;
              font-size: 18px;
              font-family: 'Ruda', sans-serif;
              font-weight: 700;
            }

            label #sidebar_btn{
          z-index:1;
          color: #fff;
          position: fixed;
          cursor: pointer;
          left: 14px;
          font-size: 29px;
          margin-bottom: 5px 0;
          transition: 0.5s;
          transition-property: color;
          margin-top: -5.9px;
        }

          .left_area h3{
            margin-left: -40px;
            margin-top: -25px;
            font-size: 29px;
            text-align: center;         
            
          }

          #check:checked~.left_area h3{
            margin-left:20px;
            margin-top: -25px;
            font-size: 29px;
            text-align: center;
          }

            #check:checked~.logout_btn{
              margin-right: 40px;
              margin-top: -36.3px;
             }

             .logout_btn{
              margin-right: 40px;
              margin-top: -26px;
             }

     }

   /* Default height for small devices */
    @media (min-width: 556px){
   
      body{
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
        display: flex;
        height: 100vh;
        box-sizing: border-box;
        background-color:#18191A; 
      }
      
      header{
        position: fixed;
        background:black; 
        padding: 18px;
        width:100%;
        height: 70px;
        z-index: 10000000;
      }

      .container{
        width: 102%;
        margin-left: -9px;
        background-image: none;
        padding-left: 50px;
        padding-right: 20px;
      }

     

      .left_area h3{
        color: #fff;
        margin: 0;
        margin-top: -25px;
        text-transform: uppercase;
        font-size: 30px;
        font-weight: 500;
        font-family: 'Oswald', sans-serif;
      }

      .left_area span{
        color: #0FCC7D;
        margin: 0;
        text-transform: uppercase;
        font-size: 30px;
        font-weight: 900;
        font-family: 'Oswald', sans-serif;
      }

      .logout_btn{
        padding: 5px;
        background-color: #0FCC7D;
        border-style: none;
        color: white;
        text-decoration: none;
        float: right;
        margin-top: -38px;
        margin-right: -5px;
        border-radius:2px;
        font-size: 13px;
        font-weight: 600;
        transition: 0.5s;
        transition-property: background;
        padding: 10px;
        border-radius: 5px;
      }


      .logout_btn:hover{
        background-color: #0FAD69;
        border-style: none;
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
      }

      .sidebar{
        background: linear-gradient(0deg, rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('../img/bg.jpg'); background-size:cover; background-attachment: fixed; 
        margin-top: 70px; 
        padding: 30px;
        position: fixed;
        margin-left: 0;
        left:0;
        width: 248px;
        height: 100%;
        transition: 0.5s;
        transition-property: left;
        overflow-y: auto;
      }

      .sidebar .profile_image{
        width:90px;
        height:90px;
        border-radius:100px;
        margin-bottom: 15px;
      }

      .sidebar h4{
        color: #ccc;
        margin-top: 0;
        margin-bottom: 20px;
        font-size: 13px;
        font-family: 'Ruda', sans-serif;
        font-weight: 700;
      }

      .sidebar a{
        color: #fff;
        display: block;
        width: 120%;
        line-height: 300%;
        text-decoration: none;
        box-sizing: border-box;
        transition: 0.5s;
        transition-property: background;
        margin-left:-20px;
        padding-left:30px;
      }

      

      #active{
        background-color: #0FCC7D;
        text-decoration: none;
        color: white;
        width:120%;
        margin-left:-20px;
        padding-left:30px;
        transition: 0.5s;
        transition-property: all;
      }

      .sidebar i{
        padding-right:10px;
      }




      label #sidebar_btn{
        z-index:1;
        color: #fff;
        position: fixed;
        cursor: pointer;
        left: 15px;
        font-size: 29px;
        margin-bottom: 5px 0;
        transition: 0.5s;
        transition-property: color;
        margin-top: -7px;
      }


      label #sidebar_btn:hover{
        color:#bcbcbc;
      }

      #check:checked~.sidebar{
        left: -28px;
        transition: 0.5s;
        transition-property: left;
      }

      #check:checked~.content{
        padding-left: 42px;
        background-image: linear-gradient(to bottom, #49494a, #3c3c3d, #303031, #242425, #18191a);

      }
     

      #check:checked~.sidebar hr{
        display: none;
      }

      #check:checked~.sidebar i{
        text-align: center;
      }

      #check:checked~.sidebar #active{
        margin-left: 115px;
      }

      #check:checked~.sidebar a span{
        display: none;
      }

      #check:checked~.sidebar a{
        font-size: 20px;
        margin-left: 115px;
        width: 61px;
        padding-left: 5px;
        line-height: 220%;
        text-align: center;
      }

      #check:checked~.sidebar a:hover{
        font-size: 20px;
        margin-left: 115px;
        width: 61px;
        padding-left: 5px;
      }


      #check:checked~.sidebar h4{
        font-size:5px;
      }

      .content{
        background-color:#ECF0F5;
        margin-left: 250px;
        margin-top: 70px;
        height: 100vh;
        width: 100%;
        transition: 0.5s; 
      }

    
      #check:checked ~.sidebar a{
        margin-top: -80px;
        margin-bottom: 80px;
        line-height: 50px;
      }


      #check{
        display:none;
      }

      .image-upload input {
        display: none;
      }


      #banner {
        height: 280px;  
        margin-top: -20px; 
        border-radius: 20px;
        width: 106%;
        margin-left:-30px;
      }


      #check:checked~.sidebar{
        width:200px;
        left: -150px;
        z-index: 100000;
      }


      #check:checked~ header{
        width: 100%;
      }

   

      .left_area h3{
        margin-left:-671px; 
        margin-top: -26px;
        font-size: 29px;
      }

      #check:checked~ .left_area h3{
        margin-left:-671px; 
        margin-top: -26px;
        font-size: 29px;
      }

  

  /* Height for devices larger than 992px */
     @media (min-width: 992px) {
          body{
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
        display: flex;
        height: 100vh;
        box-sizing: border-box;
        background-color:#18191A; 
      }
      
      header{
        position: fixed;
        background:black; 
        padding: 18px;
        width:100%;
        height: 70px;
        z-index: 10000000;
      }

      .container{
        width: 102%;
        margin-left: -9px;
        background-image: none;
        padding-left: 115px;
        padding-right: 115px;
      }

     

     
       .left_area h3{
        color: #fff;
        margin-left: 28px;
        margin-right: 1115px; 
        margin-top: -26.5px;
        font-size: 29px;
        text-transform: uppercase;
        font-weight: 500;
        font-family: 'Oswald', sans-serif;
      }
      
      .left_area span{
        color: #0FCC7D;
        margin: 0;
        text-transform: uppercase;
        font-size: 30px;
        font-weight: 900;
        font-family: 'Oswald', sans-serif;
      }

      .logout_btn{
        padding: 5px;
        background-color: #0FCC7D;
        border-style: none;
        color: white;
        text-decoration: none;
        float: right;
        margin-top: -35px;
        margin-right: 5px;
        border-radius:2px;
        font-size: 13px;
        font-weight: 600;
        transition: 0.5s;
        transition-property: background;
        padding: 10px;
        border-radius: 5px;
      }

      .logout_btn:hover{
        background-color: #0FAD69;
        border-style: none;
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
      }


      .sidebar{
        background: linear-gradient(0deg, rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('../img/bg.jpg'); background-size:cover; background-attachment: scroll; 
        margin-top: 70px; 
        padding: 30px;
        position: fixed;
        margin-left: 0;
        left:0;
        width: 248px;
        height: 100%;
        transition: 0.5s;
        transition-property: left;
        overflow-y: inherit;
      }

      .sidebar .profile_image{
        width:90px;
        height:90px;
        border-radius:100px;
        margin-bottom: 15px;
      }

      .sidebar h4{
        color: #ccc;
        margin-top: 0;
        margin-bottom: 20px;
        font-size: 13px;
        font-family: 'Ruda', sans-serif;
        font-weight: 700;
      }

      .sidebar a{
        color: #fff;
        display: block;
        width: 120%;
        line-height: 260%;
        text-decoration: none;
        box-sizing: border-box;
        transition: 0.5s;
        transition-property: background;
        margin-left:-20px;
        padding-left:30px;
      }

      

      #active{
        background-color: #0FCC7D;
        text-decoration: none;
        color: white;
        width:120%;
        margin-left:-20px;
        padding-left:30px;
        transition: 0.5s;
        transition-property: all;
      }

      .sidebar i{
        padding-right:10px;
      }




      label #sidebar_btn{
        z-index:1;
        color: #fff;
        position: fixed;
        cursor: pointer;
        left: 15px;
        font-size: 29px;
        margin-bottom: 5px 0;
        transition: 0.5s;
        transition-property: color;
        margin-top: -7px;
      }


      label #sidebar_btn:hover{
        color:#bcbcbc;
      }

      #check:checked~.sidebar{
        left: -28px;
        z-index: 100000;
        transition: 0.5s;
        transition-property: left;
      }

      #check:checked~.content{
        padding-left: 80px;
        background-image: linear-gradient(to bottom, #49494a, #3c3c3d, #303031, #242425, #18191a);

      }
     

      #check:checked~.sidebar hr{
        display: none;
      }

      #check:checked~.sidebar i{
        text-align: center;
      }

      #check:checked~.sidebar #active{
        margin-left: 115px;
      }

      #check:checked~.sidebar a span{
        display: none;
      }

      #check:checked~.sidebar a{
        font-size: 20px;
        margin-left: 115px;
        width: 61px;
        padding-left: 5px;
        line-height: 220%;
        text-align: center;
      }

      #check:checked~.sidebar a:hover{
        font-size: 20px;
        margin-left: 115px;
        width: 61px;
        padding-left: 5px;
      }


      #check:checked~.sidebar h4{
        font-size:5px;
      }

      .content{
        background-color:#ECF0F5;
        margin-left: 250px;
        margin-top: 70px;
        height: 100vh;
        width: 100%;
        transition: 0.5s; 
      }

    
      #check:checked ~.sidebar a{
        margin-top: -30px;
        margin-bottom: 30px;
        line-height: 50px;
      }


    

      #check:checked~.sidebar h4{
        font-size:5px;
      }

      .content{
        background-color:#ECF0F5;
        margin-left: 250px;
        margin-top: 70px;
        height: 100vh;
        width: 100%;
        transition: 0.5s; 
      }

    
      #check:checked ~.sidebar a{
        margin-top: -50px;
        margin-bottom: 55px;
      }


      #check{
        display:none;
      }

      .image-upload input {
        display: none;
      }


      #check:checked~.sidebar{
        width:200px;
        left: -150px;
        z-index: 100000;
      }

    


      #check:checked~ header{
        width: 100%;
      }
   

     }
     /* Height for devices larger than 1400px */
     @media (min-width: 1400px) {
        
        
    #banner {
     width: 103.6%;margin-left:-20px;
    }
        
    .container{
        width: 100%;
        margin-left: 270px;
        padding-left:0px;
        padding-right:0px;
      }
      
    #rodape hr{
        width:92%;
        margin-left:40px;
    }
 
 

    .card-body1{
      width: 265px;
    }
    
    #check:checked~.content .card-body1{
      width: 265px;
      margin-left: 8px;
      margin-right: 8px;
    } 

    .card-body1 i{
      font-size: 35px;
      color: rgba(255,255,255,0.6);
    }

    #check:checked~.content .card-body1 i{
      font-size: 35px;

    }

    #grafico {
        display: block;
        width: 1105px;
      }


      #check:checked~.content #grafico{
      width: 1130px;

      }

    .sidebar{
        background: linear-gradient(0deg, rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('../img/bg.jpg'); background-size:cover; background-attachment: scroll; 
        margin-top: 70px; 
        padding-top:65px;
        position: fixed;
        margin-left: 0;
        left:0;
        width: 248px;
        height: 100%;
        transition: 0.5s;
        transition-property: left;
        overflow-y: inherit;
      }

      .sidebar .profile_image{
        width:100px;
        height:100px;
        border-radius:100px;
        margin-bottom: 15px;
      }

      .sidebar h4{
        color: #ccc;
        margin-top: 0;
        margin-bottom: 20px;
        font-size: 15px;
        font-family: 'Ruda', sans-serif;
        font-weight: 700;
      }

   .sidebar a{
        color: #fff;
        display: block;
        width: 120%;
        line-height: 310%;
        text-decoration: none;
        box-sizing: border-box;
        transition: 0.5s;
        transition-property: background;
        margin-left:-20px;
        padding-left:30px;
        font-size:18px;
      }

      
     .left_area h3{
        color: #fff;
        margin-left: 28px;
        margin-right: 1668px; 
        margin-top: -26.5px;
        font-size: 29px;
        text-transform: uppercase;
        font-weight: 500;
        font-family: 'Oswald', sans-serif;
      }
      
      #active{
        background-color: #0FCC7D;
        text-decoration: none;
        color: white;
        width:120%;
        margin-left:-20px;
        padding-left:30px;
        transition: 0.5s;
        transition-property: all;
      }

      .sidebar i{
        padding-right:10px;
      }

      label #sidebar_btn{
        z-index:1;
        color: #fff;
        position: fixed;
        cursor: pointer;
        left: 15px;
        font-size: 29px;
        margin-bottom: 5px 0;
        transition: 0.5s;
        transition-property: color;
        margin-top: -7px;
      }


      label #sidebar_btn:hover{
        color:#bcbcbc;
      }

      #check:checked~.sidebar{
        left: -150px;
        z-index: 100000;
        transition: 0.5s;
        transition-property: left;
      }

      #check:checked~.content{
        padding-left: 80px;
        background-image: linear-gradient(to bottom, #49494a, #3c3c3d, #303031, #242425, #18191a);

      }
      

      #check:checked~.sidebar hr{
        display: none;
      }

      #check:checked~.sidebar i{
        text-align: center;
        font-size: 20px;
        line-height: 60px;
      }

      #check:checked~.sidebar #active{
        margin-left: 115px;
      }

      #check:checked~.sidebar a span{
        display: none;
      }

      #check:checked~.sidebar a{
        font-size: 20px;
        margin-left: 115px;
        width: 61px;
        padding-left: 5px;
        line-height: 220%;
        text-align: center;
      }

      #check:checked~.sidebar a:hover{
        font-size: 20px;
        margin-left: 115px;
        width: 61px;
        padding-left: 5px;
      }
      
      #resgate{
          margin-top:20px;
          height:880px;
          width:1040px;
      }


      #check:checked~.sidebar h4{
        font-size:5px;
      }

      .logout_btn{
       margin-left:1765px;
       position: fixed;
       width:5%;
       padding-left:19px;
      } 
      
       .logout_btn:hover{
       margin-left:1765px;
       position: fixed;
       width:5%;
       padding-left:19px;
      } 

      
         #rodape{
          margin-left:-45px;
      }
      


     }
     	   	/* Height for devices larger than 2400px */
     @media (min-width: 2400px) {
     
     .left_area h3{
        color: #fff;
        margin-left: 28px;
        margin-right: 2300px; 
        margin-top: -26.5px;
        font-size: 29px;
        text-transform: uppercase;
        font-weight: 500;
        font-family: 'Oswald', sans-serif;
      }
      
        .logout_btn{
       margin-left:2385px;
       position: fixed;
       width:4%;
       padding-left:22px;
      } 
      
      .logout_btn:hover{
       margin-left:2385px;
       position: fixed;
       width:4%;
       padding-left:22px;
      } 
      
      #btn_ano{
          margin-left:-880px;
      }
     
    
     }
	
     
   </style>

  <!-- =======================================================
    Nome do Template: Klaus 
    Versão: 1.0
    Autor: Rafael Melchioretto
  ======================================================= -->
</head>
<body style="background-color: #18191A;">
  
<!--Cabeçalho-->
  <input type="checkbox" id="check" style="display:none;">
  <header>
    <label for="check">
     <i class="fas fa-th-large" id="sidebar_btn"></i>

    </label>
    <div class="left_area">
	        <h3>KLAUS <spam style="color:#28cc85">INVEST</spam></h3> 
        </div>
    <div class="right_area">
      <a href="<?php echo BASE_URL; ?>logout.php" class="logout_btn">Logout <i class="fas fa-sign-out-alt"></i></a>
    </div>  
  </header>
  <!--/Fim Cabeçalho-->
  <!--Sidebar-->
    <div class="sidebar">
      <center>
        <img src="../fotos/<?php echo $userDetails->profile_pic;?>" class="profile_image" alt="" style="border-style:solid; border-color: white; border-width: 2px;">
        <h4 style="color: white;"><strong><?php echo $userDetails->username; ?></strong></h4>
      </center>
      <hr class="my-2 bg-white">

	 <?php if ($language ==='en_usa') { ?> 

			<a href="home.php?language=en_usa"  title="Home"><i class="fas fa-desktop"></i><span>Home</span></a>
			<a href="dashboard3.php?language=en_usa" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
			<a href="extrato.php?language=en_usa"  title="Extract">&nbsp;<i class="fas fa-receipt" ></i><span> Extract</span></a>
			<a href="aporte.php?language=en_usa" title="Contribution">&nbsp;<i class="fas fa-donate"></i><span> Contribution</span></a>
			<a href="resgate.php?language=en_usa" id="active" title="Rescue">&nbsp;<i class="fas fa-money-bill-alt"></i><span>Rescue</span></a>
            <a href="rentabilidade.php" title="Profitability">&nbsp;<i class="fas fa-funnel-dollar"></i><span>Profitability</span></a>
			<a href="recibos.php?language=en_usa" title="Contribution Receipts">&nbsp;<i class="fas fa-book"></i><span> Contribution Receipts</span></a>
			<a href="atendimento.php?language=en_usa" title="Service">&nbsp;<i class="fas fa-headset"></i><span> Service</span></a>
			<a href="configuracoes.php?language=en_usa" title="Settings">&nbsp;<i class="fas fa-cogs"></i><span> Settings</span></a>
		
			 <?php } else { ?>
			 
			<a href="home.php"  title="Home"><i class="fas fa-desktop"></i><span>Home</span></a>
			<a href="dashboard3.php" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
			<a href="extrato.php"  title="Extratos">&nbsp;<i class="fas fa-receipt" ></i><span> Extrato</span></a>
			<a href="aporte.php" title="Aporte">&nbsp;<i class="fas fa-donate"></i><span> Aporte</span></a>
			<a href="resgate.php" id="active" title="Resgate">&nbsp;<i class="fas fa-money-bill-alt"></i><span>Resgate</span></a>
			<a href="rentabilidade.php" title="Rentabilidade">&nbsp;<i class="fas fa-funnel-dollar"></i><span>Rentabilidade</span></a>
			<a href="recibos.php" title="Recibos de Aporte">&nbsp;<i class="fas fa-book"></i><span> Recibos de Aporte</span></a>
			<a href="atendimento.php" title="Atendimento">&nbsp;<i class="fas fa-headset"></i><span> Atendimento</span></a>
			<a href="configuracoes.php" title="Configurações">&nbsp;<i class="fas fa-cogs"></i><span> Configurações</span></a>
			
			<?php } ?>
    </div>

  <!--/Fim Sidebar-->
  <div class="content" style="background-image: linear-gradient(to bottom, #49494a, #3c3c3d, #303031, #242425, #18191a);" >
    <div class="container">
      <div class="card" id="resgate">
        <div class="card-header">
            <?php if ($language ==='en_usa') { ?>
                <h3><i class="fas fa-money-bill-wave"></i>&nbsp;&nbsp;Partial Rescue</h3>
             <?php } else { ?>
                <h3><i class="fas fa-money-bill-wave"></i>&nbsp;&nbsp;Resgate Parcial</h3>
             <?php } ?>
        </div>
        <div class="form group container-fluid">
                     <form method="POST" id="form" class="needs-validation" action="mail_resgate2.php" novalidate>
                      <div class="form row mt-3">
                        <div class="form-group col-md-6">
                            <?php if ($language ==='en_usa') { ?>
                                <label>Investor:</label>
                             <?php } else { ?>
                                <label>Investidor:</label>
                             <?php } ?>
                           <div class="input-group">
                              <span class="input-group-text"><i class="fas fa-user-circle"></i></span> 
                              <input type="text" readonly class="form-control bg-white" value="<?php echo $userDetails->name;?>" placeholder="Digite seu nome" id="inputName" name="inputName">
                             
                           </div>
                        </div>
                      <?php
                          if ($language ==='en_usa') {
                              $saldo =  $finance->saldo;
                              $local = 'en-usa';
                              $currency = 'USD';
                              $fmt = new NumberFormatter($local, NumberFormatter::CURRENCY);
                              $padrao_br = $fmt->formatCurrency($saldo, $currency);
                          } else {
                              $saldo =  $finance->saldo;
                              $local = 'pt-br';
                              $currency = 'BRL';
                              $fmt = new NumberFormatter($local, NumberFormatter::CURRENCY);
                              $padrao_br = $fmt->formatCurrency($saldo, $currency);
                          }
                        ?>
                        <div class="form-group col-md-6">
                            <?php if ($language ==='en_usa') { ?>
                                <label>Available Balance (BRL):</label>
                            <?php } else { ?>
                                <label>Saldo Disponível (R$):</label>
                            <?php } ?>
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>  
                              <input type="text" readonly class="form-control bg-white text-dark" id="input_saldo" name="inputEmail"value="<?php echo preg_replace('/[^0-9,.]/','',$padrao_br);?>">
                           </div>
                        </div>
                       </div>



                       <div class="form-group">
                           <?php if ($language ==='en_usa') { ?>
                                  <label for="exampleFormControlSelect1">Rescue Type:</label>
                            <?php } else { ?>   
                                  <label for="exampleFormControlSelect1">Tipo do Resgate:</label>    
                            <?php } ?>
                             <div class="input-group  mb-3">
                             <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>  
                             <select class="form-control" name="resgate" id="selectOption">
                                <?php if ($language ==='en_usa') { ?> 
                                       <option>Full Rescue</option>
                                       <option selected>Partial Rescue</option>
                                       
                                  <?php } else { ?>
                                       <option>Resgate Total</option>
                                       <option selected>Resgate Parcial</option>
                                      
                                  <?php } ?>
                             </select>
                           </div>
                            <?php if ($language ==='en_usa') { ?> 
                                   <script>
                                   
                                          $('#selectOption').change(function() {
                                          var option = $( "#selectOption option:selected" ).text();
                                          if(option=="Monthly Profitability Rescue"){
                                            var opcao = "Resgate de Rentabilidade Mensal"
                                            window.location.href = "resgate_rentabilidade_mensal.php?language=en_usa";
                                          } else if(option=="Full Rescue"){
                                            window.location.href = "resgate.php?language=en_usa";
            
                                          } else if(option=="Reinvest"){
                                              window.location.href = "reinvestir.php?language=en_usa";
                                          }
                                          });
        
                                   </script>
                             <?php } else { ?>
                                 <script>
                                   
                                          $('#selectOption').change(function() {
                                          var option = $( "#selectOption option:selected" ).text();
                                          if(option=="Resgate de Rentabilidade Mensal"){
                                            var opcao = "Resgate de Rentabilidade Mensal"
                                            window.location.href = "resgate_rentabilidade_mensal.php";
                                          } else if(option=="Resgate Total"){
                                            window.location.href = "resgate.php";
            
                                          } else if(option=="Reinvestir"){
                                              window.location.href = "reinvestir.php";
                                          }
                                          });
        
                                   </script>
                             <?php } ?>

                           <?php
                           
                              $data= new Datetime();
                               
                              $data_minima = new Datetime('+5 day');
                              
                               $data_usa = $data_minima->format('m-d-Y');  
                            
                              $data_convert = $data_minima->format('d/m/Y');
                           ?>
                       <div class="row">
                        <div class="form-group col-md-6">
                          <?php if ($language ==='en_usa') { ?> 
                                 <label>Current date:</label>
                          <?php } else { ?>     
                                <label>Data Atual:</label>
                          <?php } ?>
                          
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>  
                              <?php if ($language ==='en_usa') { ?> 
                                  <input type="text" name="data" readonly class="form-control bg-white text-dark" id="input_data" value="<?php echo date("m-d-Y"); ?>">
                                <?php } else { ?>
                                  <input type="text" name="data" readonly class="form-control bg-white text-dark" id="input_data" value="<?php echo date("d/m/Y"); ?>">
                                <?php } ?>
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                            <?php if ($language ==='en_usa') { ?> 
                                <label>Minimum Allowed Date:</label>
                            <?php } else { ?> 
                                <label>Data Mínima Permitida:</label>
                            <?php } ?>
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-times"></i></span>  
                              <?php if ($language ==='en_usa') { ?> 
                                 <input type="text" readonly class="form-control bg-white text-danger" id="inputBanco" name="inputBanco" value="<?php echo $data_usa;?>">
                             <?php } else { ?>
                                 <input type="text" readonly class="form-control bg-white text-danger" id="inputBanco" name="inputBanco" value="<?php echo $data_convert;?>">
                             <?php } ?>
                           </div>
                        </div>
                       </div>                       

                       <div class="row">
                        <div class="form-group col-md-6">
                        <?php if ($language ==='en_usa') { ?>    
                             <label>Rescue Date:</label>
                        <?php } else { ?>    
                            <label>Data do Resgate:</label>
                        <?php } ?>
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>  
                              <input type="date" min="<?php echo $data_minima->format('Y-m-d'); ?>"  class="form-control bg-white text-danger"  id="data_selecionada" class="validationTooltip04" name="data">
                         
                            <div class="invalid-tooltip" style="font-size: 14px; margin-left: 0px; margin-top:-2px;">
                             Inform the date of the Rescue!
                            </div>
                       
                      
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                            <?php if ($language ==='en_usa') { ?>
                                <label>Bank:</label>
                             <?php } else { ?> 
                                 <label>Banco:</label>
                             <?php } ?>
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-piggy-bank"></i></span>  
                              <input type="text" readonly class="form-control bg-white text-black" id="inputConta" name="inputConta" value="<?php echo $userDetails->banco; ?>">
                              
                           </div>
                        </div>
                       </div>

                <div class="card card border-danger mt-3" style="box-shadow: none;">
            <div class="card-header" style="background-color: #ce1818;">
                <?php if ($language ==='en_usa') { ?>
                    <p class="h5 text-white"><i class="fas fa-exclamation-triangle">&nbsp;&nbsp;</i>Attention!</p>
                <?php } else { ?>  
                    <p class="h5 text-white"><i class="fas fa-exclamation-triangle">&nbsp;&nbsp;</i>Atenção!</p>
                 <?php } ?>
            </div>
            <div class="card-body">
                <?php if ($language ==='en_usa') { ?>
                    <p class="h6">For this redemption request, it will not be possible to change bank details without prior notice of 5 days prior to the scheduled date.</p>
                    <p class="h6">If the change is informed within a period of less than 5 days, you must choose to redeem it in the account already registered, or cancel the request, opening a new request with the updated data.</p>
                    <p>If there is a need to change bank account data, it will be necessary to open a ticket on the customer portal.</p>
               <?php } else { ?> 
                    <p class="h6">Para esta solicitação de resgate não será possível realizar a alteração dos dados bancários sem o aviso prévio de 5 dias de antecedência da data agendada.</p>
                    <p class="h6">Se a alteração for informada com o prazo inferior a 5 dias, você deverá optar pelo resgate na conta já cadastrada, ou cancelar a solicitação, efetuando a abertura de uma nova solicitação com os dados atualizados.</p>
                    <p>Caso haja a necessidade de alteração dos dados da conta bancária, será necessário a abertura de um chamado no portal do cliente.</p>
                    <a href='https://www.youtube.com/watch?v=nkry23xAwbY' target='_blank'>Dúvidas sobre como realizar o seu resgate? Clique aqui e assista o nosso vídeo explicativo.</a>

               <?php } ?>
              </div>
            </div>
         
            <div class="form-group mt-4">
                <?php if ($language ==='en_usa') { ?>    
                    <label for="formGroupExampleInput2">Value (BRL):</label>
                <?php } else { ?>
                    <label for="formGroupExampleInput2">Valor (R$):</label>
                <?php } ?>
             <div class="input-group-prepend">
               <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span> 
            <input type="text"  name="valor" class="form-control" class="validationTooltip04" id="input_valor"  onkeypress="$(this).mask('#.##0,00', {reverse: true});
">          </div>
            <div class="invalid-tooltip" style="font-size: 14px; margin-left: 0px; margin-top:-95px;">
            Informe o Valor do Resgate!
          </div>
            </div> 
            
            <?php if ($language ==='en_usa') { ?>
                  <script>
                     function confirma_resgate(){
                        var saldo = <?php echo $finance->saldo?>;
                        var tipo = document.getElementById('selectOption').value;
                        var valor =  document.getElementById('input_valor').value;
                        var valorConvert = valor.replace(".","");
                        var valorConvert2 = valorConvert.replace(",",".");
                        var data = document.getElementById('data_selecionada').value;
                        var data_convert = new Date(data);
                        var data_br = (data_convert.getDate()+1) + "/" + (data_convert.getMonth()+1) + "/" + data_convert.getFullYear();
                       
                     if(saldo>=valorConvert2){ 
                        if(valor !="" && data !="" && valorConvert2>0){
                          swal({
                            title: "Submit Rescue Request?",
                            text: "Would you like to confirm the request for " +tipo+ " in the amount of R$ " +valor+ " on date" +data_br+ " to your bank account registered in the klaus Invest investment fund?",
                            icon: "warning",
                            buttons: ["Cancel" , "Confirm"],
                            dangerMode: true,
                          })
                          .then((willDelete) => {
                            if (willDelete) {
                              swal("Rescue Request Submitted Successfully!", "",{
                                icon: "success",
                                button: "OK",
                                dangerMode: true,
                              });
                               document.getElementById('form').submit();
                            } else {
                               swal({
                      title: "Request Canceled!",
                      text: "",
                      icon: "error",
                      button: "OK",
                      dangerMode: true,
                    })
                            }
                          });

                        }else{
                           swal({
                      title: "Error requesting Rescue!",
                      text: "You must enter a valid value greater than zero and the Rescue date!",
                      icon: "warning",
                      button: "OK",
                      dangerMode: true,
                    })
                        }
                      }else{
                          swal({
                      title: "Error requesting Rescue!",
                      text: "Insufficient balance for this operation!",
                      icon: "error",
                      button: "OK",
                      dangerMode: true,
                    })
                      }
                    } 
            </script>
         <?php } else { ?>
                  <script>
                     function confirma_resgate(){
                        var saldo = <?php echo $finance->saldo?>;
                        var tipo = document.getElementById('selectOption').value;
                        var valor =  document.getElementById('input_valor').value;
                        var valorConvert = valor.replace(".","");
                        var valorConvert2 = valorConvert.replace(",",".");
                        var data = document.getElementById('data_selecionada').value;
                        var data_convert = new Date(data);
                        var data_br = (data_convert.getDate()+1) + "/" + (data_convert.getMonth()+1) + "/" + data_convert.getFullYear();
                       
                     if(saldo>=valorConvert2){ 
                        if(valor !="" && data !="" && valorConvert2>0){
                          swal({
                            title: "Enviar Solicitação de Resgate?",
                            text: "Você gostaria de confirmar a solicitação de " +tipo+ " no valor de R$ " +valor+ " na data " +data_br+ " para a sua conta bancária cadastrada no fundo de investimento klausinvest?",
                            icon: "warning",
                            buttons: ["Cancelar" , "Confirmar"],
                            dangerMode: true,
                          })
                          .then((willDelete) => {
                            if (willDelete) {
                              swal("Solicitação de Resgate enviada com Sucesso!", "",{
                                icon: "success",
                                button: "OK",
                                dangerMode: true,
                              });
                               document.getElementById('form').submit();
                            } else {
                               swal({
                      title: "Solicitação Cancelada!",
                      text: "",
                      icon: "error",
                      button: "OK",
                      dangerMode: true,
                    })
                            }
                          });

                        }else{
                           swal({
                      title: "Erro ao solicitar Resgate!",
                      text: "Você deve informar um valor válido maior que zero e a data do Resgate!",
                      icon: "warning",
                      button: "OK",
                      dangerMode: true,
                    })
                        }
                      }else{
                          swal({
                      title: "Erro ao solicitar Resgate!",
                      text: "Saldo Insuficiente para essa operação!",
                      icon: "error",
                      button: "OK",
                      dangerMode: true,
                    })
                      }
                    } 
            </script>
         <?php } ?>
         <?php if ($language ==='en_usa') { ?>
            <center><input type="button" onclick="confirma_resgate();" class="btn btn-info mt-2 mb-3" value="Request Rescue"></center>
         <?php } else { ?>
              <center><input type="button" onclick="confirma_resgate();" class="btn btn-info mt-2 mb-3" value="Solicitar Resgate"></center>
         <?php } ?>
          </div>
         </div>
         </div>
              
         </form>
     

    
      <!-- Footer -->
      <div class="row" style=" padding-top: 2%;">
        <div class="col-sm-11 col-md-12" id="rodape">
      <hr style="background-color: white;">
      <footer class="page-footer h6">
           <?php if ($language ==='en_usa') { ?>
                <div class="footer-copyright text-center py-3 text-white"><?php echo date("Y");?>&nbsp;Developed by © Tiberius Tecnologia
        <?php } else { ?>
                <div class="footer-copyright text-center py-3 text-white"><?php echo date("Y");?>&nbsp;Desenvolvido por © Tiberius Tecnologia
        <?php } ?>
        </div>
    </footer>

</div>


<!--/Footer--> 

<!--Google Translate-->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt-br'}, 'google_translate_element');
  document.getElementById('google.translate.TranslateElement').scroll('')
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--/Google Translate-->
    
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+55 11 97640-5348", // WhatsApp number
            email: "contato@klausinvest.com", // Email
            call_to_action: "", // Call to action
            button_color: "#E74339", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,email", // Order of buttons
            pre_filled_message: "Olá somos da Equipe Klaus, em que podemos ajudar?", // WhatsApp pre-filled message
        };
        var windowWidth = window.innerWidth;  
        if(windowWidth >= 992){
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    }})();
</script>
<!-- /GetButton.io widget -->

<!-- Validador de Campos Formulário-->
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
<!--/Validador de Campos Formulário-->

<!--Cards JS-->
  <script>
  function startCounter(){
  $('.count').each(function () {
        var size = $(this).text().split(".")[1] ? $(this).text().split(".")[1].length : 0;
      $(this).prop('Counter',0).animate({
          Counter: $(this).text()
      }, {
          duration: 2800,
          easing: 'swing',
          step: function (now) {
              $(this).text(parseFloat(now).toLocaleString('pt-br'));
          }
      });
  });
} 

  startCounter();
  </script>

  <script type="text/javascript">
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  </script>
<!--/Cards JS-->


<!--JS Bootstrap-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>