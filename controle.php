<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>controle</title></head>
<body>
<?php
//----Includes
include("conectar.php"); require_once('class.phpmailer.php');
//----Funcoes
function email($site,$email,$nome,$conteudo,$destino){
	$login='agencia@grupocriarte.com';//ContadoGMAIL
	$senha='visual07';//SenhadoGMAIL
	$titulo="Formulario de contato do site: ".$site;
	$AVISO="Para visualizar a mensagem, por favor use um visualizador de e-mail HTML!";
error_reporting(E_STRICT); date_default_timezone_set('America/Toronto'); $mail=newPHPMailer(); $mail->IsSMTP(); $mail->Host="stmp.gmail.com"; $mail->SMTPDebug=1; $mail->SMTPAuth=true; $mail->SMTPSecure="ssl"; $mail->Host="smtp.gmail.com"; $mail->Port=465; $mail->Username=$login; $mail->Password=$senha; $mail->SetFrom($email,$nome); $mail->AddReplyTo($email,$nome); $mail->Subject=$titulo; $mail->AltBody=$AVISO; $mail->MsgHTML($conteudo); $mail->AddAddress($destino,$destino); if(!$mail->Send()){echo("<script type='text/javascript'>window.alert('Erro: " .$mail->ErrorInfo. "');</script>");}else{echo("<script type='text/javascript'>window.alert('Mensagem enviada com sucesso!');</script>");}
};
//--------------------------------------------------------------------------------------------------------------
switch ($_GET["tipo"]) {
		case 'frete':
			$onde='frete';
			$a = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'tipo', 'lido');
			$b= array($_POST["tipo"], $_POST["carro"], $_POST["nome"], $_POST["fone"], $_POST["email"], $_POST["saida"], $_POST["retorno"], $_POST["msg"],'Frete','n');
			$retorno='aluguel.php';
			inserir($onde,$a,$b,$retorno);
			break;
		case 'Viagem de Compras':
			$onde='compra';
			$a=array('r', 'n', 'f', 'e', 'o', 'lido', 'Tipo');
			$b=array($_GET["reserva"], $_GET["nome"], $_GET["fone"], $_GET["email"], $_GET["obs"], $_GET["tipo"]);
			$retorno='passagem.php';
			inserir($onde,$a,$b,$retorno);
			break;
		case 'Orçamento':
			$onde='orcamento';
			$a=array('r', 'n', 'rg', 'f', 'e', 'o', 'lido', 'Tipo');
			$b=array($_GET["reserva"], $_GET["nome"], $_GET["RG"], $_GET["fone"], $_GET["email"], $_GET["obs"], 'n', $_GET["tipo"]);
			$retorno='inicio.php';
			inserir($onde,$a,$b,$retorno);
			break;
		case'Fale Conosco':
			$onde='contato';
			$a=array('m', 'n', 'f', 'e', 'o', 'tipo', 'lido');
			$b=array($_GET["motivo"], $_GET["nome"], $_GET["fone"], $_GET["email"], $_GET["obs"], $_GET["tipo"], 'n');
			$retorno='fale.php';
			inserir($onde,$a,$b,$retorno);
			break;
		case'Cadastro':
			$onde='clientes';
			$a=array('i','n','rg','f','e','o','ido');
			$b=array($_GET["i"],$_GET["nome"],$_GET["rg"],$_GET["fone"],$_GET["email"],$_GET["obs"],'n');
			$retorno='entrar.php';
			inserir($onde,$a,$b,$retorno);
			break;
		case'novo':
			$onde='login';
			$a=array('n','s');
			$b=array($_POST["nome"],$_POST["senha"],$_GET["rg"],$_GET["fone"],$_GET["email"],$_GET["obs"],'n');
			$retorno='painel.php';
			inserir($onde,$a,$b,$retorno);
			break;
			}
?></body></html>