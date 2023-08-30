<?php
include('../../config.php');
include('../../class/userClass.php');
use Dompdf\Dompdf;
use Dompdf\Options;
require_once '../dompdf/autoload.inc.php';

$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);

include('../../session.php');
$userDetails=$userClass->userDetails($session_uid);

$nome= $userDetails->name;
$cpf= $userDetails->cpf;
$favicon ='C:\wamp64\www\klaus\views\pdfs/klaus_favicon.png';  

$dompdf = new DOMPDF();


$dompdf->loadHtml('	
<head>
	<title>KLAUS | Portal do Investidor</title>
		<link rel="icon" type="img" href=".C:/wamp64/www/klaus/views/pdfs/klaus_favicon.png.">
</head>
<h2 style="text-align:center;">EXTRATO DE RENTABILIDADE 2021</h2><hr>
				    <p>Nome: '.$nome.' <span class="float-right" style="margin-left: 400px;">Montante: R$  00,00</span></p>

				    <p>CPF: '.$cpf.'<span class="float-right" style="margin-left: 338px;">Rentabilidade Acumulada: R$  00,00</span></p>
				    <!--Janeiro-->
				    <h3  style="background-color: #111; height:25px; padding-top:5px; color:white; text-align:center;">JANEIRO</h3>
				    <span>Semana</span>
				    <span style="margin-left:90px;">Aporte</span>
				    <span style="margin-left:95px;">Data</span>
 							<span style="margin-left:95px;">Extrato</span>
 							<span style="margin-left:95px;">R$</span>
 							<span style="margin-left:95px;">Data</span>

				    <hr>
				    <!--1ª Semana-->
				   <p class="card-text text-left">1ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    	
				    	<!--2ª Semana-->	
				  <p class="card-text text-left">2ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				  	
				    		<!--3ª Semana-->
				    	  <p class="card-text text-left">3ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>

				    			<!--4ª Semana-->
				 						<p class="card-text text-left">4ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    				<!--5ª Semana-->
				    		<p class="card-text text-left">5ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6>

				    <!--/Janeiro-->
				    <!--Fevereiro-->
				   	<h3  style="background-color: #111; height:25px; padding-top:5px; color:white; text-align:center;">FEVEREIRO</h3>
				    <span>Semana</span>
				    <span style="margin-left:90px;">Aporte</span>
				    <span style="margin-left:95px;">Data</span>
 							<span style="margin-left:95px;">Extrato</span>
 							<span style="margin-left:95px;">R$</span>
 							<span style="margin-left:95px;">Data</span>

				    <hr>
				    <!--1ª Semana-->
				   <p class="card-text text-left">1ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    	
				    	<!--2ª Semana-->	
				  <p class="card-text text-left">2ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				  	
				    		<!--3ª Semana-->
				    	  <p class="card-text text-left">3ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>

				    			<!--4ª Semana-->
				 						<p class="card-text text-left">4ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    				<!--5ª Semana-->
				    		<p class="card-text text-left">5ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr><br><br><br><br>

				    		<!--Março-->
				   	<h3  style="background-color: #111; height:25px; padding-top:5px; color:white; text-align:center;">MARÇO</h3>
				    <span>Semana</span>
				    <span style="margin-left:90px;">Aporte</span>
				    <span style="margin-left:95px;">Data</span>
 							<span style="margin-left:95px;">Extrato</span>
 							<span style="margin-left:95px;">R$</span>
 							<span style="margin-left:95px;">Data</span>

				    <hr>
				    <!--1ª Semana-->
				   <p class="card-text text-left">1ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    	
				    	<!--2ª Semana-->	
				  <p class="card-text text-left">2ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				  	
				    		<!--3ª Semana-->
				    	  <p class="card-text text-left">3ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>

				    			<!--4ª Semana-->
				 						<p class="card-text text-left">4ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    				<!--5ª Semana-->
				    		<p class="card-text text-left">5ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6>
				    		 		<!--Março-->
				   	<h3  style="background-color: #111; height:25px; padding-top:5px; color:white; text-align:center;">ABRIL</h3>
				    <span>Semana</span>
				    <span style="margin-left:90px;">Aporte</span>
				    <span style="margin-left:95px;">Data</span>
 							<span style="margin-left:95px;">Extrato</span>
 							<span style="margin-left:95px;">R$</span>
 							<span style="margin-left:95px;">Data</span>

				    <hr>
				    <!--1ª Semana-->
				   <p class="card-text text-left">1ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    	
				    	<!--2ª Semana-->	
				  <p class="card-text text-left">2ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				  	
				    		<!--3ª Semana-->
				    	  <p class="card-text text-left">3ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>

				    			<!--4ª Semana-->
				 						<p class="card-text text-left">4ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    				<!--5ª Semana-->
				    		<p class="card-text text-left">5ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6>
				    		<!--Março-->
				   	<h3  style="background-color: #111; height:25px; padding-top:5px; color:white; text-align:center;">MAIO</h3>
				    <span>Semana</span>
				    <span style="margin-left:90px;">Aporte</span>
				    <span style="margin-left:95px;">Data</span>
 							<span style="margin-left:95px;">Extrato</span>
 							<span style="margin-left:95px;">R$</span>
 							<span style="margin-left:95px;">Data</span>

				    <hr>
				    <!--1ª Semana-->
				   <p class="card-text text-left">1ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    	
				    	<!--2ª Semana-->	
				  <p class="card-text text-left">2ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				  	
				    		<!--3ª Semana-->
				    	  <p class="card-text text-left">3ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>

				    			<!--4ª Semana-->
				 						<p class="card-text text-left">4ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6><hr>
				    				<!--5ª Semana-->
				    		<p class="card-text text-left">5ª Semana<span style="margin-left:90px;">R$</span><span style="margin-left:128px;">-</span><span style="margin-left:95px;">Saldo Inicial</span><span style="margin-left:70px;">00,00</span><span style="margin-left:60px;">00/00/0000</span></h6>


				    ');


$dompdf->render();
$dompdf->stream("extrato_klaus_2021.pdf", array("Attachment"=> false));

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
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<!--Favicon-->
	<link rel="icon" type="img" href="../../klaus_favicon.png">
	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	<!--Jquery-->
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	
	<!-- CDN do Chart.js -->
	<script src="Chart.js"></script>

		<!--Popper JS-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- =======================================================
		Nome do Template: Klaus 
		Versão: 1.0
		Autor: Rafael Melchioretto
	======================================================= -->
</head>
<body>

</body>
</html>