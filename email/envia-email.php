<?php
require_once('class.phpmailer.php');
require_once('valida-class.php');
 
//configurar essas quatro vari�veis abaixo
$user = 'email_sender@hotmail.com';//Informe o e-mail o completo
$senha = 'senha';//Senha da caixa postal
$smtpHost = 'smtp-mail.outlook.com';//servidor smtp
$receivers = ['receiver1@gmail.com', 'receiver2@yahoo.com.br'];//email de destino
$site_name = 'Teste';



$from = $_POST['nome'];
$emailRemetente = $_POST['email'];
$mensagem = "Nome: ".$from."\n"."E-mail: ".$emailRemetente."\n"."Telefone: ".$_POST['telefone']."\n"."Mensagem: ".$_POST['mensagem'];

//bloco para valida��o dos dados inseridos
$valida = new valida();
$erro = 0;
if(!$valida->isOnTheGap(4, 30, $from)){
	$erro = 1;
}
if(!$valida->isOnTheGap(6, 40, $emailRemetente)){
	$erro = 2;
}
if(!$valida->isOnTheGap(8, 14, $_POST['telefone'])){
	$erro = 3;
}
if(!$valida->isString($from)){
	$erro = 4;
}
if(!$valida->isEmail($emailRemetente)){
	$erro = 5;
}
if(!$valida->isNum($_POST['telefone'])){
	$erro = 6;
}
if($erro == 0){
	
	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPDebug = 1;
	$mailer->Port = 587; //Indica a porta de conex?o para a sa?da de e-mails
	$mailer->SMTPSecure = "tls"; 
	$mailer->Host = $smtpHost;
	$mailer->SMTPAuth = true; //define se haver? ou n?o autentica??o no SMTP
	$mailer->Username = $user; 
	$mailer->Password = $senha; 
	$mailer->FromName = 'Site '.$site_name.' - Contato'; //Nome que ser? exibido para o destinat?rio
	$mailer->From = $user; //Obrigat?rio ser a mesma caixa postal indicada em "username"
	foreach ($receivers as $receiver) {
		$mailer->AddAddress($receiver); //Destinat?rios
	}
	$mailer->Subject = 'Mensagem - Contato site '.$site_name.' - '.date("H:i").'-'.date("d/m/Y");
	$mailer->Body = $mensagem;
	if(!$mailer->Send()){
		echo "Message was not sent";
		echo "Mailer Error: " . $mailer->ErrorInfo; 
		$erro = -1; 
		session_start();
                $enviou = 'falhou';
  	        header('Location:../index.php?status='.$enviou, "-r".$from);
		
		
	}else{
                
		print "E-mail enviado!";
		$erro = 0; 
		session_start();
		$_SESSION['erro'] = $erro;
		
                $enviou = 'enviou';
		$_SESSION['erro'] = $erro;
                          echo  "
					<meta http-equiv=refresh content='0; url=index.php'>
					<script type='text/javascript'>
						$(document).ready( function() {
							$.growlUI('Envio', 'Mensagem Enviada com Sucesso!');
							setTimeout($.unblockUI, 1500);
						});
					</script>
				
					";

                $_SESSION['mensagem_2'] = 'Dado atualizado com sucesso !!!';
		header('Location:../index.php?status='.$enviou, "-r".$from);
	}
}else{
        $enviou = 'falhou';
	session_start();
	$_SESSION['erro'] = $erro;
  	header('Location:../index.php?status='.$enviou, "-r".$from);
}
?>
