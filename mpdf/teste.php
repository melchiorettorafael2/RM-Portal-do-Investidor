<?php
	
	$ano = date("Y");
	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	$timezone = new DateTimeZone('America/Sao_Paulo');
	date_default_timezone_set('America/Sao_Paulo');
	$data_completa = strftime('%A, %d de %B de %Y', strtotime('today'));
	
	use Mpdf\Mpdf;

	require_once __DIR__ . '/vendor/autoload.php';

	$mpdf = new Mpdf();

	$extrato = "
			<html>
				<body>
					<div class='estilo_logo'>	
						<img src='img/INVEST6.png' class='logo'>
					</div>	

					<div class='titulo'>
						<h2><strong>Extrato de Rentabilidade $ano</strong></h2>
					</div>

						<hr class='linha1'>

					<div class='data_completa'>
						<h4> $data_completa </h4>
					</div>

					<div class='nome'>
						<p>Nome: Rafael Melchioretto</p> 
					</div>

					<div class='cpf'>
						<p>CPF: 414.927.078-30</p> 
					</div>

					<div class='montante'>
						<p>Montante: R$ 0,00</p>
					</div>

					<div class='rentabilidade'>
						<p>Rentabilidade: R$ 0,00</p>
					</div>

					<div>	
						<p class='janeiro'><strong>Janeiro</strong></p>
					</div>

					<div>

					</div>
				

				</body>


			</html>	

			";

	$arquivo = "extrato_2022.pdf";

	$css = file_get_contents('estilo_mpdf.css');
	
	$mpdf->WriteHTML($css, 1);

	$mpdf->WriteHTML($extrato);

	$mpdf->Output($arquivo, 'I');	


?>