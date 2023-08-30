<?php
include('../config.php');
include('../class/userClass.php');
require('../PHPMailer/PHPMailer.php');
require('../PHPMailer/Exception.php');
require('../PHPMailer/SMTP.php');

$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);

include('../session.php');
$userDetails=$userClass->userDetails($session_uid);

$email = $_POST['email'];
$solicitacao = $_POST['solicitacao'];
@$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$name = $userDetails->name;
$telefone = $userDetails->telefone;
$msg='';
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
  $mail->From = "$email";
  $mail->FromName = $name;
  $mail->addAddress('contato@klausinvest.com');
  $mail->Subject=("$solicitacao sobre $assunto");
  $mail->Body = '<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <title>Atendimento Klaus.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="icon" href="https://lh3.googleusercontent.com/A7pSuZjfHeXMTAf9RJRfn5J6K3XcZFWToCF-Q8hHHV-fZ4UCjw_y_3aOkCGhum4KV_OIsJZIIhLmyxC2VeZkpR_TWcrFphT21oXE48zcNMY9t9pWhHcMmaCLPqscp98YPlXThrLzvPvoNUZR4iTDn7wg_fwEyj6QnG3HaJHfpPGuLZbbt8qd0eyoSIyEUDAURjGKKCJaZUmBEGHECYDV0QrxcS1Tac10A_yTpuTtzQx6QnMX6Nbc-1LobXnZI4RBTLS8g4jJrDeiZA5ePdGbPK0_xZbVsotvTLYtOz1-rnhGb_spCMD9xDktemK1uOgv5bZ5uaPBEE9XSiCnwa2WdgHmj5G7YKMHBiPKJwLPsjKwEsz-oNODYsKY5tHaug6KtVIr-kyk-ApiDkpN9CJcR2Dccw4pmkiPFNiKRGXuEbmNHMgiiMI2Ao5vtOOxqE5AKjUms5-ooXqCpbSXyikyJRFva8fEu3Sj41eMQJfeP2rSPN5SLISb1_obJwqvPne2PbkjncW5-F4E2bATvz3TFpEGfIjjpQTRUxUaj9L2e6NX4dDR08eEQscgPaVaeW4PgPqYMUliVXVtF_TGu99eJhuwz6pPvHSpn-TO-osUF6awzTRuuZRZi-mu7gbVYnmqqvVwY3alz9dEgKAJZzUnvFUeelD9yELNYkcpJUvev_y0O8iEKRLQt-xOVPqQtOmqedOieKKTMbGqazX7S3y7f4bP=w259-h503-no?authuser=0">

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
          '.$mensagem.'  
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
     $msg="Mensagem Enviada com Sucesso!";
   
  }

  else{
    $msg="Erro ao enviar e-mail: $mail->ErrorInfo";
   }

   

   echo "<script>alert($msg);</script>";
?>
