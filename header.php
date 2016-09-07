<!DOCTYPE html>
<html lang="pt" class="no-js">
	<head>
		<title>Tico Volare</title>
		<!-- Conexao Banco-->
		<?php include('config/conexaoBanco.php'); ?>
		<!-- Importando BootStrap -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Importando JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Importando JS do BootStrap -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- CUSTOM STYLES-->
		<link href="assets/css/custom.css" rel="stylesheet" />
		<!-- Importando JS de Formulários -->
		<script src="assets/js/formularios.js"></script>		
		<!-- Script para Buscar Endereço -->
		<script type="text/javascript" src="assets/js/buscaCepEndereco.js"></script>
		<!-- Mobile First -->
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Caracteres Especiais -->
		    <meta charset="UTF-8">
		<!-- Mascara -->
		<script language="JavaScript">
			function mascara(t, mask){
		 		var i = t.value.length;
				var saida = mask.substring(1,0);
			 	var texto = mask.substring(i)
				if (texto.substring(0,1) != saida){
			 		t.value += texto.substring(0,1);
			 	}
		 	}
		</script>
		<!--Importando Verificação Telefone-->
		<script src="assets/js/mascaraTelefone.js"></script>	
		
		
	</head>
	<body>

	<?php include "assets/interface/menu.php"; ?>

	<div id="page-wrapper" style='min-height:82vh; max-height: auto; overflow:hidden;'>
		<div id="page-inner" style='min-height:82vh;max-height:auto; overflow:hidden;'>