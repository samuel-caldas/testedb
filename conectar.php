<?php
	ini_set('upload_tmp_dir', '/temp/');

	// Configurações do DB
	$hostname      = 'localhost';
	$usuario       = 'ednantur';
	$senha         = 'ed123';
	$db            = 'ednantur';

	// Função retorna erro
	function myErro($msgerro){
	    echo "<center></BR><h1>".$msgerro."<h1></BR></center>
			<script type='text/javascript'>
			history.back(1);
			</script>
			<noscript>
			<h1><strong>Você não é bom o suficiente :p</strong></h1>
			</noscript>
			";
	}

	// conecta && seleciona
	$conexao = mysql_connect($hostname , $usuario , $senha) or die(myErro("<h1><strong>Falha na Conexão com o Banco de Dados</strong></h1>"));
	mysql_select_db($db , $conexao) or die(myErro("<h1><strong>Falha ao selecionar a DB - $db</strong></h1>"));
	// insere
	function inserir($onde,$a,$b,$retorno){
	$resultado= mysql_query("INSERT INTO ".$onde." (".$a.") VALUES (".$a.")") or die ("falha na inserção dos dados!");
	if ($resultado){
		echo	"<h1>Dados inseridos com sucesso!</h1><meta http-equiv='refresh' content='0;URL=".$retorno."' />";
	}
};
?>