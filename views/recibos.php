<?php
include('../config.php');
include('../class/userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);
@$language = $_GET['language'];
error_reporting(0);



include('../session.php');
$userDetails=$userClass->userDetails($session_uid);
$name = $userDetails->name;
$link = 'rentabilidade.php';

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
	<!--Favicon-->
  <link rel="icon" type="img" href="../img/klaus_favicon4.png">
	<!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!--Jquery-->
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	
	<!-- CDN do Chart.js -->
	<script src="Chart.js"></script>
  <!-- Sweet Alert -->
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
        background: linear-gradient(0deg, rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url('../img/side8.png');
            background-size:cover; background-attachment: fixed; 
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
          color: #fff;
        margin-right: 1115px; 
        /*margin-top: -36.5px;*/
       
        /*position: fixed;*/
        text-transform: uppercase;
        font-weight: 500;
        font-family: 'Oswald', sans-serif;
       
      }


      .left_area img{
        width:180px;
        margin-left: 220px; 
        margin-top: -6px;

      }

      #check:checked~ .left_area h3{
          color: #fff;
        margin-right: 1115px;
       /* margin-top: -10.5px;*/
        font-size: 29px;
        text-transform: uppercase;
        font-weight: 500;
        font-family: 'Oswald', sans-serif;

      }

	   				#check:checked~.logout_btn{
	   			   	margin-right: 40px;
	   			   	margin-top: -26px;
	   			   }

	   			          .logout_btn{
                     margin-left:545px;
                     margin-top: -60px;
                     position: fixed;
                 } 

             #banner5{
              background: linear-gradient(0deg, rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('../img/c20.jpg'); 
              background-size: cover; 
              height: 350px; 
              margin-top: 0px; 
              width:100%;
              margin-left: 0px; 
             }

             #duvidas{
              font-size: 18px;
              font-weight: 700;
             }

             #select{
              height:150px;
             }

             #recibos{
              height:700px;
             }
             #submit{
               margin-top: 50px;
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

      #banner5{
       background: linear-gradient(0deg, rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('../img/c20.jpg');  
       background-size: cover; 
       height: 350px; 
       margin-top: 0px; 
        width:100%; 
        margin-left: 0px; 
        border-radius: 0px;
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
        background: linear-gradient(0deg, rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url('../img/side8.png'); background-size:cover; background-attachment: scroll; 
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

      #duvidas{
       font-size: 24px;
       font-weight: 500;
      }

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
        margin-left: -10px;
        margin-right: 1115px; 
        margin-top: -10.5px;
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

      
      .left_area img{
        width:180px;
        margin-left: 0px; 
        margin-top: 0px;

      }

      .logout_btn{
            margin-left:1231px;
            position: fixed;
            text-align: center;
           } 

      .logout_btn{
        padding: 5px;
        background-color: #0FCC7D;
        border-style: none;
        color: white;
        text-decoration: none;
        float: right;
        margin-top: -60px;
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
        background: linear-gradient(0deg, rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url('../img/side8.png'); background-size:cover; background-attachment: scroll; 
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

      #select{
        height:350px;
      }

      #recibos{
        height:900px;
      }

      #submit{
        margin-top: 50px;
      }


      #duvidas{
       font-size: 28px;
       font-weight: 500;
      }



	   }
	   
	 /* Height for devices larger than 1400px */
	   @media (min-width: 1400px) {
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
        background: linear-gradient(0deg, rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url('../img/side8.png'); background-size:cover; background-attachment: scroll; 
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
      
      #recibos{
          margin-top:20px;
          height:860px;
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
       margin-top: -55px;

      } 
      
      .logout_btn:hover{
       margin-left:1765px;
       position: fixed;
       width:5%;
       padding-left:19px;
      } 


      .left_area h3{
        color: #fff;
        margin-left: -10px;
        margin-right: 1668px; 
        margin-top: -14px;
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
          margin-left:-45px;
      }
      

	   }

       /* Height for devices larger than 1500px */
    @media (min-width: 1500px) {

      

      #check:checked ~.content #banner{
        width: 100%;
      }

      .container{
        width: 100%;
        margin-left: 240px;
        padding-left:80px;
        padding-right:40px;
      }


      .sidebar{
        background: linear-gradient(0deg, rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url('../img/side8.png'); background-size:cover; background-attachment: scroll; 
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
        line-height: 280%;
        text-decoration: none;
        box-sizing: border-box;
        transition: 0.5s;
        transition-property: background;
        margin-left:-20px;
        padding-left:30px;
        font-size:18px;
      }


      #check:checked~.sidebar a{
        line-height: 180%;

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

      #btn_ano{
          margin-left:-820px;
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
        padding-left: -1500px;
        padding-right: 200px;
        background-image: linear-gradient(to bottom, #49494a, #3c3c3d, #303031, #242425, #18191a);

      }

      #rodape hr {
        margin-left: 40px;
        width:91.5% ;
      }



      #recibos{
        width: 90%;
      }

      #check:checked~.content #recibos
      {
        width: 90%;
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

     
        .content{
        background-color:#ECF0F5;
        margin-left: 100px;
        margin-top: 70px;
        height: 100vh;
        width: 100%;
        transition: 0.5s; 
      }

       #check:checked~.content{
        background-color:#ECF0F5;
        margin-left: -70px;
        margin-top: 70px;
        height: 100vh;
        width: 120%;
        transition: 0.5s; 
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
        margin-left: -10px;
        margin-right: 1668px; 
        margin-top: -14px;
        font-size: 29px;
        text-transform: uppercase;
        font-weight: 500;
        font-family: 'Oswald', sans-serif;
        width:180px;
         cursor: pointer;
      }

      .left_area span{
        color: #0FCC7D;
        margin: 0;
        text-transform: uppercase;
        font-size: 30px;
        font-weight: 900;
        font-family: 'Oswald', sans-serif;
      }

       .left_area img{
          margin-top: 4px;
       } 
      
       .logout_btn{
       margin-left:1470px;
       position: fixed;
       width:5%;
       padding-left:9.6px;
       margin-top: -60px;
      } 

     .logout_btn:hover{
       margin-left:1470px;
       position: fixed;
       width:5%;
       padding-left:9.6px;
      } 
      
      #comunicados{
          height:280px;
      }
      
   
    }


        /* Height for devices larger than 1700px */
     @media (min-width: 1700px) {

      #banner5{
              background: linear-gradient(0deg, rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('../img/c20.jpg'); 
              background-size: cover; 
              height: 340px; 
              margin-top: 0px; 
              width:100%;
              margin-left: 0px; 
             }


      .container{
        width: 100%;
        margin-left: 360px;
        padding-left:15px;
        padding-right:15px;
      }

      .sidebar{
        background: linear-gradient(0deg, rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url('../img/side8.png'); background-size:cover; background-attachment: scroll; 
        margin-top: 70px; 
        position: fixed;
        margin-left: 0;
        left:0;
        width: 248px;
        height: 100%;
        transition: 0.5s;
        transition-property: left;
        overflow-y: inherit;
        border: 1px solid;
        border-color: black;
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
        line-height: 280%;
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
        padding-left: -1500px;
        padding-right: 200px;
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
        line-height: 180%;
        text-align: center;
      }

        .content{
        background-color:#ECF0F5;
        margin-left: 100px;
        margin-top: 70px;
        height: 100vh;
        width: 100%;
        transition: 0.5s; 
      }

       #check:checked~.content{
        background-color:#ECF0F5;
        margin-left: -70px;
        margin-top: 70px;
        height: 100vh;
        width: 120%;
        transition: 0.5s; 
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
        margin-left: -10px;
        margin-right: 1668px; 
        margin-top: -14px;
        font-size: 29px;
        text-transform: uppercase;
        font-weight: 500;
        font-family: 'Oswald', sans-serif;
        width:180px;
         cursor: pointer;
      }

      .left_area span{
        color: #0FCC7D;
        margin: 0;
        text-transform: uppercase;
        font-size: 30px;
        font-weight: 900;
        font-family: 'Oswald', sans-serif;
      }

       .left_area img{
          margin-top: 4px;
       } 
      
       .logout_btn{
       margin-left:1770px;
       position: fixed;
       width:5%;
       padding-left:9.6px;
       margin-top: -60px;
      } 

     .logout_btn:hover{
       margin-left:1770px;
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
	
		
	<input type="checkbox" id="check" style="display:none;">
	<!--Cabeçalho-->
  <header>
    
    <div class="left_area">
      <label for="check">
      <h3><img src="../img/INVEST6.png" style="width:180px; cursor: pointer;"></h3> 
    </label>
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
       
      <a href="home.php"  title="Home"><i class="fas fa-desktop"></i><span>Home</span></a>
      <a href="dashboard3.php" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
      <a href="extrato.php" title="Extratos">&nbsp;<i class="fas fa-receipt" ></i><span> Extrato</span></a>
      <a href="aporte.php"  title="Aporte">&nbsp;<i class="fas fa-donate"></i><span> Aporte</span></a>
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
                               
                
                      
                               if($tipo=='Reinvestir' || $tipo==''){
                                $status ='Reinvestindo';
                                $link = 'reinvestir.php';
                                
                            }
                            
                            else if($tipo=='Rentabilidade'){
                                $status = 'Rentabilidade Mensal';
                                 $link = 'resgate_rentabilidade_mensal.php';
                                
                            }else if($tipo==""){
                                $link = 'rentabilidade.php';
                            }
       
             ?>
             <?php } ?>
            <a href="<?php echo $link;?>" title="Rentabilidade">&nbsp;<i class="fas fa-funnel-dollar"></i><span>Rentabilidade</span></a>
      <a href="recibos.php" id="active" title="Recibos de Aporte">&nbsp;<i class="fas fa-book"></i><span> Recibos de Aporte</span></a>
      <a href="atendimento.php" title="Atendimento">&nbsp;<i class="fas fa-headset"></i><span> Atendimento</span></a>
      <a href="configuracoes.php" title="Configurações">&nbsp;<i class="fas fa-cogs"></i><span> Configurações</span></a>
      
      <?php } ?>
			</div>


	<!--/Fim Sidebar-->
	<div class="content" style="background-image: linear-gradient(to bottom, #49494a, #3c3c3d, #303031, #242425, #18191a);">
		<div class="container">
			<div class="card" id="recibos">
        <div class="card-header">
            <?php if ($language ==='en_usa') { ?> 
                <h3><i class="fas fa-book"></i>&nbsp;&nbsp;Contribution Receipts</h3>
            <?php } else { ?>
                 <h3><i class="fas fa-book"></i>&nbsp;&nbsp;Recibos de Aporte</h3>
            <?php } ?>
                
        </div>
        <!-- Background image -->
        <div class=" mb-4 text-center" id="banner5">            
              <div class="d-flex justify-content-center align-items-center h-100" >
                <div class="text-white">
                    <?php if ($language ==='en_usa') { ?> 
                        <span id="duvidas">Transfer vouchers</span>
                    <?php } else { ?>
                        <span id="duvidas">Comprovantes de Transferências</span>
                    <?php } ?>  
                </div>
              </div>
            </div>
              <script>
                function imprimir_recibo(){
                 var select = document.querySelector('select');
                 var nome = "<?php echo $userDetails->username; ?>";
                 var option = select.children[select.selectedIndex];
                 var texto = option.value;
                  if(texto!=""){
                    window.open(href="../recibos/"+nome+"/"+texto);    
                  }else{
                    alert("Erro ao Selecionar Recibo!","Selecione um dos Recibos da lista!","error");
                  }
               }
              </script>
                <?php
                  $caminho = "<script>document.write(texto)</script>";

                ?>
          <!-- Background image -->
        <div class="card-body text-center">
            <?php if ($language ==='en_usa') { ?>
                <h5 class="card-title">Select a Receipt</h5>
            <?php } else { ?>
                <h5 class="card-title">Selecione um Recibo</h5>
            <?php } ?>
          <div class="form-group">
            <form action="" target="blank" method="get">
              <select multiple class="form-control" id="select" required>
             
                <?php 
                 $conexao= mysqli_connect("mysql.klausinvest.com","klausinvest","nick70KL@US","klausinvest");
                 $conexao->set_charset('utf8');
                 /* $conexao = mysqli_connect("localhost","root","","klaus");*/
                  $uid = $userDetails->uid;
                  $consulta =  "SELECT * FROM recibos WHERE id_investidor='$uid'AND tipo='Aporte' order by id";
                  $con = $conexao->query($consulta);
                  
                  while($dado = $con->fetch_array()){
                    $caminho =  $dado['caminho'];
                    $caminho_redu = substr($caminho,4);
                    $caminho_format = str_replace('.pdf','',$caminho_redu);
                    $caminho_final = str_replace('_','/', $caminho_format);
                    
                  ?>
               
                  
                <option value="<?php echo $caminho;?>">Recibo de Aporte: <?php echo $caminho_final;?></option>
                
               
               
               <?php }?>
              
              </select>
             
            </div>
          <button class="btn btn-info" type="button" onclick="imprimir_recibo();" id="submit">Download</button>
        </form>
        </div>
      </div>
			<!-- Footer -->
	
			<div class="row" style="padding-top: 5%;">
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