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

			<a href="./home_admin.php" id="active"><i class="fas fa-desktop"></i><span>Home</span></a>
			<a href="./dashboard.php"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
			<a href="./extrato.php"><i class="fas fa-receipt" style="padding-left: 3px;"></i><span>Extrato</span></a>
			<a href="./aporte.php"><i class="fas fa-donate"></i><span> Aporte</span></a>
			<a href="./resgate.php"><i class="fas fa-money-bill-alt"></i><span> Resgate</span></a>
			<a href="./recibos.php"><i class="fas fa-book"></i><span> Relatórios</span></a>
			<a href="./configuracoes.php"><i class="fas fa-cogs"></i><span> Configurações</span></a>
		</div>

	<!--/Fim Sidebar-->
	<div class="content" style="background-color: #eee;">
		<div class="container"style="background-color: #eee;">
			<div class="row">
						<div class="col-12 mb-4" style="background-color:#111; margin-top:20px; height:220px; -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
						-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
						box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
						<div class="col-9">
							<div class="info">
								<h5 class="nome"><?php echo $userDetails->name; ?></h5>
								<h5 class="perfil">Administrador</h5>
								<h6 class="cpf">ID: <?php echo $userDetails->uid; ?></h6>
								<h6 class="banco">Email: <?php echo $userDetails->email; ?></h6>
								<h6 class="agencia">- </h6>
								<h6 class="conta">- </h6>
									<img src="../../img/profile.png" class="profile_image2">
									<button type="button" id="btn_1" class="btn btn-success"><i class="fas fa-cogs"></i>&nbsp;Config.</button>
									<button type="button" id="btn_2" class="btn btn-light"><i class="far fa-envelope"></i>&nbsp;Email</button>

						</div>	
					</div>
						<div class="linha-vertical"></div>
								<div class="col-4 text-center" style="margin-top: -140px; margin-left: 40px;">
									
										<div class="montante mb-3">
											<h6><span class="valor"> R$ 0,00</span><br><span class="titulo">Montante</span></h6>
										</div>
										
									
											<div class="saldo mb-3">
											<h6><span class="valor"> R$ 0,00</span><br><span class="titulo">Saldo</span> <span class="valor"></span></h6>
										</div>
											<div class="rent">
											<h6><span class="valor"> 0%</span><br><span class="titulo">Rentabilidade</span> <span class="valor"></span></h6>
										</div>


								</div>
						</div>
						</div>
					<form>
								<!--Grafico Rentabilidade-->
								<div class="row">
									<div class="col-sm-11 col-md-12" style="background-color:#ECF0F5;">
										<div class="card mt-3 mb-3" style=" margin-left:3px; -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
						-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
						box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
											<div class="card-header text-center" style="background-color: #000;">
												<h6 style="font-family: 'Roboto', sans-serif; color:#FFF;margin-top: 5px;">Quantidade de Investidores 2021</h6>
												</div>
												<div class="card-body" style="width: 1050px; background-color:white; ">
												<canvas id="myChart" width="50%" height="21%"></canvas></div>
										
															<script>
														var canvas = document.getElementById('myChart');
														var data = {
																labels: ["Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
																datasets: [
																		{
																				label: "Quantidade de Investidores",
																				backgroundColor: "rgba(221,75,57,1)",
																				borderColor: "rgba(221,75,57,1)",
																				barThickness: 40,
																				borderWidth: 1,
																				hoverBackgroundColor: "rgba(165,33,0,0.9)",
																				hoverBorderColor: "rgba(165,33,0,0.9)",
																				data: [45, 48 ,50 ,55 , 56,60 ,63 ]
																		}]
														};
														var option = {
														animation: {
																		duration:5008
														}

														};


														var myBarChart = new Chart(canvas,{
															type:'bar',
															data:data,
															options:option
														});
													</script>
								<!--/Grafico Rentabilidade-->
							</div>
							</div>
						</div>
					 <br>
					  <div class="form-group">
					    <label for="exampleFormControlSelect2">Investidores:</label>
					    <select multiple class="form-control" id="exampleFormControlSelect2">
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
					  
					</form>
  	
  	
			<!-- Footer -->
	
			<div class="row" style="background-color: #eee; padding-top: 5%;">
				<div class="col-sm-11 col-md-12">
			<hr>
			<footer class="page-footer h6">
				<div class="footer-copyright text-center py-3 text-muted">Desenvolvido por © Tiberius Tecnologia
				</div>
		</footer>
</div>
</div>


		<!--/Footer--> 
	


<!--JS Bootstrap-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>