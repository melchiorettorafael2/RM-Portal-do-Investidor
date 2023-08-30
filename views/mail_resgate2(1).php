<?php
error_reporting(0);
include('../config.php');
include('../class/userClass.php');
require('../PHPMailer/PHPMailer.php');
require('../PHPMailer/Exception.php');
require('../PHPMailer/SMTP.php');

$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);

include('../session.php');
@$local = 'pt-br';
@$currency = 'BRL';
@$fmt = new NumberFormatter($local, NumberFormatter::CURRENCY);    
$userDetails=$userClass->userDetails($session_uid);
$finance=$userClass->finance($_SESSION['uid']);
$data1 = $_POST['data'];
$saldo = $finance->saldo;
        $data_usa = str_replace('/','-', $data1);
        $data_final = date("Y-m-d", strtotime($data_usa));
     $valor_br = $_POST['valor'];
     $valor_usa1 = str_replace('.','', $valor_br);
     $valor_usa2 = str_replace(',','.', $valor_usa1);
@$uid = $userDetails->uid;
@$valor =  $valor_usa2;
@$data = $data_final;
@$solicitacao = $_POST['solicitacao'];
@$assunto = $_POST['assunto'];
@$mensagem = $_POST['mensagem'];
@$email = $userDetails->email;
@$name = $userDetails->name;
@$telefone = $userDetails->telefone;
@$saldo_br = $fmt->formatCurrency($saldo, $currency);

@$status= 'Em Análise';
@$data_pagamento='Aguardando Pagamento';

if($valor_br < $saldo_br){
    $tipo_resgate = "Resgate Parcial";
}else{
    
     $tipo_resgate = "Resgate Total";

}


 $db = getDB();
       $stmt = $db->prepare("INSERT INTO resgate(email, valor, investidor, data, status, tipo_resgate, id_user, data_pagamento)  VALUES (:email,:valor,:investidor,:data,:status, :tipo_resgate, :id_user, :data_pagamento)");
       $stmt->bindParam("email", $email,PDO::PARAM_STR);
       $stmt->bindParam("valor", $valor,PDO::PARAM_STR);
       $stmt->bindParam("investidor", $name,PDO::PARAM_STR);
       $stmt->bindParam("data", $data,PDO::PARAM_STR); 
       $stmt->bindParam("status", $status,PDO::PARAM_STR); 
       $stmt->bindParam("tipo_resgate", $tipo_resgate, PDO::PARAM_STR);
       $stmt->bindParam("id_user", $uid,PDO::PARAM_STR); 
       $stmt->bindParam("data_pagamento", $data_pagamento, PDO::PARAM_STR);
       $stmt->execute(); 

$mail = new PHPMailer\PHPMailer();
  $mail->isSMTP();

  $mail->Port ="465";
  $mail->Host="smtp.klausinvest.com";
  $mail->IsHTML(true);
  $mail->SMTPSecure ="ssl";
  $mail->Mailer="smtp";
  $mail->CharSet="UTF-8";
  $mail->SMTPAuth=true;
  $mail->Username="contato=klausinvest.com";
  $mail->Password="nick70KL@US";
  $mail->SingleTo = true;
  $mail->From = "contato@klausinvest.com";
  $mail->FromName = $name;
  $mail->addAddress('contato@klausinvest.com');
  $mail->Subject=("Solicitação de Resgate.");
  $mail->Body = '<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <title>Atendimento Klaus.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="icon" href="https://www.klausinvest.com/img/email.jpeg">

</head><body>
 <body>
   <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
 <tr>
  <td>
   <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
 <tr>
  <td  align="center" style="padding: 0px 0 10px 0;">
   <img src="https://lh3.googleusercontent.com/PSFsukIgI7WykE31aTfxwkUz5BnMQuvPT1mpDpEXsRcs-uaF0eC8LxiLkbJeRMAsmiSHVqMPBoOpHBGf5Q8EP4_glitnDOEQQwNuuVsRaBYpo1AIc1OBuDoc3-wmFKIpg-wbP20AjQAK5IZerSBkLGMDcSNscfhTTzlJSZtZjlCid36Pz4CgyWoqcBWZwrbx8AL5KdqAPGJjDxBr4_Tovi43W37xs3yVgEmhw7sVWHWKcwfNRiNeViFCXbtYrIisYYDtVRqPdSip20N_FjlvfRCmIeJ-uHl92Se21Kwxoe_Uc0gTOLzisX88BbHUGIKwUSa-_co9AYbNXzcSF447xsHVhnVKpEboeKvmpb2Qt5s1R3zJhctZVMW6htt4vv_p9CH89FHMqhGrUYqwf_r392kkNbm3wGnromfSluF_-igXfeJ0MEjdaI-dxDFp4Hc6Vka-bJlYuFctOG7WHvpmQj3N3ndv2fCTJHpKvTdnc4vCH5fCqic4hugXkRn2yNu1sr7wsKtjqJ6CZV1NSGHMJWJrvW6JCkT7sElbAcieZcPJgC1SCzKr4KxWxwtqe2CK3vUrx4rQ9sCgWHR7aj2m1gYcgdODuhUwPX2iKcspTTK8pau6IgCVpoF08RYfWVFTk4Ym7o7aRG6IQvOLVdacZI12T-bvZF4fW2xz3e3W4ipvXtmtbaXefh8f-kkNEYOovN5d0gmYInBNIxAZ1A83OTlQ=w600-h200-no?authuser=0">
  </td>
 </tr>
 <tr>
  <td bgcolor="#ffffff" style="padding: 20px 30px 40px 30px;">
   <table border="0" cellpadding="0" cellspacing="0" width="100%">
     <tr>
      <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
       <b>Olá, equipe Klaus.</b>
      </td>
     </tr>
     <tr>
      <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
          Eu,&nbsp;'.@$name.' investidor do fundo Klausinvest,<br>gostaria de realizar um '.@$resgate.' no valor de R$ '.@$valor.' para a data:&nbsp;'.@$data.'.
      </td>
     </tr>
     <tr>
      <td>
       
         </td>
        </tr>
       </table>
      </td>
     </tr>
    </table>
  </td>
 </tr>
 <tr>
  <td bgcolor="white" style="color: white; padding: 30px 30px 30px 30px;"> 
   <table border="0" cellpadding="0" cellspacing="0" width="100%">
 <tr>
  <td style="color: black; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align:left;">
    Atenciosamente,<br>
    '.$name.'<br>
    E-mail: '.$email.'<br>
    Telefone: '.$telefone.'
  </td>
  </tr>
 </table>
</td>
  </td>
 </tr>
</table>
  </td>
 </tr>
</table>
  </td>
 </tr>
</table>
   </td>
  </tr>
 </table>

</body>
</html>';

  if($mail->send()){
    header("refresh: 0;resgate.php");
   
  } else{
     header("refresh: 0;resgate.php");

  }

?>