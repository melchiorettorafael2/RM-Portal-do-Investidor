<?php
error_reporting(0);
include('../config.php');
include('../class/userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);
$finance=$userClass->finance($_SESSION['uid']);


include('../session.php');
$userDetails=$userClass->userDetails($session_uid);

@$language = $_GET['language'];

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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!--Favicon-->
  <link rel="icon" type="img" href="../img/klaus_favicon.png">
  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <!--Jquery-->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  
  <!-- CDN do Chart.js -->
  <script src="Chart.js"></script>

  <style>

   /* Default height for small devices portrait*/
    @media (min-width: 360px){
      .card-counter{
          margin-top: 10px;
          margin-left: 5px;
          width: 99%;
          padding: 10px 10px;
          background-color: #fff;
          height: 110px;
          border-radius: 5px;
          transition: .3s linear all;
          margin-left: 1px;
        }
        #foto_comunicado{
       width: 55px;
       border-radius:100px;
    }

        .card-counter:hover{
          box-shadow: 2px 2px 10px #DADADA;
          transition: .3s linear all;
        }

        .card-counter.primary{
          background: linear-gradient(90deg, rgb(96, 176, 235),rgb(48, 121, 192));
          color: #FFF;
        }

        .card-counter.danger{
          background: linear-gradient(90deg, rgb(246, 112, 112),rgb(231, 67, 67));
          color: #FFF;
        }  

        .card-counter.success{
          background: linear-gradient(90deg, rgb(79, 207, 187),rgb(65, 175, 116));
          color: #FFF;
        }  

        .card-counter.info{
         background: linear-gradient(90deg, rgb(240, 212, 85),rgb(218, 167, 52));
          color: #FFF;
        }  

        #h_success{
          margin-top: -50px;
        }

        #h_primary{
          margin-top: -50px;
        }

        #h_danger{
          margin-top: -57px;
        }
        .card-counter.primary i{
          font-size: 5em;
          opacity: 0.1;
          margin-left: 72%;
          margin-top: 2%;
          color: black;
        }

        .card-counter.primary .count-numbers{
          position: absolute;
          margin-left: 0px;
          top: 50px;
          font-size: 26px;
          display: block;
        }

        .card-counter.primary .count-name{
          position: absolute;
          left:25px;
          top: 18px;
          font-style: italic;
          text-transform: capitalize;
          opacity: 1;
          display: block;
          font-size: 20px;
        }

        .card-counter.danger i{
          font-size: 5em;
          opacity: 0.1;
          margin-left: 72%;
          margin-top: 4%;
          color: black;
        }

        .card-counter.danger .count-numbers{
          position: absolute;
          margin-left: 0px;
          top: 50px;
          font-size: 26px;
          display: block;
        }

        .card-counter.danger .count-name{
          position: absolute;
          left:25px;
          top: 15px;
          font-style: italic;
          text-transform: capitalize;
          opacity: 1;
          display: block;
          font-size: 20px;
        }

        .card-counter.success i{
          font-size: 5em;
          opacity: 0.1;
          margin-left: 73%;
          margin-top: 2%;
          color: black;
        }

        .card-counter.success .count-numbers{
          position: absolute;
          margin-left: 0px;
          top: 50px;
          font-size: 26px;
          display: block;
        }

        .card-counter.success .count-name{
          position: absolute;
          left:25px;
          top: 18px;
          font-style: italic;
          text-transform: capitalize;
          opacity: 1;
          display: block;
          font-size: 20px;
        }



        .card-counter.info i{
          font-size: 5em;
          opacity: 0.1;
          margin-left: 75%;
          margin-top: 2%;
          color: black;
        }

        .card-counter.info .count-numbers{
          position: absolute;
          margin-left: 2px;
          top: 50px;
          font-size: 26px;
          display: block;
        }

        .card-counter.info .count-name{
          position: absolute;
          left:20px;
          top: 18px;
          font-style: italic;
          text-transform: capitalize;
          opacity: 1;
          display: block;
          font-size: 20px;
        }

        #str_data{
          position: absolute;
          margin-left: 2px;
          top: 50px;
          font-size: 24px;
          display: block;
        }
      #grafico {
        display: none;
      }

      .card-body1{
        width: 100%;
        margin-left:-2px;
    }

    .card-body1 h4{
      margin-top: 15px;
      margin-bottom: 5px;
    }

    .currency, .count{
      font-size: 25px;
      font-weight: 500;
    }

    .card-body1 p{
      font-size: 18px;
      margin-top: 0;
      
    }

    .card-body1 i{
      font-size: 50px;
      color: rgba(255,255,255,0.6);
    }


      #check:checked~.content .card-body1{
        width: 100%;
        margin-left: 8px;
        margin-right: 8px;
      }

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
        margin-left: 40px;
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
          margin-top: -36px;
         }
         #info_imposto{
          width: 100%;
         }

         #comunicados{
          width: 100%;
          height:80%;
         }
         hr{
          width:100%;
          
         }

     
  }

    /* Default height for small devices landscape*/
    @media (min-width: 640px){

    .card-body1{
      width: 310px;
    }

    #check:checked~.content .card-body1{
      width: 450px;
      margin-left: 8px;
      margin-right: 8px;
    }
    }

 /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      .card-counter{
          margin-top: 10px;
          margin-left: 5px;
          width: 100%;
          padding: 10px 10px;
          background-color: #fff;
          height: 100px;
          border-radius: 5px;
          transition: .3s linear all;
        }
        
        #rodape hr{
            margin-left: 5px;
            width:900px;
            
        }

        .card-counter:hover{
          box-shadow: 2px 2px 10px #DADADA;
          transition: .3s linear all;
        }

        .card-counter.primary{
          background: linear-gradient(90deg, rgb(96, 176, 235),rgb(48, 121, 192));
          color: #FFF;
          margin-top: 13.5px;
        }

        .card-counter.danger{
          background: linear-gradient(90deg, rgb(246, 112, 112),rgb(231, 67, 67));
          color: #FFF;
          margin-left: -10px;
        }  

        .card-counter.success{
          background: linear-gradient(90deg, rgb(79, 207, 187),rgb(65, 175, 116));
          color: #FFF;
          margin-left: -25px;
        }  

        .card-counter.info{
         background: linear-gradient(90deg, rgb(240, 212, 85),rgb(218, 167, 52));
          color: #FFF;
          margin-left: -39px;
        }  

        .card-counter.primary i{
          font-size: 3.5em;
          opacity: 0.1;
          margin-left: 70%;
          margin-top: 10%;
          color: black;
        }

        .card-counter.primary .count-numbers{
          position: absolute;
          margin-left: 0px;
          top: 45px;
          font-size: 22px;
          display: block;
        }

        .card-counter.primary .count-name{
          position: absolute;
          right: 150px;
          margin-left: 5px;
          top: 18px;
          text-transform: capitalize;
          opacity: 1;
          display: block;
          font-size: 13.5px;
        }

        .card-counter.danger i{
          font-size: 3.8em;
          opacity: 0.1;
          margin-left: 70%;
          margin-top: 10%;
          color: black;
        }

        .card-counter.danger .count-numbers{
          position: absolute;
          margin-left: 0px;
          top: 45px;
          font-size: 22px;
          display: block;
        }

        .card-counter.danger .count-name{
          position: absolute;
          right: 70px;
          margin-left: -15px;
          top: 18.2px;
          text-transform: capitalize;
          opacity: 1;
          display: block;
          font-size: 13.2px;
        }

        .card-counter.success i{
          font-size: 3.5em;
          opacity: 0.1;
          margin-left:72%;
          margin-top: 10%;
          color: black;
        }

        .card-counter.success .count-numbers{
          position: absolute;
          margin-left: 0px;
          top: 45px;
          font-size: 22px;
          display: block;
        }

        #h_success{
          margin-top: -44px;
        }

        #h_primary{
          margin-top: -44px;
        }

        #h_danger{
          margin-top: -48px;
        }

        .card-counter.success .count-name{
          position: absolute;
          right: 150px;
          top: 18px;
          margin-left: -25px;
          text-transform: capitalize;
          opacity: 1;
          display: block;
          font-size: 13.2px;
        }



        .card-counter.info i{
          font-size: 3.8em;
          opacity: 0.1;
          margin-left: 72%;
          margin-top: 9%;
          color: black;
        }

        .card-counter.info .count-numbers{
          position: absolute;
          margin-left: 2px;
          top: 45px;
          font-size: 22px;
          display: block;
        }

        .card-counter.info .count-name{
          position: absolute;
          left:-15px;
          top: 18px;
          font-style: italic;
          text-transform: capitalize;
          opacity: 1;
          display: block;
          font-size: 13.4px;
        }

        #str_data{
          position: absolute;
          margin-left: 0px;
          top: 45px;
          font-size: 22px;
          display: block;
        }
    
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

      .sidebar{
        background: linear-gradient(0deg, rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('../img/bg.jpg'); background-size:cover; background-attachment: scroll; 
        margin-top: 70px; 
        padding: 30px;
        position: fixed;
        left:0;
        width: 248px;
        height: 100%;
        transition: 0.5s;
        transition-property: left;
      }

      .container{
        padding-right: 95px;
        padding-left: 95px;
      } 

    .card-body1{
      margin-left:5px;
      width: 209.8px;
    }
    .card-body1 i{
      font-size: 0px;
      color: rgba(255,255,255,0.6);
    }

    .card-body1 p{
      font-size: 14px;
      font-weight: 900;
    }

    #check:checked~.content .card-body1{
      width: 218px;
      margin-left: 8px;
      margin-right: 8px;
    } 

    #check:checked~.content .card-body1 i{
      font-size: 0px;

    }

    #check:checked~.content #grafico{
    width: 918px;

    }


    #grafico {
        display: block;
        width: 895px;
      }

      #info_imposto{
        width: 97%;
      }

      #check:checked~.content #info_imposto{
        width: 97%;
      }

      #comunicados{
        width: 97%;
        height:72%;
      }

       #check:checked~.content #comunicados{
        width: 97%;
      }

      hr{
        width:100%;
        margin-left:-10px;
      }

       #check:checked~.content hr{
        width: 100%;
        margin-left: 0; 
      }

      

    }
    /* Height for devices larger than 1400px */
    @media (min-width: 1400px) {
   
     .container{
        width: 100%;
        margin-left: 250px;
        padding-left:0px;
        padding-right:0px;
      }
 

    .card-body1{
      width: 265px;
    }
    
    #check:checked~.content .card-body1{
      width: 265px;
      margin-left: 8px;
      margin-right: 8px;
    } 

     #check:checked~.content #comunicados{
        width: 98%;
      }
      
    #check:checked~.content #info_imposto{
        width: 98%;
      }
      
    #rodape hr{
        width:97%;
        margin-left:10px;
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
      width: 1105px;

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

      .left_area span{
        color: #0FCC7D;
        margin: 0;
        text-transform: uppercase;
        font-size: 30px;
        font-weight: 900;
        font-family: 'Oswald', sans-serif;
      }
      
      #rodape{
          margin-left:-10px;
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
    
     }
  </style>
  <!-- =======================================================
    Nome do Template: Klaus 
    Versão: 1.0
    Autor: Rafael Melchioretto
  ======================================================= -->
</head>
<body style="background-color: #18191A;">
  
    
  <input type="checkbox" id="check" style="display:none;">
  <!--Cabeçalho-->
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
        <img src="../fotos/<?php echo $userDetails->profile_pic; ?>" class="profile_image" alt="" style="border-style:solid; border-color: white; border-width: 2px;">
        <h4 style="color: white;"><strong><?php echo $userDetails->username; ?></strong></h4>
      </center>
      <hr class="my-2 ml-0 bg-white"> 
    <?php if ($language ==='en_usa') { ?> 

      <a href="home.php?language=en_usa"  title="Home"><i class="fas fa-desktop"></i><span>Home</span></a>
      <a href="dashboard3.php?language=en_usa" id="active" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
      <a href="extrato.php?language=en_usa" title="Extract">&nbsp;<i class="fas fa-receipt" ></i><span> Extract</span></a>
      <a href="aporte.php?language=en_usa" title="Contribution">&nbsp;<i class="fas fa-donate"></i><span> Contribution</span></a>
      <a href="rentabilidade.php" title="Profitability">&nbsp;<i class="fas fa-funnel-dollar"></i><span>Profitability</span></a>
      <a href="resgate.php?language=en_usa" title="Rescue">&nbsp;<i class="fas fa-money-bill-alt"></i><span>Rescue</span></a>
      <a href="recibos.php?language=en_usa" title="Contribution Receipts">&nbsp;<i class="fas fa-book"></i><span> Contribution Receipts</span></a>
      <a href="atendimento.php?language=en_usa" title="Service">&nbsp;<i class="fas fa-headset"></i><span> Service</span></a>
      <a href="configuracoes.php?language=en_usa" title="Settings">&nbsp;<i class="fas fa-cogs"></i><span> Settings</span></a>
    
       <?php } else { ?>
       
      <a href="home.php"  title="Home"><i class="fas fa-desktop"></i><span>Home</span></a>
      <a href="dashboard3.php" id="active" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
      <a href="extrato.php" title="Extratos">&nbsp;<i class="fas fa-receipt" ></i><span> Extrato</span></a>
      <a href="aporte.php" title="Aporte">&nbsp;<i class="fas fa-donate"></i><span> Aporte</span></a>
      <a href="resgate.php" title="Resgate">&nbsp;<i class="fas fa-money-bill-alt"></i><span>Resgate</span></a>
      <a href="rentabilidade.php" title="Rentabilidade">&nbsp;<i class="fas fa-funnel-dollar"></i><span>Rentabilidade</span></a>
      <a href="recibos.php" title="Recibos de Aporte">&nbsp;<i class="fas fa-book"></i><span> Recibos de Aporte</span></a>
      <a href="atendimento.php" title="Atendimento">&nbsp;<i class="fas fa-headset"></i><span> Atendimento</span></a>
      <a href="configuracoes.php" title="Configurações">&nbsp;<i class="fas fa-cogs"></i><span> Configurações</span></a>
      
      <?php } ?>
    </div>

  <!--/Fim Sidebar-->
  <!--Montante Card-->
  <div class="content" style="background-image: linear-gradient(to bottom, #49494a, #3c3c3d, #303031, #242425, #18191a);">

    <div class="container mt-4">
      <div class="row">
           <div class="col-md-3">
        <div class="card-counter primary">
               <i class="fas fa-coins"></i>
                 <?php if ($language ==='en_usa') { ?> 
                       <span class="count-numbers"><?php echo $finance->montante;?></span>
                       <span class="count-name">Amount</span>
                 <?php } else { ?>
                       <span class="count-numbers"><?php echo $finance->montante;?></span>
                       <span class="count-name">Montante</span>
                 
                 <?php } ?>

             </div>
           </div>
           <?php
              $rentabilidade =  $finance->rentabilidade;
              $saldo_total = $finance->saldo;
           ?>
    
           <div class="col-md-3 mt-1">
             <div class="card-counter danger">
               <i class="fas fa-chart-line"></i>
               <span class="count-numbers"><?php echo $rentabilidade;?></span>
            <?php if ($language ==='en_usa') { ?> 
               <span class="count-name">Accumulated Profitability</span>
            <?php } else { ?>
                <span class="count-name">Rentabilidade Acumulada</span>
            
            <?php } ?>

  
               
             </div>
           </div>

           <div class="col-md-3 mt-1">
             <div class="card-counter success">
                <i class="fas fa-donate"></i>
               <span class="count-numbers"><?php echo $saldo_total;?></span>
              <?php if ($language ==='en_usa') { ?> 
                <span class="count-name">Total balance</span>
                <?php } else { ?>
                 <span class="count-name">Saldo Total</span>

                <?php } ?>
                
             </div>
           </div>

           <div class="col-md-3 mt-1">
             <div class="card-counter info">
               <i class="far fa-calendar-alt"></i>
               <span id="str_data"></span>
               
            <?php if ($language ==='en_usa') { ?> 
               <span class="count-name">Best Date for Contribution</span>
               <?php } else { ?>
                <span class="count-name">Melhor data para Aporte</span>

                <?php } ?>
               
             </div>
           </div>
    </div>  

      <!--/Calendario Card-->
      <?php
        if ($language ==='en_usa') { 
      
            $valor_base = $finance->montante;
            $local = 'en-usa';
            $currency = 'USD';
            $fmt= new NumberFormatter($local, NumberFormatter::CURRENCY);
            @$padrao_br = $fmt->formatCurrency($valor_base, $currency);
        
        } else{
            $valor_base = $finance->montante;
            $local = 'pt-br';
            $currency = 'BRL';
            $fmt= new NumberFormatter($local, NumberFormatter::CURRENCY);
            @$padrao_br = $fmt->formatCurrency($valor_base, $currency);
            
        }
        
        
      ?>
     
      
      <!--Grafico Rentabilidade-->
      <div class="row">
        <div class="col-sm-11 col-md-12" style="">
          <div class="card mt-4 mb-3"  id="grafico" style=" margin-left:3px; -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
  -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
  box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
            <div class="card-header text-center" style="background-color: #000;">
             <?php if ($language ==='en_usa') { ?> 
              <p class="h6" style="font-family: 'Roboto', sans-serif; color:#FFF;margin-top: 5px;"><i class="far fa-chart-bar" style="font-size:22px;"></i>&nbsp;&nbsp;PROFITABILITY COMPARISON <?php echo date("Y");?></p>
                            <p class="h5"style="font-family: 'Roboto', sans-serif; color:#FFF; font-size:14px; ">(Base value &nbsp;<?php echo $padrao_br;?>)</p>
                         <?php } else { ?>
                          <p class="h6" style="font-family: 'Roboto', sans-serif; color:#FFF;margin-top: 5px;"><i class="far fa-chart-bar" style="font-size:22px;"></i>&nbsp;&nbsp;COMPARATIVO DE RENTABILIDADE <?php echo date("Y");?></p>
                            <p class="h5"style="font-family: 'Roboto', sans-serif; color:#FFF; font-size:14px; ">(Valor Base &nbsp;<?php echo $padrao_br;?>)</p>
                        <?php } ?>

              </div>
              <?php
                  $year = date('Y');
                  $conexao= mysqli_connect("mysql.klausinvest.com","klausinvest","nick70KL@US","klausinvest");
                  /*$conexao= mysqli_connect("localhost","root","","klaus");*/
                  $query1 = "SELECT * from rendimento WHERE mes=1 && ano='$year'";
                  $con = $conexao->query($query1);
                  $resultado1 = mysqli_fetch_assoc($executa1);
                  while($dado = $con->fetch_array()){ 
                    $selic_jan= $dado['selic'];
                    $poup_jan= $dado['poupanca'];
                    $klaus_jan = $dado['klaus'];
                    
                  };
                  $query2 = "SELECT * from rendimento WHERE mes=2 && ano='$year'";
                  $con2 = $conexao->query($query2);
                  $resultado2 = mysqli_fetch_assoc($executa2);
                   while($dado = $con2->fetch_array()){
                    $selic_fev = $dado['selic'];
                    $poup_fev= $dado['poupanca'];
                    $klaus_fev = $dado['klaus'];
                      
                  };
                   $query3 ="SELECT * from rendimento WHERE mes=3 && ano='$year'";
                  $con3 = $conexao->query($query3);
                  $resultado3 = mysqli_fetch_assoc($executa3);
                    while($dado = $con2->fetch_array()){
                    $selic_mar = $dado['selic'];
                    $poup_mar = $dado['poupanca'];
                    $klaus_mar = $dado['klaus'];
                      
                  };
                   $query4 ="SELECT * from rendimento WHERE mes=4 && ano='$year'";;
                    $con4 = $conexao->query($query4);
                  $resultado4 = mysqli_fetch_assoc($executa4);
                  while($dado = $con4->fetch_array()){
                    $selic_abr = $dado['selic'];
                    $poup_abr = $dado['poupanca'];
                    $klaus_abr = $dado['klaus'];
                  };
                   $query5 ="SELECT * from rendimento WHERE mes=5 && ano='$year'";;
                   $con5 = $conexao->query($query5);
                  $resultado5 = mysqli_fetch_assoc($executa5);
                    while($dado = $con5->fetch_array()){
                    $selic_mai = $dado['selic'];
                    $poup_mai = $dado['poupanca'];
                    $klaus_mai = $dado['klaus'];
                  };
                    $query6 ="SELECT * from rendimento WHERE mes=6 && ano='$year'";;
                    $con6 = $conexao->query($query6);
                  $resultado6 = mysqli_fetch_assoc($executa6);
                    while($dado = $con6->fetch_array()){
                    $selic_jun = $dado['selic'];
                    $poup_jun= $dado['poupanca'];
                    $klaus_jun = $dado['klaus'];
                  };
                  $query7 ="SELECT * from rendimento WHERE mes=7 && ano='$year'";;
                   $con7 = $conexao->query($query7);
                  $resultado7 = mysqli_fetch_assoc($executa7);
                    while($dado = $con7->fetch_array()){
                    $selic_julho = $dado['selic'];
                    $poup_julho = $dado['poupanca'];
                    $klaus_julho = $dado['klaus'];
                  };
                  $query8 ="SELECT * from rendimento WHERE mes=8 && ano='$year'";;
                   $con8 = $conexao->query($query8);
                  $resultado8 = mysqli_fetch_assoc($executa8);
                    while($dado = $con8->fetch_array()){
                    $selic_ago = $dado['selic'];
                    $poup_ago = $dado['poupanca'];
                    $klaus_ago = $dado['klaus'];
                  };
                  $query9 ="SELECT * from rendimento WHERE mes=9 && ano='$year'";;
                  $con9 = $conexao->query($query9);
                  $resultado5 = mysqli_fetch_assoc($executa5);
                    while($dado = $con9->fetch_array()){
                    $selic_set = $dado['selic'];
                    $poup_set = $dado['poupanca'];
                    $klaus_set = $dado['klaus'];
                  };
                  $query10 ="SELECT * from rendimento WHERE mes=10 && ano='$year'";;
                   $con10 = $conexao->query($query10);
                  $resultado10 = mysqli_fetch_assoc($executa10);
                    while($dado = $con5->fetch_array()){
                    $selic_out = $dado['selic'];
                    $poup_out = $dado['poupanca'];
                    $klaus_out = $dado['klaus'];
                  };
                  $query11 ="SELECT * from rendimento WHERE mes=11 && ano='$year'";;
                   $con11 = $conexao->query($query11);
                  $resultado5 = mysqli_fetch_assoc($executa5);
                    while($dado = $con11->fetch_array()){
                    $selic_nov = $dado['selic'];
                    $poup_nov = $dado['poupanca'];
                    $klaus_nov = $dado['klaus'];
                  };
                  $query12 ="SELECT * from rendimento WHERE mes=12 && ano='$year'";;
                  $con12 = $conexao->query($query12);
                  $resultado12 = mysqli_fetch_assoc($executa12);
                    while($dado = $con5->fetch_array()){
                    $selic_dez = $dado['selic'];
                    $poup_dez = $dado['poupanca'];
                    $klaus_dez = $dado['klaus'];
                  };

              ?>

              <div class="card-body">
              <canvas id="myChart" width="50%" height="36%"></canvas></div>
          
                    <script>

                  var canvas = document.getElementById('myChart');
                  var data = {
                    <?php if ($language ==='en_usa') { ?> 
      
                      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November","December"],
                      
                  <?php } else { ?>
                        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro","Novembro","Dezembro"],

                  
                    <?php } ?>

    
                      datasets: [
                          {
                              label: 'KLAUS.',
                              backgroundColor: "rgba(0,166,90,0.7)",
                              borderColor: "rgba(0,166,90,0.7)",
                              barThickness: 11,
                              borderWidth: 1,
                              hoverBackgroundColor: "rgba(15,173,105,0.9)",
                              hoverBorderColor: "rgba(15,173,105,0.9)",
                              data: [<?php echo $valor_base *$klaus_jan;?>, <?php echo $valor_base * $klaus_fev;?>, <?php echo $valor_base * $klaus_mar?>, <?php echo $valor_base * $klaus_abr;?>, <?php echo $valor_base * $klaus_mai;?>, <?php echo $valor_base * $klaus_jun;?>, <?php echo $valor_base * $klaus_jul;?>,<?php echo $valor_base * $klaus_ago;?>, <?php echo $valor_base * $klaus_set;?>, <?php echo $valor_base * $klaus_out?>, <?php echo $valor_base * $klaus_nov?>, <?php echo $valor_base * $klaus_dez;?>]
                          }, {
                            label: 'Selic/CDI',
                            backgroundColor: "rgba(221,75,57,0.9)",
                            borderColor: "rgba(221,75,57,0.9)",
                            borderWidth: 1,
                            barThickness: 11,
                            data: [<?php echo $valor_base *$selic_jan;?>, <?php echo $valor_base * $selic_fev;?>, <?php echo $valor_base * $selic_mar;?>, <?php echo $valor_base *$selic_abr;?>, <?php echo $valor_base * $selic_mai;?>, <?php echo $valor_base *$selic_jun;?>, <?php echo $valor_base *$selic_jul;?>,<?php echo $valor_base *$selic_ago;?>, <?php echo $valor_base * $selic_set;?>, <?php echo $valor_base *$selic_out;?>, <?php echo $valor_base *$selic_nov;?>, <?php echo $valor_base *$selic_dez;?>]
                          }, {
                            label: 'Poupança',
                            backgroundColor: "rgba(243,156,18,0.7)",
                            borderColor: "rgba(243,156,18,0.7)",
                            borderWidth: 1,
                            barThickness: 11,
                            data: [<?php echo $valor_base *$poup_jan;?>, <?php echo $valor_base * $poup_fev;?>, <?php echo $valor_base * $poup_mar;?>, <?php echo $valor_base *$poup_abr;?>, <?php echo $valor_base * $poup_mai;?>, <?php echo $valor_base *$poup_jun;?>, <?php echo $valor_base *$poup_jul;?>,<?php echo $valor_base *$poup_ago;?>, <?php echo $valor_base * $poup_set;?>, <?php echo $valor_base *$poup_out;?>, <?php echo $valor_base *$poup_nov;?>, <?php echo $valor_base *$poup_dez;?>]
                          }]
                  };
                  var options = {
        
                  };


                  var myBarChart = new Chart(canvas,{
                    type:'horizontalBar',
                    data:data,
                    options: {
                      tooltips: {
                        callbacks: {
                          label: function(label,data, tooltipItems,index,dataset) {
                              return  parseFloat(label.value).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                            
                          }
                        }
                      },
                      
                      scales: {
                        yAxes: [{
                          ticks: {
                            beginAtZero: false,
                            callback: function(value, index) {
                              return value.toString();
                              
                            }
                          }
                        }]
                      }
                    }
                  });
                
                </script>
      <!--/Grafico Rentabilidade-->
    </div>
    </div>
  </div>
  
    <!--Info Imposto-->
    <div class="row">
      <div class="col-sm-11 col-md-12" style="">
    <div class="card mt-3 mb-3" id="info_imposto" style="-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
  -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
  box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
      <div class="card-header text-center"  style="background-color: #000;">
      <?php if ($language ==='en_usa') { ?> 
        <h6 style="font-family: 'Roboto', sans-serif; color:#FFF;margin-top: 5px;"><i class="fas fa-info-circle" style="font-size:20px; "></i>&nbsp;&nbsp;INFORMATION ON INCOME TAX</h6>
      <?php } else { ?>
         <h6 style="font-family: 'Roboto', sans-serif; color:#FFF;margin-top: 5px;"><i class="fas fa-info-circle" style="font-size:20px; "></i>&nbsp;&nbsp;INFORMAÇÕES SOBRE IMPOSTO DE RENDA</h6>

      <?php } ?>


      </div>
      <div class="card-body">
       <?php if ($language ==='en_usa') { ?> 
                    <p class="card-text text-center">Click the button below for more information.</p>
          <?php } else { ?>
               <p class="card-text text-center">Clique no botão abaixo para obter mais informações.</p>

            <?php } ?>

                    
        <!-- Botão para acionar modal -->
        <center>
            
      <?php if ($language ==='en_usa') { ?> 
      
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalLongoExemplo">
          Learn More
        </button>
        
      <?php } else { ?>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalLongoExemplo">
          Saiba Mais
        </button>
      
      <?php } ?>


      </center>
        <!-- Modal -->
        <div class="modal fade" id="ModalLongoExemplo" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="card-header text-center" style="background-color: #000;">
                      <?php if ($language ==='en_usa') { ?> 
                      <h6 style="font-family: 'Roboto', sans-serif; color:#FFF;margin-top: 5px;"><i class="fas fa-info-circle" style="font-size:20px; "></i>&nbsp;&nbsp;INFORMATION ON INCOME TAX</h6>
                    <?php } else { ?>
                      <h6 style="font-family: 'Roboto', sans-serif; color:#FFF;margin-top: 5px;"><i class="fas fa-info-circle" style="font-size:20px; "></i>&nbsp;&nbsp;INFORMAÇÕES SOBRE IMPOSTO DE RENDA</h6>

                    <?php } ?>

                    </div>
                    <div class="card-body">
                        
                    <?php if ($language ==='en_usa') { ?> 
  
                      <h6 class="card-title">Investors,</h6>
                      <p class="card-text">According to our transparency policy, there are always doubts regarding the annual Income Tax Declaration, for that, we would like to provide you with the following information:</p>
                      <p>- If the investor's balance is less than R$ 10 thousand, there is no need.</p>
                      <p>- If more than R$ 10 thousand, but less than R$ 50 thousand, it is recommended.</p>
                      <p>- If it exceeds R$ 50 thousand, it is important.</p>
                      <p>You must have your opening balance for January, your final balance for December, in addition to the full name and CPF of the company that holds the investment funds (EDUARDO CEZAR DE OLIVEIRA, CPF 304.313.818-01-96). Within the declaration system, access the tab "property and rights", "transactions between individuals", and inform the requested data. To declare the interest received, the amounts must be informed in the form: "Income Received from Individuals and Abroad".</p>
                      <p>Entretanto, a Klaus orienta aos investidores não preencherem esta ficha, por se tratar de um caso de dupla-tributação, pois a Renovatio já paga o imposto de renda quando opera no mercado.</p>
                      <p>However, Klaus is not responsible for the idiosyncrasy of the Internal Revenue Service.</p>
                      <p>Graciously,</p>
                      <p>Eduardo Oliveira</p> 
                          <p>Investment Adviser</p>
                          
                          <?php } else { ?>
                          
                            <h6 class="card-title">Caros investidores,</h6>
                                  <p class="card-text">Conforme nossa política de transparência sempre existe dúvidas com relação à Declaração de Imposto de Renda anual, para tanto, gostaríamos de passar as seguintes informações:</p>
                                  <p>- Caso o saldo do investidor seja inferior a R$ 10 mil, não há necessidade.</p>
                                  <p>- Se superior a R$ 10 mil, mas inferior a R$ 50 mil, é recomendável.</p>
                                  <p>- Se superior a R$ 50 mil, é importante.</p>
                                  <p>Você deverá ter em mãos o seu saldo inicial de janeiro, o seu saldo final de dezembro, além do nome completo e CPF da empresa que detém os fundos do investimento (EDUARDO CEZAR DE OLIVEIRA, CPF 304.313.818-01-96).   Dentro do sistema para a declaração, acessar a aba "bens e direito", "transação entre pessoas físicas", e informar os dados solicitados.   Para declarar os juros recebidos, os valores devem ser informados na ficha: "Rendimentos Recebidos de Pessoas Físicas e do Exterior".</p>
                                  <p>Entretanto, a Klaus orienta aos investidores não preencherem esta ficha, por se tratar de um caso de dupla-tributação, pois a Renovatio já paga o imposto de renda quando opera no mercado.</p>
                                  <p>Contudo, a Klaus não se responsabiliza pela idiossincrasia da Receita Federal.</p>
                                  <p>Atenciosamente,</p>
                                  <p>Eduardo Oliveira</p> 
                                      <p>Consultor de Investimentos</p>
                                      
                              <?php } ?>        
      
              </div>
              <div class="modal-footer">
                  
            <?php if ($language ==='en_usa') { ?> 
      
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                
              <?php } else { ?>
              
                <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>

                <?php } ?>        

    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>  
        


</div>


      </div>
    <!--/Info Imposto-->
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
           <h4 class="card-title text-center"><i class="fas fa-comments-dollar"></i>&nbsp;Decisão de Rentabilidade</h4><hr><br>
        <?php } ?>

                
        <?php
            $conexao= mysqli_connect("mysql.klausinvest.com","klausinvest","nick70KL@US","klausinvest");
            /*$conexao= mysqli_connect("localhost","root","","klaus");*/
            $conexao->set_charset('utf8');
            $uid = $userDetails->uid;
            $consulta_rentabilidade = "SELECT * FROM rentabilidade where id_user=$uid order by id_rentabilidade asc";
            $con = $conexao->query($consulta_rentabilidade);  
           ?>
           
        <?php while($dado = $con->fetch_array()){
            $tipo =  $dado['tipo'];
            $data = $dado['data'];
            $data_rent = strtotime($data);
            $data_br = date("d/m/Y", $data_rent);
    
       ?>
       
       <?php
               if($tipo=='Reinvestir' && $tipo==''){
                $status ='Reinvestindo';
            }
            
            else if($tipo=='Rentabilidade'){
                $status = 'Rentabilidade Mensal';
                
            }
       
       ?>
      
          <?php } ?>
          <blockquote class="blockquote mb-0">
    <?php if ($language ==='en_usa') { ?> 
          <p id="text-comunicados"><img src="../img/K..png" id="foto_comunicado">&nbsp;&nbsp;&nbsp;Welcome to the Klaus Invest Family.</p>
          <footer class="blockquote-footer" id="by" style="margin-top:-30px;margin-left: 65px;">Klaus Invest Team.</footer>
    <?php } else { ?>   
          <p id="text-comunicados"><img src="../img/profit.png" id="foto_comunicado">&nbsp;&nbsp;&nbsp;Opção de Rentabilidade Atual: <strong><?php echo $status;?></strong></p>
          <footer class="blockquote-footer" id="by" style="margin-top:-30px;margin-left: 65px;">Última Alteração de Rentabilidade: <?php echo $data_br;?></footer>
        
  <?php } ?>
 

    
   
          
        </blockquote>
        <br>
      </div>
    </div>  
  </div>
</div>
    <!--/Comunicados-->
      <!-- Footer -->
  
      <div class="row" style="">
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
</div>


    <!--/Footer--> 
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

  <?php if ($language ==='en_usa') { ?> 

  <script>
  function startCounter(){
  $('.count-numbers').each(function () {  
        var size = $(this).text().split(".")[1] ? $(this).text().split(".")[1].length : 0;
      $(this).prop('Counter',0).animate({
          Counter: $(this).text()
      }, {
          duration: 2800,
          easing: 'swing',
          step: function (now) {
              $(this).text(parseFloat(now).toLocaleString('en-us', {style: 'currency', currency:'USD'}));    
          }
      });
  });
} 

  startCounter();
  </script>
  
  <?php } else { ?>
            <script>
          function startCounter(){
          $('.count-numbers').each(function () {  
                var size = $(this).text().split(".")[1] ? $(this).text().split(".")[1].length : 0;
              $(this).prop('Counter',0).animate({
                  Counter: $(this).text()
              }, {
                  duration: 2800,
                  easing: 'swing',
                  step: function (now) {
                      $(this).text(parseFloat(now).toLocaleString('pt-br', {style: 'currency', currency:'BRL'}));    
                  }
              });
          });
        } 
        
          startCounter();
          </script>
          
  
    <?php } ?>

  <script type="text/javascript">
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  </script>
  
  
  
  
  
        

  

<!--/Cards JS-->
<!--Calendario JS-->
                            <script>
                var str_data = document.getElementById('str_data');
                var data = new Date();
                var dia_sem = data.getDay();
                var dia = data.getDate();
                var mes = data.getMonth();
                var ano = data.getFullYear();

                switch(dia_sem){
              
                  case 0: 
                      dia_sem = dia_sem + 5;
                      break;

                  case 1:
                        dia_sem = dia_sem + 3;
                      break;
                
                  case 2:
                        dia_sem = dia_sem + 1;
                      break;

                    case 3:
                        dia_sem = dia_sem - 1;
                      break;
                        
                    case 4:
                        dia_sem = dia_sem - 3;
                      break;
                
                    case 5:
                      dia_sem = 0;
                      break;

                    case 6:
                      dia_sem = dia_sem;
                      break;      
            } 

            if (dia > 26 && mes==1){

                    dia = 0;
            }

            if (dia >= 27 && mes==2 ){

                  dia = 0;
                  dia_sem = 2;
                  mes = mes +1;
            }

            /*Feriado dia 02 de abril - Paixão de Cristo*/  
                    if (dia == 2 && mes == 3){
                    dia = (dia-1);
                } else{
                  dia = dia;
                } 
                                
                                if (dia> 24 && mes == 8){
                                      dia = 0;
                                      dia_sem = 1;
                                      mes = mes+1;
                                }else{
                                    dia = dia;
                                }
                    
                                if (dia>27 && mes == 7){
                                  melhor_dia = 3 ;
                                  mes = mes +1;
                            }
                            
                            
                                if (dia>=27 && mes == 10){
                                   dia = 0;
                                   dia_sem = 3;
                                  mes = mes +1;
                            }
                



            var melhor_dia =  dia + dia_sem;    

              
               
         

          


            if (mes <=8){
              mes = '0' + (mes+1);
            }
            else{
              mes = mes+1;
            }
              
                  

            if (melhor_dia <=9){
              str_data.innerHTML = '0'+ melhor_dia + '/' + mes + '/' + ano;
            }else{ 
              str_data.innerHTML = melhor_dia + '/' + mes + '/' + ano;
          }
          
          
          
          
          
    </script>
<!--/Calendario JS-->

<!--JS Bootstrap-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>