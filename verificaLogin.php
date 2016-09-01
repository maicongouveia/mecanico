<?php
/* Define o limite de tempo da sessão em 60 minutos */
session_cache_expire(60);
// Inicia a sessão
session_start();

if ( ! isset( $_SESSION['logado'] ) ) {
    $_SESSION['logado'] = false;
}
// Verifica se vem do Login ou de Sessão
if( isset($_POST) && ! empty($_POST)){
	$dadosUsuario = $_POST;
}else{
	$dadosUsuario = $_SESSION;
}
//Verifica se o Usuário existem no Banco de Dados
if(
	isset($dadosUsuario['email']) &&
	isset($dadosUsuario['senha']) &&
	! empty($dadosUsuario['email']) &&
	! empty($dadosUsuario['senha'])
){
	//Verifica se existe Usuario cadastrado
	$sql = "SELECT * FROM usuarios WHERE email = '".$dadosUsuario['email']."' LIMIT 1";
	$res = $conn->query($sql);
	$resultado = $res->fetch_assoc();
	if($res->num_rows > 0 ){
		if( md5($dadosUsuario['senha']) == $resultado['senha']){
			$_SESSION['logado'] = true;
			$_SESSION['nome'] = $resultado['nome'];
			$_SESSION['email'] = $resultado['email'];
			$_SESSION['userID'] = $resultado['id'];
		}
		else{
			$_SESSION['logado'] = false;
			$_SESSION['loginErro'] = 'Usuário ou senha inválidos';
		}
	}
	else{
		$_SESSION['logado'] = false;
		$_SESSION['loginErro'] = "Usuário não cadastrado";
	}
}
?>