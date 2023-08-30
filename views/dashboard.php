<?php
include('config.php');
include('class/userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);



include('session.php');
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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--Favicon-->
	<link rel="icon" type="img" href="img/klaus_favicon.png">
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
			<h3 style="margin-left: 40px; margin-top: -25px;">KLAUS.</h3>
		</div>
		<div class="right_area">
			<a href="<?php echo BASE_URL; ?>logout.php" class="logout_btn">Logout</a>
		</div>	
	</header>
	<!--/Fim Cabeçalho-->
	<!--Sidebar-->
		<div class="sidebar">
			<center>
				<img src="img/perfil.jpg" class="profile_image" alt="">
				<h4 style="color: white;"><strong>Rafael Melchioretto</strong></h4>
			</center>
			<hr class="my-2 bg-white">

	
			<a href="home.php"><i class="fas fa-desktop"></i><span>Home</span></a>
			<a href="dashboard.php" id="active"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
			<a href="extrato.php"><i class="fas fa-receipt" style="padding-left: 3px;"></i><span> Extrato</span></a>
			<a href="aporte.php"><i class="fas fa-donate"></i><span> Aporte</span></a>
			<a href="resgate.php"><i class="fas fa-money-bill-alt"></i><span> Resgate</span></a>
			<a href="recibos.php"><i class="fas fa-book"></i><span> Recibos</span></a>
			<a href="atendimento.php"><i class="fas fa-headset"></i><span> Atendimento</span></a>
			<a href="configuracoes.php"><i class="fas fa-cogs"></i><span> Configurações</span></a>
		</div>


	<!--/Fim Sidebar-->
	<!--Montante Card-->
	<div class="content" style="background-color: #ECF0F5;">

		<div class="container">
			<div class="row">
				<div class="col-12">
				<div class="card-body1" style="background-color: #4AADA9;">
					<div class="float-left">
						<p>Informação do Montante</p>
						<hr style="margin-top: -10px;">
						<h3>
							<span class="currency">R$</span>
							<span class="count">50000.61</span>
						</h3>	
					</div>
						<div class="float-right">
							<i class="fas fa-donate"></i>
						</div>
					</div>
			
				<!--/Montante Card-->
				<!--Rentabilidade Card-->
				<div class="card-body1" style="background-color: #6eadd4;">
					<div class="float-left">
					<p>Rentabilidade Acumulada</p>
				<hr style="margin-top: -10px;">
				<h3>
					<span class="currency">R$</span>
					<span class="count">1000.89</span>
				</h3>
					
			</div>
			<div class="float-right">
				<i class="fas fa-chart-line"></i>
			</div>
			</div>	
		
				<!--/Rentabilidade Card-->
				<!--Saldo Card-->
					<div class="card-body1" style="background-color:#E07768;">
					<div class="float-left">
					<p>Saldo Total</p>
				<hr style="margin-top: -10px;">
				<h3>
					<span class="currency">R$</span>
					<span class="count">51000.89</span>
				</h3>
					
			</div>
			<div class="float-right">
				<i class="fas fa-money-check-alt"></i>
			</div>
			</div>	


				<!--/Saldo Card-->
				<!--Calendario Card-->
				<div class="card-body1" style="background-color: #f0ca74;">
			<div class="float-left">
				<p>Melhor Data para Aporte</p>
				<hr style="margin-top: -10px;">
				<h3>
					<span id="str_data"></span>
				</h3>
					
			</div>
			<div class="float-right">
				<i class="far fa-calendar-alt"></i>
			</div>
			</div>
		</div>		
</div>
			<!--/Calendario Card-->

			<!--Grafico Rentabilidade-->
			<div class="row">
				<div class="col-sm-11 col-md-12" style="background-color:#ECF0F5;">
					<div class="card mt-3 mb-3" style=" margin-left:3px; -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
	box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
						<div class="card-header text-center" style="background-color: #000;">
							<h6 style="font-family: 'Roboto', sans-serif; color:#FFF;margin-top: 5px;">COMPARATIVO DE RENTABILIDADE 2020</h6>
							</div>
							<div class="card-body" style="width: 1050px;">
							<canvas id="myChart" width="50%" height="21%"></canvas></div>
					
										<script>
									var canvas = document.getElementById('myChart');
									var data = {
											labels: ["Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
											datasets: [
													{
															label: "KLAUS.",
															backgroundColor: "rgba(0,166,90,0.7)",
															borderColor: "rgba(0,166,90,0.7)",
															barThickness: 10,
															borderWidth: 1,
															hoverBackgroundColor: "rgba(15,173,105,0.9)",
															hoverBorderColor: "rgba(15,173,105,0.9)",
															data: [40, 59, 30, 81, 56, 55, 40]
													}, {
														label: "Selic/CDI",
														backgroundColor: "rgba(221,75,57,0.9)",
														borderColor: "rgba(221,75,57,0.9)",
														borderWidth: 1,

														barThickness: 10,
														data: [5, 29, 10, 51, 26, 25, 20]
													}, {
														label: "Poupança",
														backgroundColor: "rgba(243,156,18,0.7)",
														borderColor: "rgba(243,156,18,0.7)",
														borderWidth: 1,
														barThickness: 10,
														data: [1, 9, 5, 20, 12, 15, 10]
													}]
									};
									var option = {
									animation: {
													duration:5008
									}

									};


									var myBarChart = new Chart(canvas,{
										type:'horizontalBar',
										data:data,
										options:option
									});
								</script>
			<!--/Grafico Rentabilidade-->
		</div>
		</div>
	</div>
	
		<!--Info Imposto-->
		<div class="row">
			<div class="col-sm-11 col-md-12" style="background-color: #ECF0F5;">
		<div class="card mt-3 mb-3" style="-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
	box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
			<div class="card-header text-center" style="background-color: #000;">
				<h6 style="font-family: 'Roboto', sans-serif; color:#FFF;margin-top: 5px;">INFORMAÇÕES SOBRE IMPOSTO DE RENDA</h6>
			</div>
			<div class="card-body">
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
				<a href="#" class="btn btn-success float-right">Saiba Mais</a>
			</div>
		</div>
			
				


</div>


			</div>
		<!--/Info Imposto-->
		<!--Comunicados-->
		<div class="row">
			<div class="col-sm-11 col-md-12" style="background-color: #ECF0F5;">
		<div class="card mt-3 mb-3" style="-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
	box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
			<div class="card-header text-center" style="background-color:#000;">
				<h6 style="font-family: 'Roboto', sans-serif; color:#fff; margin-top:5px;">COMUNICADOS</h6>
			</div>
			<div class="card-body mb-3">
				<blockquote class="blockquote mb-0">
					<p>Com R$ 300,00 eu passo na praça París, ali na Lapa, coloco 82 travestis dentro do carro, com as bunda enorme e as pirocas batendo na minha cabeça. Sou o rei com R$ 300,00.</p>
					<footer class="blockquote-footer">Israel Vilchiez </footer>
				</blockquote>
				<br>
				<blockquote class="blockquote mb-0">
					<p>A velocidade média de uma andorinha africana sem carga é de 32 km/h.</p>
					<footer class="blockquote-footer">Everton Vagner</footer>
				</blockquote><br>
				<blockquote class="blockquote mb-0">
					<p>Israel vai pra casa, por favor!</p>
					<footer class="blockquote-footer">Eduardo Oliveira</footer>
				</blockquote>
			</div>
		</div>	
	</div>
</div>
		<!--/Comunicados-->
			<!-- Footer -->
	
			<div class="row" style="background-color: #ECF0F5;">
				<div class="col-sm-11 col-md-12">
			<hr>
			<footer class="page-footer h6">
				<div class="footer-copyright text-center py-3 text-muted">Desenvolvido por © Tiberius Tecnologia 
				</div>
		</footer>
</div>
</div>


		<!--/Footer--> 
		
	<!--Whatsapp Botão-->
	<script type="text/javascript">
			(function () {
					var options = {
							whatsapp: "5511976405348", // WhatsApp number
							call_to_action: "", // Call to action
							position: "right", // Position may be 'right' or 'left'
					};
					var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
					var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
					s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
					var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
			})(); 
	</script>
	<!--/Whatsapp Botão-->

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

						var melhor_dia =  dia + dia_sem;		

								/*Feriado dia 02 de abril - Paixão de Cristo*/	
										if (dia == 2 && mes == 3){
										dia = (dia-1);
								} else{
									dia = dia;
								}	


						if (mes <=9){
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