<?php
error_reporting(0);
include('../config.php');
include('../class/userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);

@$language= $_GET['language'];

include('../session.php');
$userDetails=$userClass->userDetails($session_uid);
$link = 'rentabilidade.php';            


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <!--Tag Responsiva-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, maximum-scale=1.0">
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
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <!--Ajax-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
 
  
  <!-- CDN do Chart.js -->
  <script src="Chart.js"></script>
  <!-- CDN do Sweet Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style>
    /* Default height for small devices */
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
      background-image: linear-gradient(to bottom, #49494a, #3c3c3d, #303031, #242425, #18191a);
    }

    .sidebar{
      display:block;
      z-index: 100000000;
      margin-left: -250px;
      
    } 

    #check:checked ~ .content{

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
    transition: 0.1s;
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
      transition: 0.1s;
      transition-property: color;
      margin-top: -5.9px;
    }

    .left_area h3{
        margin-left: 40px;
        margin-top: -25px;
        font-size: 29px;
        text-align: center;         
        
      }

  #check:checked~.left_area h3{
        margin-left:40px;
        margin-top: -25px;
        font-size: 29px;
        text-align: center;
      }

  #google_translate_element{
    display:  inline;
    position: fixed;
   
   }

    #banner {
      width: 108%;
      margin-left: -13px;
      height: 240px;
      border-radius: 20px;
      margin-top: -20px;
    }

    #investidor{
      margin-bottom: 100px;
    }
    
    #text-comunicados{
      font-size:15px;
    }

    #by{
      font-size: 12px;
    }

      #foto_comunicado{
       width: 55px;
       border-radius:100px;
    }

    .logout_btn{
       margin-left:545px;
       margin-top: -36px;
       position: fixed;
      
      } 


    #check:checked~.logout_btn{
        margin-right: 40px;
        margin-top: -36.3px;
      }
    
      

       #foto{
        cursor: default; 
        box-shadow: none; 
        width:180px;
        height:180px;
        margin-top:280px; 
        border-radius:100px; 
        border-style:inset; 
        border-color: white; 
        border-width: 2px;
      }
       #comunicados{
             height: 340px;
           }

}
 /* Default height for small devices */
    @media (min-width: 450px){

      header{
          position: fixed;
          background:black; 
          padding: 18px;
          width:870px;
          height: 70px;
          z-index: 10000000;
         }
      #check:checked~ header{
         width:870px;
      }   

        .left_area h3{
            margin-left: -218px;
            margin-top: -25px;
            font-size: 29px;
            text-align: center;         
            
          }

      #check:checked~.left_area h3{
            margin-left: -218px;
            margin-top: -25px;
            font-size: 29px;
            text-align: center;
          }

          .logout_btn{
             margin-right: 142px;
             margin-top: -36.3px;
            } 


          #check:checked~.logout_btn{
              margin-right: 142px;
              margin-top: -36.3px;
            }

           #banner {
             width: 108.5%;
             margin-left:-13px;
             height: 240px;
             border-radius: 20px;
             margin-top: -20px;
             margin-left: -14px;
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
        background: linear-gradient(0deg, rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('../img/side6.png'); background-size:cover; background-attachment: fixed; 
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


      #foto{
        cursor: default; 
        box-shadow: none; 
        width:180px;
        height:180px;
        margin-top:280px; 
        border-radius:100px; 
        border-style:inset; 
        border-color: white; 
        border-width: 2px;
        margin-top: 350px;
      }

      #text-comunicados{
             font-size:18px;
             margin-top: -30px;
           }

           #foto_comunicado{
             width: 60px;
           }

           #by{
             font-size: 13px;
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
        margin-left: 35px;
        margin-right: 1115px; 
        margin-top: -36.5px;
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
        margin-top: -45px;
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
        background: linear-gradient(0deg, rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('../img/side6.png'); background-size:cover; background-attachment: scroll; 
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


      #check{
        display:none;
      }

      .image-upload input {
        display: none;
      }


      #banner {
        height: 300px;  
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


      #foto{
        cursor: default; 
        box-shadow: none; 
        width:180px;
        height:180px;
        margin-top:280px; 
        border-radius:100px; 
        border-style:inset; 
        border-color: white; 
        border-width: 2px;
        margin-top: 350px;
      }

      #comunicados{
        height: 270px;
      }

      #text-comunicados{
             font-size:18px;
             margin-top: -30px;
           }

           #foto_comunicado{
             width: 50px;
           }

           #by{
             font-size: 13px;
           }

           .logout_btn{
            margin-left:1231px;
            position: fixed;
            text-align: center;
           } 




           #google_translate_element{
            display: inline;
            margin-left: 1105px;
             margin-top: 15px;
             position: fixed;
           }

             font-size: 13px;
           }


      /* Height for devices larger than 1400px */
    @media (min-width: 1400px) {
     
      #banner {
       width: 106.5%;margin-left:-33px;
      }

      .left_area h3{
        margin-left: -1400px; 
        margin-top: -26px;
        font-size: 29px;
      }

      .container{
        padding-left:220px;
      }

      .logout_btn{
       margin-left:1790px;
       position: fixed;
       width:4%;
      }
      
     

      #comunicados{
             height: 250px;
           }
           
    }

      /* Height for devices larger than 1500px */
    @media (min-width: 1500px) {

      #banner {
       width: 108.5%;margin-left:-33px;
       
      }

      .container{
        width: 100%;
        margin-left: 250px;
        padding-left:0px;
        padding-right:0px;
      }

      .sidebar{
        background: linear-gradient(0deg, rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('../img/side6.png'); background-size:cover; background-attachment: scroll; 
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

      #check:checked~.sidebar h4{
        font-size:5px;
      }
      
    .left_area h3{
        color: #fff;
        margin-left: 38px;
        margin-right: 1668px; 
        margin-top: -36.5px;
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
       margin-left:1765px;
       position: fixed;
       width:5%;
       padding-left:9.6px;
       margin-top: -45px;
      } 

     .logout_btn:hover{
       margin-left:1765px;
       position: fixed;
       width:5%;
       padding-left:9.6px;
      } 
      
      #comunicados{
          height:280px;
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
       padding-left:10px;
      } 
      
      .logout_btn:hover{
       margin-left:2385px;
       position: fixed;
       width:4%;
       padding-left:10px;
      } 
    
     }
  </style>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery(window).scroll(function() {
      if (jQuery(this).scrollTop() <= 5) {
        jQuery('#google_translate_element').fadeIn(1);
      } else {
        jQuery('#google_translate_element').fadeOut(1);
      }
    });
  });
</script>
<?php
  $uid = $userDetails->uid;
  $conexao= mysqli_connect("mysql.klausinvest.com","klausinvest","nick70KL@US","klausinvest");
  $conexao->set_charset('utf8');
  $consulta_endereco = "SELECT * FROM enderecos WHERE id_investidor='$uid'";
  $consulta_beneficiario = "SELECT * FROM beneficiarios WHERE id_investidor='$uid'";
  $con = $conexao->query($consulta_endereco);
  $con2 = $conexao->query($consulta_beneficiario);
  $linha = $con->fetch_array();
  $dado= $con2->fetch_array();
  $rua = $linha['rua'];
  $bairro = $linha['bairro'];
  $estado = $linha['estado'];
  $cep = $linha['cep'];
  $pais = $linha['pais'];
  $nome_beneficiario =  $dado['name'];
  $email_beneficiario = $dado['email'];
  $cpf_beneficiario = $dado['cpf'];
  $telefone_beneficiario = $dado['telefone'];
?>

  <!-- =======================================================
    Nome do Template: Klaus 
    Versão: 1.0
    Autor: Rafael Melchioretto
  ======================================================= -->
</head>
<body>
<?php if ($language ==='en_usa') { ?> 
    
  <script type="text/javascript">
    var rua = "<?php echo $rua?>";
    var bairro = "<?php echo $bairro;?>";
    var estado = "<?php echo $estado;?>";
    var cep = "<?php echo $cep;?>";
    var pais = "<?php echo $pais;?>";
    var nome_beneficiario = "<?php echo $nome_beneficiario;?>";
    var email_beneficiario = "<?php echo $email_beneficiario;?>";
    var cpf_beneficiario = "<?php echo $cpf_beneficiario;?>";
    var telefone_beneficiario = "<?php echo $telefone_beneficiario;?>";

   
   
    if(rua=="" || bairro=="" || estado=="" || cep=="" || pais=="" ){
      swal({
        title: "Incomplete Registration!",
        text: "Your address details are incomplete! Finish filling in your details on the settings page.",
        icon: "warning",
        buttons: ['Cancel','Settings'],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
           window.location="https://www.klausinvest.com/views/configuracoes_endereco.php?language=en_usa"
        } else {
          
        }
      });
    }
    
        else if(nome_beneficiario=="" || telefone_beneficiario=="" || email_beneficiario=="" || cpf_beneficiario==""){
      swal({
        title: "Incomplete Registration!",
        text: "Your beneficiary's data is incomplete! Finish filling in your details on the settings page.",
        icon: "warning",
        buttons: ['Cancel','Settings'],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
           window.location="https://www.klausinvest.com/views/configuracoes_beneficiario1.php?language=en_usa"
        } else {
          
        }
      });
    }


</script>

<?php } else { ?>


  <script type="text/javascript">
    var rua = "<?php echo $rua?>";
    var bairro = "<?php echo $bairro;?>";
    var estado = "<?php echo $estado;?>";
    var cep = "<?php echo $cep;?>";
    var pais = "<?php echo $pais;?>";
    var nome_beneficiario = "<?php echo $nome_beneficiario;?>";
    var email_beneficiario = "<?php echo $email_beneficiario;?>";
    var cpf_beneficiario = "<?php echo $cpf_beneficiario;?>";
    var telefone_beneficiario = "<?php echo $telefone_beneficiario;?>";

   
   
    if(rua=="" || bairro=="" || estado=="" || cep=="" || pais=="" ){
      swal({
        title: "Cadastro Incompleto!",
        text: "Os dados referentes ao seu endereço estão incompletos! Termine de preencher seus dados na página de configurações",
        icon: "warning",
        buttons: ['Cancelar','Configurações'],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
           window.location="https://www.klausinvest.com/views/configuracoes_endereco.php"
        } else {
          
        }
      });
    }
    
        else if(nome_beneficiario=="" || telefone_beneficiario=="" || email_beneficiario=="" || cpf_beneficiario==""){
      swal({
        title: "Cadastro Incompleto!",
        text: "Os dados referentes ao seu beneficiário estão incompletos! Termine de preencher seus dados na página de configurações.",
        icon: "warning",
        buttons: ['Cancelar','Configurações'],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
           window.location="https://www.klausinvest.com/views/configuracoes_beneficiario1.php"
        } else {
          
        }
      });
    }


</script>

<?php } ?>

  
  <input type="checkbox" id="check" style="display:none;">
  <!--Cabeçalho-->
    <header>
    <label for="check">
     <i class="fas fa-th-large" id="sidebar_btn"></i>

    </label>
    <div class="left_area">
      <h3><img src="../img/INVEST.png" style="width:170px;"></h3> 
    </div>
    <div class="right_area">
      <a href="<?php echo BASE_URL; ?>logout.php" class="logout_btn">Logout <i class="fas fa-sign-out-alt"></i></a>
    </div>  
  </header>
  <!--/Fim Cabeçalho-->
  <!--Sidebar-->
    <div class="mobile_sidebar">
    </div>  
    <div class="sidebar">
      <center>
        <img src="../fotos/<?php echo $userDetails->profile_pic; ?>" class="profile_image" alt="" style="border-style:solid; border-color: white; border-width: 2px;">
        <h4 style="color: white;" id="logo_nome"><strong><?php echo $userDetails->username; ?></strong></h4>

      </center>
      <hr class="my-2 ml-0 bg-white">
    <?php if ($language ==='en_usa') { ?> 

      <a href="home.php?language=en_usa" id="active" title="Home"><i class="fas fa-desktop"></i><span>Home</span></a>
      <a href="dashboard3.php?language=en_usa" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
      <a href="extrato.php?language=en_usa" title="Extract">&nbsp;<i class="fas fa-receipt" ></i><span> Extract</span></a>
      <a href="aporte.php?language=en_usa" title="Contribution">&nbsp;<i class="fas fa-donate"></i><span> Contribution</span></a>
      <a href="rentabilidade.php" title="Profitability">&nbsp;<i class="fas fa-funnel-dollar"></i><span>Profitability</span></a>
      <a href="resgate.php?language=en_usa" title="Rescue">&nbsp;<i class="fas fa-money-bill-alt"></i><span>Rescue</span></a>
      <a href="recibos.php?language=en_usa" title="Contribution Receipts">&nbsp;<i class="fas fa-book"></i><span> Contribution Receipts</span></a>
      <a href="atendimento.php?language=en_usa" title="Service">&nbsp;<i class="fas fa-headset"></i><span> Service</span></a>
      <a href="configuracoes.php?language=en_usa" title="Settings">&nbsp;<i class="fas fa-cogs"></i><span> Settings</span></a>
    
       <?php } else { ?>
       
      <a href="home.php" id="active" title="Home"><i class="fas fa-desktop"></i><span>Home</span></a>
      <a href="dashboard3.php" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
      <a href="extrato.php" title="Extratos">&nbsp;<i class="fas fa-receipt" ></i><span> Extrato</span></a>
      <a href="aporte.php" title="Aporte">&nbsp;<i class="fas fa-donate"></i><span> Aporte</span></a>
      <a href="resgate.php" title="Resgate">&nbsp;<i class="fas fa-money-bill-alt"></i><span>Resgate</span></a>
        <?php
           $conexao= mysqli_connect("mysql.klausinvest.com","klausinvest","nick70KL@US","klausinvest");
               /*$conexao= mysqli_connect("localhost","root","","klaus");*/
               $conexao->set_charset('utf8');
               $uid = $userDetails->uid;
               $consulta_rentabilidade = "SELECT * FROM rentabilidade where id_user=$uid order by id_rentabilidade desc limit 1";
               $con = $conexao->query($consulta_rentabilidade); 
         ?> 
         
          <?php while($dado = $con->fetch_array()){
                            $tipo =  $dado['tipo'];
                            $data = $dado['data'];
                            $data_rent = strtotime($data);
                            $data_br = date("d/m/Y", $data_rent);
                            $status='Reinvestindo';    
              ?>
              
             <?php
                               $status='Reinvestindo';    
                       
                               if($tipo=='Reinvestir' || $tipo==""){
                                $status ='Reinvestindo';
                                $link = 'reinvestir.php';
                                
                            }
                            
                            else if($tipo=='Rentabilidade'){
                                $status = 'Rentabilidade Mensal';
                                 $link = 'resgate_rentabilidade_mensal.php';
                                
                            }
       
             ?>
             <?php } ?>
            <a href="<?php echo $link;?>" title="Rentabilidade">&nbsp;<i class="fas fa-funnel-dollar"></i><span>Rentabilidade</span></a>
      <a href="recibos.php" title="Recibos de Aporte">&nbsp;<i class="fas fa-book"></i><span> Recibos de Aporte</span></a>
      <a href="atendimento.php" title="Atendimento">&nbsp;<i class="fas fa-headset"></i><span> Atendimento</span></a>
      <a href="configuracoes.php" title="Configurações">&nbsp;<i class="fas fa-cogs"></i><span> Configurações</span></a>
      
      <?php } ?>
    </div>

  <!--/Fim Sidebar-->
  <div class="content" style="background-image: linear-gradient(to bottom, #49494a, #3c3c3d, #303031, #242425, #18191a);">
    <div class="container">
      <div class="row">
        
          
            
            <div class="col-sm-12">

  <!-- Banner -->
      <div class="mb-4 text-center container-fluid" id="banner" style=" background: linear-gradient(0deg, rgba(0,0,0,0.1),rgba(0,0,0,0.3)), url('../img/home_bg6.png'); background-size: cover;">
    
       <div class="d-flex justify-content-center align-items-center h-100">

         <div>
         <img src="../fotos/<?php echo $userDetails->profile_pic?>" id="foto">
          <h4 class="mt-2" style="font-weight: 900; color:white; font-size: 28px;"><?php echo $userDetails->name;?></h4>
          <h6 style="color:white"><?php echo $userDetails->email;?></h6>
             <?php if ($language ==='en_usa') { ?> 
                  <h6  id="investidor" style="color: white;">-Investor-</h6>
             <?php } else { ?>
                 <h6  id="investidor" style="color: white;">-Investidor-</h6>

            <?php } ?>    
          
          
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /Banner -->
</header>

  <!--Quem Somos-->
  <center>
    <hr style="margin-top: 100px; margin-bottom: 30px; background-color: white;">
      <?php if ($language ==='en_usa') { ?> 
          <h3 style="color:white;"><i class="fas fa-bullhorn"></i>&nbsp;&nbsp;Information</h3>
         <?php } else { ?>
              <h3 style="color:white;"><i class="fas fa-bullhorn"></i>&nbsp;&nbsp;Informações</h3>
     
        <?php } ?> 
  </center>
            <div class="row">
                      <div class="col-md-6" >
                <div class="card" style="box-shadow: none;">
                    <div class="card-image">
                        <div class="embed-responsive embed-responsive-16by9">
<iframe width="560" height="315" src="https://www.youtube.com/embed/PjlGy2r9yxM" title="YouTube video player" frameborder="0" allow="accelerometer; modestbranding=1; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        
                     </div>         
                    <div class="card-content">
                       <?php if ($language ==='en_usa') { ?> 
                            <span class="card-title">About  Us</span>
                        <?php } else { ?>
                           <span class="card-title">Quem Somos</span>
 
                        <?php } ?> 


                    </div>
                    <!-- card content -->             
                </div>
            </div>
        </div>
      <!--/Quem Somos-->

      <!--Nosso Site-->
    <div class="col-md-6">
                  <div class="card" style="box-shadow: none;">
                      <div class="card-image">
                          <div class="embed-responsive embed-responsive-16by9">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/7oRg9U5nUEs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
                          
                                
                      <div class="card-content">
                         <?php if ($language ==='en_usa') { ?> 
                            <span class="card-title">Our Site</span>
                         <?php } else { ?> 
                            <span class="card-title">Nosso Site</span>

                         <?php } ?> 
                      </div>
                      <!-- card content -->             
                  </div>
              </div>
          </div>
       </div>
      <!--/Nosso Site-->
      
    
  <!--Comunicados-->
    <div class="row">
      <div class="col-sm-11 col-md-12">
    <div class="card mt-3 mb-3" id="comunicados" style="-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
  -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
  box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75); border-radius: 10px;">
      
      <div class="card-body mb-3">
      <?php if ($language ==='en_usa') { ?> 
          <h4 class="card-title text-center"><i class="fab fa-grav"></i>&nbsp;Announcements</h4><hr><br>
       <?php } else { ?> 
          <h4 class="card-title text-center"><i class="fab fa-grav"></i>&nbsp;Comunicados</h4><hr><br>

        <?php } ?> 
 
          <blockquote class="blockquote mb-0">
      <?php if ($language ==='en_usa') { ?> 
      
          <p id="text-comunicados"><img src="../img/K..png" id="foto_comunicado">&nbsp;&nbsp;&nbsp;Welcome to the Klaus Invest family.</p>
                    <footer class="blockquote-footer" id="by" style="margin-top:-30px;margin-left: 65px;">Klaus Invest Team</footer>

      <?php } else { ?> 
            <p id="text-comunicados"><img src="../img/K..png" id="foto_comunicado">&nbsp;&nbsp;&nbsp;Bem Vindo a Família Klaus Invest.</p>
                    <footer class="blockquote-footer" id="by" style="margin-top:-30px;margin-left: 65px;">Equipe Klaus Invest.</footer>

      <?php } ?> 
        </blockquote>
        <br><br>
     <?php if ($language ==='en_usa') { ?> 
    
        <script>
          const clipboard = new ClipboardJS('.btn')

          clipboard.on('success', function(e) {
              swal("PIX key successfully copied!","","success");
          });

          clipboard.on('error', function(e) {
              alert("Failed to copy PIX key!")
          });
        </script>
    <?php } else { ?> 
    
           <script>
          const clipboard = new ClipboardJS('.btn')

          clipboard.on('success', function(e) {
              swal("Chave PIX copiada com sucesso!","","success");
          });

          clipboard.on('error', function(e) {
              alert("Falha ao copiar chave Pix!")
          });
        </script>

      <?php } ?> 

        
        <blockquote class="blockquote mb-0">
    <?php if ($language ==='en_usa') { ?> 
          <p id="text-comunicados"><img src="../img/key.png" id="foto_comunicado">&nbsp;&nbsp;&nbsp;Our Pix Key: 304.313.818-01<a class="btn btn-light" title="Copy Pix Key"style="border-radius:20px;" data-clipboard-text="304.313.818-01"><i class="far fa-copy" style="color:#006bdf; border-radius:20px;"></i></a></p>
    <?php } else { ?> 
         <p id="text-comunicados"><img src="../img/key.png" id="foto_comunicado">&nbsp;&nbsp;&nbsp;Nossa chave Pix: 304.313.818-01<a class="btn btn-light" title="Copiar Chave PIX"style="border-radius:20px;" data-clipboard-text="304.313.818-01"><i class="far fa-copy" style="color:#006bdf; border-radius:20px;"></i></a></p>

    <?php } ?>

          <footer id="by" style="margin-top:-27px;margin-left: 65px;"><strong style="color:black;">Eduardo Cezar de Oliveira</strong><br>Bco do Brasil S.A - 4728/173770<br>304.313.818-01</footer>
        </blockquote>
      
      </div>
    </div>  
  </div>
</div>
    <!--/Comunicados-->
      <!-- Footer -->

      <div class="row" style="padding-top: 5%;">
        <div class="col-sm-11 col-md-12">
      <hr style="background-color: white;">
      <footer class="page-footer h6">
        <?php if ($language ==='en_usa') { ?> 
        <div class="footer-copyright text-center  py-3 text-white"><?php echo date("Y");?>&nbsp;Developed by © Tiberius Tecnologia
       <?php } else { ?> 
        <div class="footer-copyright text-center  py-3 text-white"><?php echo date("Y");?>&nbsp;Desenvolvido por © Tiberius Tecnologia

           <?php } ?>

        </div>
    </footer>
</div>
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
<?php
      
      @$arquivo   = $_FILES['arquivo']['name'];
      
      //Pasta onde o arquivo vai ser salvo
      $_UP['pasta'] = '../fotos/';
      
      //Tamanho máximo do arquivo em Bytes
      $_UP['tamanho'] = 1024*1024*100; //5mb
      
      //Array com a extensões permitidas
      $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
      
      //Renomeiar
      $_UP['renomeia'] = false;
      
    
      //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
      
        //Primeiro verifica se deve trocar o nome do arquivo
        if($_UP['renomeia'] == true){
          //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
          $nome_final = time().'.jpg';
        }else{
          //mantem o nome original do arquivo
          $nome_final = @$_FILES['arquivo']['name'];
        }
        //Verificar se é possivel mover o arquivo para a pasta escolhida
        if(move_uploaded_file(@$_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
          //Upload efetuado com sucesso, exibe a mensagem
          $db = getDB();
          $stmt = $db->prepare("UPDATE users SET profile_pic='$nome_final' where uid='$session_uid'");
          $stmt->execute();
          echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
          
      }
    
      
      
    ?>
    

<!--JS Bootstrap-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>