function cadastrarCliente(nome,registro,telefones,enderecos,emails){

	var xhttp = new XMLHttpRequest(); 

	var url = 'clientes.php';
	var params = 'operacao=cadastrar&nome='+nome+'&registro='+registro+'&telefone='+telefones+'&endereco='+enderecos+'&email='+emails;
    xhttp.open("POST", url , true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);

    console.log(url);
    console.log(params);

    xhttp.onreadystatechange = function() {//Call a function when the state changes.
    if(xhttp.readyState == 4 && xhttp.status == 200) {
        console.log(xhttp.responseText);
    }
}    


}