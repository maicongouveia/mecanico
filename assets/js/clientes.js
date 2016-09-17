function cadastrarCliente(nome,registro,telefones,enderecos,emails){

	var xhttp = new XMLHttpRequest(); 

	var url = 'clienteConsulta.php?nome=nome&registro='
    xhttp.open("POST", url , true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
	

}