function verificaTipoTelefone(nomeDoInput){
	nomeDoInput = document.getElementById(nomeDoInput);
	//console.log(nomeDoInput.value);
	if(nomeDoInput.value.length >= 12){
		console.log("Celular");
		console.log(nomeDoInput.value);
		var celular = nomeDoInput.value.split(" ");
		nomeDoInput.value = celular[0]+" "+celular[1].substr(0,1)+" "+celular[1].substr(1,4)+celular[2].substr(0,1)+" "+celular[2];
	}else{
		console.log("Telefone");
		mascara(nomeDoInput,"## #### ####");
	}
}

