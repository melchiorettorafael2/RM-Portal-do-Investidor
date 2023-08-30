<?php
include('../config.php');
include('../class/userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);



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
	<!--Favicon-->
	<link rel="icon" type="img" href="../img/klaus_favicon.png">
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
			<a href="<?php echo BASE_URL; ?>" class="logout_btn">Logout</a>
		</div>	
	</header>
	<!--/Fim Cabeçalho-->
	<!--Sidebar-->
		<div class="sidebar">
			<center>
				<img src="../img/profile.png" class="profile_image" alt="">
				<h4 style="color: white;"><strong><?php echo $userDetails->name; ?></strong></h4>
			</center>
			<hr class="my-2 bg-white">

			<a href="home.php"><i class="fas fa-desktop"></i><span>Home</span></a>
			<a href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
			<a href="extrato.php"><i class="fas fa-receipt" style="padding-left: 3px;"></i><span> Extrato</span></a>
			<a href="aporte.php"><i class="fas fa-donate"></i><span> Aporte</span></a>
			<a href="resgate.php"><i class="fas fa-money-bill-alt"></i><span> Resgate</span></a>
			<a href="recibos.php" id="active"><i class="fas fa-book"></i><span> Recibos</span></a>
			<a href="atendimento.php"><i class="fas fa-headset"></i><span> Atendimento</span></a>
			<a href="configuracoes.php"><i class="fas fa-cogs"></i><span> Configurações</span></a>
		</div>

	<!--/Fim Sidebar-->
	<div class="content">
		<div class="container">
			<div class="card bg-white" >
				<div class="card-header bg-white">
					<div class="card-body bg-white">
						<div class="card-title text-center">
							<h6>Recibo de Depósito de Valor em Custódia</h6>
							<h6>Data de Operação: </h6>
							<h6>Data Base: </h6>
							<h6>Recibo Nº </h6>
						</div>
						<h6>Ref.Contrato: 000 </h6>
						<h6>Nome Referência: <?php echo $userDetails->name; ?></h6><br>
						<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum tellus cursus pulvinar gravida. Pellentesque scelerisque nibh ac lorem commodo tempus. Quisque eu aliquam est. Donec vitae tortor aliquet, iaculis velit vel, scelerisque augue. Nunc at tortor quis turpis facilisis mollis. Maecenas sagittis quis nisi dapibus dignissim. Pellentesque pellentesque sollicitudin nisi nec rutrum. Morbi vitae posuere enim. Integer diam libero, molestie id tincidunt nec, aliquet non nisl. In quis risus in nisi tempus hendrerit sit amet id purus. Duis id felis ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum tellus cursus pulvinar gravida. Pellentesque scelerisque nibh ac lorem commodo tempus. Quisque eu aliquam est. Donec vitae tortor aliquet, iaculis velit vel, scelerisque augue. Nunc at tortor quis turpis facilisis mollis. Maecenas sagittis quis nisi dapibus dignissim. Pellentesque pellentesque sollicitudin nisi nec rutrum. Morbi vitae posuere enim. Integer diam libero, molestie id tincidunt nec, aliquet non nisl. In quis risus in nisi tempus hendrerit sit amet id purus. Duis id felis ligula.</h6>
						<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum tellus cursus pulvinar gravida. Pellentesque scelerisque nibh ac lorem commodo tempus. Quisque eu aliquam est. Donec vitae tortor aliquet, iaculis velit vel, scelerisque augue. Nunc at tortor quis turpis facilisis mollis. Maecenas sagittis quis nisi dapibus dignissim. Pellentesque pellentesque sollicitudin nisi nec rutrum. Morbi vitae posuere enim. Integer diam libero, molestie id tincidunt nec, aliquet non nisl. In quis risus in nisi tempus hendrerit sit amet id purus. Duis id felis ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum tellus cursus pulvinar gravida. Pellentesque scelerisque nibh ac lorem commodo tempus. Quisque eu aliquam est. Donec vitae tortor aliquet, iaculis velit vel, scelerisque augue. Nunc at tortor quis turpis facilisis mollis. Maecenas sagittis quis nisi dapibus dignissim. Pellentesque pellentesque sollicitudin nisi nec rutrum. Morbi vitae posuere enim. Integer diam libero, molestie id tincidunt nec, aliquet non nisl. In quis risus in nisi tempus hendrerit sit amet id purus. Duis id felis ligula.</h6><br>

						<h6>Traderson Stonks</h6>
						<h6>R.G: 123.456.789-11</h6>
						<h6>CPF: 304.313.818-01</h6><br>
						<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum tellus cursus pulvinar gravida. Pellentesque scelerisque nibh ac lorem commodo tempus. Quisque eu aliquam est. Donec vitae tortor aliquet, iaculis velit vel, scelerisque augue. Nunc at tortor quis turpis facilisis mollis. Maecenas sagittis quis nisi dapibus dignissim. Pellentesque pellentesque sollicitudin nisi nec rutrum. Morbi vitae posuere enim. Integer diam libero, molestie id tincidunt nec, aliquet non nisl. In quis risus in nisi tempus hendrerit sit amet id purus. Duis id felis ligula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vestibulum tellus cursus pulvinar gravida. Pellentesque scelerisque nibh ac lorem commodo tempus. Quisque eu aliquam est. Donec vitae tortor aliquet, iaculis velit vel, scelerisque augue. Nunc at tortor quis turpis facilisis mollis. Maecenas sagittis quis nisi dapibus dignissim. Pellentesque pellentesque sollicitudin nisi nec rutrum. Morbi vitae posuere enim. Integer diam libero, molestie id tincidunt nec, aliquet non nisl. In quis risus in nisi tempus hendrerit sit amet id purus. Duis id felis ligula.</h6><br>
						<h6><?php echo $userDetails->name; ?></h6>
						<h6>CPF: <?php echo $userDetails->cpf; ?></h6>
					</div>	
				</div>			
			</div>
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


<!--JS Bootstrap-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>