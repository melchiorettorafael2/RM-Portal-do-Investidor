<?php
include('../config.php');
include('../userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);
$userList=$userClass->userList($_SESSION['uid']);


include('../session.php');
$userDetails=$userClass->userDetails($session_uid);
$userList=$userClass->userList($session_uid);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<!--Tag Responsiva-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="author" content="Rafael Melchioretto">
	<title>KLAUS | ADMIN</title>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<!--Favicon-->
	<link rel="icon" type="img" href="../../img/klaus_favicon.png">
	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	<!--Jquery-->
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	
	<!-- CDN do Chart.js -->
	<script src="Chart.js"></script>

	<!-- =======================================================
		Nome do Template: Klaus 
		Versão: 1.0
		Autor: Rafael Melchioretto
	======================================================= -->
</head>
<body style="background-color: #eee;">
	
		
	<input type="checkbox" id="check" style="display:none;">
	<!--Cabeçalho-->
	<header>
		<label for="check">
			<i class="fas fa-bars" id="sidebar_btn"></i>
		</label>
		<div class="left_area">
			<h3 style="margin-left: 40px; margin-top: -25px;">Admin</h3>
		</div>
		<div class="right_area">
			<a href="../index.php" class="logout_btn">Logout <i class="fas fa-sign-out-alt"></i></a>
		</div>	
	</header>
	<!--/Fim Cabeçalho-->
	<!--Sidebar-->
		<div class="sidebar" style="background:linear-gradient(0deg,rgba(0,0,0,0.8),rgba(0,0,0,0.8)), url('../../img/c22.jpg'); background-size: cover;">
			<center>
				<img src="../../img/profile.png" class="profile_image" alt="">
				<h4 style="color: white;" id="logo_nome"><strong><?php echo $userDetails->name; ?></strong></h4>
			</center>
			<hr class="my-2 bg-white">

			<a href="./home_admin.php" ><i class="fas fa-desktop"></i><span>Home</span></a>
			<a href="./dashboard.php" id="active"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
			<a href="./extrato.php"><i class="fas fa-receipt" style="padding-left: 3px;"></i><span>Extrato</span></a>
			<a href="./aporte.php"><i class="fas fa-donate"></i><span> Aporte</span></a>
			<a href="./resgate.php"><i class="fas fa-money-bill-alt"></i><span> Resgate</span></a>
			<a href="./recibos.php"><i class="fas fa-book"></i><span> Relatórios</span></a>
			<a href="./configuracoes.php"><i class="fas fa-cogs"></i><span> Configurações</span></a>
		</div>

	<!--/Fim Sidebar-->
	<div class="content" style="background-color: #eee;">
		<div class="container" style="background-color: #eee;">
		<!-- Aporte -->  
		<div class="form group container-fluid mt-4">
		  <form>
		    <div class="form-group">
		      <label for="staticEmail">Investidor:</label>
		      <div class="input-group-prepend">
		      <div class="form-group">
					    <select multiple class="form-control" id="exampleFormControlSelect2"  style="width: 1080px; height:150px;">
					    <?php 
					    		$servidor = "localhost";
					    		$usuario = "root";
					    		$senha = "";
					    		$dbname = "klaus";

					    		$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
					    		$result_users ="SELECT * FROM users";
					    		$result_users = mysqli_query($conn, $result_users); 
											while($row_user = mysqli_fetch_assoc($result_users)){

												 ?><option><?php echo $row_user['name']; ?></option><?php

											}
									?>
					    </select>
					  </div>
					 </div>
					 <input class="btn btn-primary" type="submit" value="Carregar"/>
		</div>
		    <div class="form-group">
		      <label for="staticEmail">Montante:</label>
		      <div class="input-group-prepend">
		      <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>  
		      <input type="text" readonly class="form-control bg-white text-dark" id="staticEmail" value="R$97.000,00">
		     </div>
		   </div>
		      <div class="form-group">
		      <label for="staticEmail">Rentabilidade Acumulada:</label>
		      <div class="input-group-prepend">
		      <span class="input-group-text"><i class="fas fa-chart-line"></i></span>  
		      <input type="text" readonly class="form-control bg-white text-dark" id="staticEmail" value="R$97.000,00">
		     </div>
		   </div>
		      <div class="form-group">
		      <label for="staticEmail">Saldo Total:</label>
		      <div class="input-group-prepend">
		      <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>  
		      <input type="text" readonly class="form-control bg-white text-dark" id="staticEmail" value="R$97.000,00">
		     </div>
		   </div>
		    <div class="form-group">
		      <label for="staticEmail">Data Atual:</label>
		      <div class="input-group-prepend">
		      <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></span>  
		      <input type="text" readonly class="form-control bg-white text-dark" id="staticEmail" value="<?php echo date("d/m/Y");?>">
		     </div>
		   </div>
		   <?php 
		       	  	$data= new Datetime();
		       	  	$data= new Datetime('+1 day');
		       	  ?>
		      <div class="form-group">
		        <label for="staticEmail">Data Mínima Permitida:</label>
		        <div class="input-group-prepend">
		        <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></span>  
		        <input type="text" readonly class="form-control bg-white text-danger" id="staticEmail" value="<?php echo $data->format('d/m/Y');?>">
		     </div>
		   </div>
		       <div class="form-group">
		         <label for="staticEmail">Para o Dia:</label>
		         <div class="input-group-prepend">
		         <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></span> 
		       	  <?php 
		       	  	$data= new Datetime();
		       	  	$data= new Datetime('+5 day');
		       	  ?>
		         <input type="date" min="<?php echo $data->format('Y-m-d'); ?>" class="form-control bg-white text-danger" id="staticEmail" value="">
		      </div>
		   </div>
		      <div class="form-group">
		       <label for="formGroupExampleInput2">Valor (R$):</label>
		       <input type="text" class="form-control" id="formGroupExampleInput2" onkeypress="$(this).mask('#.##0,00', {reverse: true});">
		       <p class="h6" style="color:#ce1818">*Limite de saque diário de 100.000,00</p>
		       </div>
		       <div class="form-group">
		         <label for="exampleFormControlSelect1">Tipo do Resgate</label>
		         <select class="form-control" id="exampleFormControlSelect1">
		           <option>Resgate Total</option>
		           <option>Resgate Parcial</option>
		           <option>Resgate de Rentabilidade Mensal</option>
		         </select>
		       </div>
		       <div class="form-group">
		         <div class="form-group">
		       <label for="formGroupExampleInput2">Banco:</label>
		       <input type="text" readonly class="form-control" id="formGroupExampleInput2" value="<?php echo $userDetails->banco; ?>" style="background-color: white;">
		       </div>
		       <br>
		    <div class="card card border-danger">
		      <div class="card-header" style="background-color: #ce1818;">
		        <p class="h5 text-white"><i class="fas fa-exclamation-triangle">&nbsp;&nbsp;</i>Atenção!</p>
		      </div>
		      <div class="card-body">
		          <p class="h6">Para esta solicitação de resgate não será possível realizar a alteração dos dados bancários sem o aviso prévio de 5 dias de antecedência da data agendada.</p>
		          <p class="h6">Se a alteração for informada com o prazo inferior a 5 dias, você deverá optar pelo resgate na conta já cadastrada, ou cancelar a solicitação, efetuando a abertura de uma nova solicitação com os dados atualizados.</p>
		          <p class="h6">Caso haja a necessidade de alteração dos dados da conta bancária, será necessário a abertura de um chamado no portal do cliente.</p>
		        </div>
		      </div>
		      <br>
		      <br>
		          <div class="form-group">
		              <label for="exampleFormControlTextarea1">Observação</label>
		              <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
		            </div>
		      <br>
		  
		       <center><button type="button" class="btn text-white bg-success">Solicitar Resgate</button></center>
		  </form>
		
		<br>
			</div>
		
			<!-- Footer -->
	
			<div class="row" style="background-color: #eee; padding-top: 2%;">
				<div class="col-sm-11 col-md-12">
			<hr>
			<footer class="page-footer h6">
				<div class="footer-copyright text-center py-3 text-muted">Desenvolvido por © Tiberius Tecnologia 
				</div>
		</footer>
</div>
</div>
	


<!--JS Bootstrap-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>