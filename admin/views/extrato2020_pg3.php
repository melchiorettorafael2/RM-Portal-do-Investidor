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
			<a href="/" class="logout_btn">Logout</a>
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

			<a href="home.html"><i class="fas fa-desktop"></i><span>Home</span></a>
			<a href="dashboard.html"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
			<a href="extrato.html" id="active"><i class="fas fa-receipt" style="padding-left: 3px;"></i><span> Extrato</span></a>
			<a href="aporte.html"><i class="fas fa-donate"></i><span> Aporte</span></a>
			<a href="resgate.html"><i class="fas fa-money-bill-alt"></i><span> Resgate</span></a>
			<a href="recibos.html"><i class="fas fa-book"></i><span> Recibos</span></a>
			<a href="atendimento.html"><i class="fas fa-headset"></i><span> Atendimento</span></a>
			<a href="configuracoes.html"><i class="fas fa-cogs"></i><span> Configurações</span></a>
		</div>

	<!--/Fim Sidebar-->
	<div class="content" style="background-color: #ddd;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 mt-2 mb-2" style="background-color: #ddd;">
				<div class="card text-center">
				  <div class="card-header" style="background-color: #111;">
				    <ul class="nav nav-tabs card-header-tabs">
				        <a class="nav-link text-white" href="extrato.html">2021</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link active" href="extrato2020.html">2020</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link text-white" href="extrato2019.html">2019</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link text-white" href="extrato2018.html">2018</a>
				      </li>
				    </ul>
				    <div class="btn-group float-right" style="margin-top: -36px;">
				      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				        Gerar Extrato
				      </button>
				      <div class="dropdown-menu dropdown-menu-right">
				        <button class="dropdown-item" type="button">Janeiro</button>
				        <button class="dropdown-item" type="button">Fevereiro</button>
				        <button class="dropdown-item" type="button">Março</button>
				        <button class="dropdown-item" type="button">Abril</button>
				        <button class="dropdown-item" type="button">Maio</button>
				        <button class="dropdown-item" type="button">Junho</button>
				        <button class="dropdown-item" type="button">Julho</button>
				        <button class="dropdown-item" type="button">Agosto</button>
				        <button class="dropdown-item" type="button">Setembro</button>
				        <button class="dropdown-item" type="button">Outubro</button>
				        <button class="dropdown-item" type="button">Novembro</button>
				        <button class="dropdown-item" type="button">Dezembro</button>
				      </div>
				    </div>
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">EXTRATO DE RENTABILIDADE 2020</h5><hr>
				    <p class="card-text text-left h6 mt-4 mb-4">Rafael Melchioretto<span class="float-right" style="margin-right: 200px;">Montante  R$  168.936,18</span></p>
				    <p class=" h6 card-text text-left mb-4">123.456.789-10<span class="float-right"style="margin-right: 150px;">Rent. Acumulada  R$  35.063,82</span></p>
				    <!--Janeiro-->
				    <h5 class="card-header mb-3" style="background-color: #111;color:white;">SETEMBRO</h5>
				    <h6 class="card-text text-left">Semana<span class="h6" style="margin-left:150px;">Aporte</span><span class="h6" style="margin-left:150px;">Data</span><span class="h6" style="margin-left:150px;">Extrato</span><span class="h6" style="margin-left:150px;">R$</span><span class="h6" style="margin-left:150px;">Data</span></h6><hr>
				    <!--1ª Semana-->
				    <p class="card-text text-left">1ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    	<!--2ª Semana-->
				    	<p class="card-text text-left">2ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    		<!--3ª Semana-->
				    		<p class="card-text text-left">3ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    			<!--4ª Semana-->
				    			<p class="card-text text-left">4ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    				<!--5ª Semana-->
				    				<p class="card-text text-left">5ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6><hr>
				    <!--/Janeiro-->
				    <!--Fevereiro-->
				    <h5 class="card-header mb-3" style="background-color: #111;color:white;">OUTUBRO</h5>
				    <h6 class="card-text text-left">Semana<span class="h6" style="margin-left:150px;">Aporte</span><span class="h6" style="margin-left:150px;">Data</span><span class="h6" style="margin-left:150px;">Extrato</span><span class="h6" style="margin-left:150px;">R$</span><span class="h6" style="margin-left:150px;">Data</span></h6><hr>
				    <!--1ª Semana-->
				    <p class="card-text text-left">1ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    	<!--2ª Semana-->
				    	<p class="card-text text-left">2ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    		<!--3ª Semana-->
				    		<p class="card-text text-left">3ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    			<!--4ª Semana-->
				    			<p class="card-text text-left">4ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    				<!--5ª Semana-->
				    				<p class="card-text text-left">5ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6><hr>
				    <!--/Fevereiro-->
				    <!--Março-->
				    <h5 class="card-header mb-3" style="background-color: #111;color:white;">NOVEMBRO</h5>
				    <h6 class="card-text text-left">Semana<span class="h6" style="margin-left:150px;">Aporte</span><span class="h6" style="margin-left:150px;">Data</span><span class="h6" style="margin-left:150px;">Extrato</span><span class="h6" style="margin-left:150px;">R$</span><span class="h6" style="margin-left:150px;">Data</span></h6><hr>
				    <!--1ª Semana-->
				    <p class="card-text text-left">1ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    	<!--2ª Semana-->
				    	<p class="card-text text-left">2ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    		<!--3ª Semana-->
				    		<p class="card-text text-left">3ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    			<!--4ª Semana-->
				    			<p class="card-text text-left">4ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    				<!--5ª Semana-->
				    				<p class="card-text text-left">5ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6><hr>
				    <!--/Março-->
				     <!--Fevereiro-->
				    <h5 class="card-header mb-3" style="background-color: #111;color:white;">DEZEMBRO</h5>
				    <h6 class="card-text text-left">Semana<span class="h6" style="margin-left:150px;">Aporte</span><span class="h6" style="margin-left:150px;">Data</span><span class="h6" style="margin-left:150px;">Extrato</span><span class="h6" style="margin-left:150px;">R$</span><span class="h6" style="margin-left:150px;">Data</span></h6><hr>
				    <!--1ª Semana-->
				    <p class="card-text text-left">1ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    	<!--2ª Semana-->
				    	<p class="card-text text-left">2ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    		<!--3ª Semana-->
				    		<p class="card-text text-left">3ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    			<!--4ª Semana-->
				    			<p class="card-text text-left">4ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6>
				    				<!--5ª Semana-->
				    				<p class="card-text text-left">5ª Semana<span style="margin-left:150px;">R$</span><span style="margin-left:180px;">-</span><span style="margin-left:150px;">Saldo Inicial</span><span style="margin-left:100px;">R$ 63.775,00</span><span style="margin-left:90px;">01/01/2020</span></h6><hr>
				    <!--/Fevereiro-->


				    <a href="#" class="btn btn-success">Imprimir</a>  <a href="extrato2020_pg2.html" class="btn btn-success float-left"><i class="fas fa-arrow-left"></i></a>
				    
				  </div>
				</div>


			<!-- Footer -->
	
			<div class="row" style="background-color: #ddd; padding-top: 2%;">
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
							call_to_action: "Duvidas?", // Call to action
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