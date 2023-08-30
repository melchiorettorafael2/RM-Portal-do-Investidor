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

			<a href="home.php"><i class="fas fa-desktop"></i><span>Home</span></a>
			<a href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
			<a href="extrato.php"><i class="fas fa-receipt" style="padding-left: 3px;"></i><span> Extrato</span></a>
			<a href="aporte.php" id="active"><i class="fas fa-donate"></i><span> Aporte</span></a>
			<a href="resgate.php"><i class="fas fa-money-bill-alt"></i><span> Resgate</span></a>
			<a href="recibos.php"><i class="fas fa-book"></i><span> Recibos</span></a>
			<a href="atendimento.php"><i class="fas fa-headset"></i><span> Atendimento</span></a>
			<a href="configuracoes.html"><i class="fas fa-cogs"></i><span> Configurações</span></a>
		</div>
	<!--/Fim Sidebar-->
	<div class="content" style="background-color: #eee;">
		<div class="container" style="background-color: #eee;">
			  <form>
			    <div class="form-group mt-4">
			      <label for="staticEmail">Nome:</label>
			      <div class="input-group-prepend">
			      <span class="input-group-text"><i class="fas fa-user"></i></span>  
			      <input type="text" readonly class="form-control bg-white text-dark" id="staticEmail" value="Rafael Audibert Melchioretto">
			  </div>
			    <div class="form-group">
			      <label for="staticEmail">Saldo Atual:</label>
			      <div class="input-group-prepend">
			      <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>  
			      <input type="text" readonly class="form-control bg-white text-dark" id="staticEmail" value="R$51.000,00">
			     </div>
			   </div>
			    <div class="form-group">
			      <label for="staticEmail">Data Atual:</label>
			      <div class="input-group-prepend">
			      <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></span>  
			      <input type="text" readonly class="form-control bg-white text-dark" id="staticEmail" value="19/11/2020">
			     </div>
			   </div>
			      <div class="form-group">
			        <label for="staticEmail">Data Base:</label>
			        <div class="input-group-prepend">
			        <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></span>  
			        <input type="text" readonly class="form-control bg-white text-danger" id="staticEmail" value="25/11/2020">
			     </div>
			   </div>
			  </div>
			 			    <div class="card card border-danger">
			      <div class="card-header" style="background-color: #ce1818;">
			        <p class="h5 text-white"><i class="fas fa-exclamation-triangle">&nbsp;&nbsp;</i>Atenção!</p>
			      </div>
			      <div class="card-body">
			          <p class="h6">Essa é a data base disponível para o seu investimento iniciar a contagemdos rendimentos. O valor deverá ser creditado na conta da KLAUS. até 1 dia antes da data base.</p>
			          <p class="h6">As transferências bancárias correspondentes às solicitações de aportes deverão ser feitas através da conta do titular, caso seja feita através de conta conjunta, favor nos enviar um e-mail com o comprovante da transferência</p>
			        </div>
			      </div>
			   <br>
			      <div class="form-group">
			        <label for="staticEmail">Data Máxima para DOC:</label>
			        <div class="input-group-prepend">
			        <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></span>  
			        <input type="text" readonly class="form-control bg-white text-danger" id="staticEmail" value="19/11/2020">
			     </div>
			  </div>
			     <div class="form-group" style="background-color:#eee;">
			        <label for="staticEmail">Data Máxima para TED:</label>
			        <div class="input-group-prepend" style="background-color:#eee;">
			        <span class="input-group-text"><i class="far fa-calendar-alt"></i></i></span>  
			        <input type="text" readonly class="form-control bg-white text-danger" id="staticEmail" value="25/11/2020">
			     </div>
			   </div>
			     <div class="form-group"style="background-color:#eee;">
			      <label for="formGroupExampleInput2">Valor (R$):</label>
			      <input type="text" class="form-control" id="formGroupExampleInput2">
			      </div>
			     <div class="card card border-success">
			      <div class="card-header" style="background-color:#00a65a;">
			        <p class="h5 text-white"><i class="fas fa-1x fa-exclamation-circle">&nbsp;&nbsp;</i>Dados da Conta para aporte</p>
			      </div>
			      <div class="card-body">
			         <p><strong><i>Prezado Cliente,</i></strong></p>
			         <p><strong><i>Os dados do Banco XXX estão disponíveis em nossa Dashboard inicial do Portal do cliente e na página de solicitação de aporte.</i></strong></p>
			         <p><strong><i>Segue dados de nossa conta para a realização do seu aporte:</i></strong></p>
			         <p class="text-danger">Banco: 125- Banco Plural</p>
			         <h6>Agência: 0001</h6>
			         <h6>Conta: 2884-3</h6>
			         <h6>Nome: XXXX</h6>
			         <h6>CPF: XXXXXXX-XX</h6>
			         <br>
			         <p><strong><i>Em caso de dúvida, estamos à disposição.</i></strong></p>
			         <p><strong><i>Atenciosamente,</i></strong></p>
			          <h6>Equipe KLAUS.</h6> 
			   
			      <br>
			       <center><button type="button" class="btn text-white bg-success">Solicitar Aporte</button></center>
			  </form>
			 </div>
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