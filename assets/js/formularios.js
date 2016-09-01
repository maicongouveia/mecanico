function adicionarCamposAdicionais(){
	var n = document.getElementById('botao').value;
	n = parseInt(n);
	var divAdicionais = document.getElementById('adicionais');
	var novaDiv = document.createElement("div");

	var campos = "<div class='col-md-5 col-md-offset-1' style='margin-bottom: 50px; border: 3px solid #d9534f;' id='add"+n+"'>"
	 			+"<div class='row' style='margin-top: 10px;' >" 
				+"	<div class='col-md-6'>"
				+"			<font id='' style='font-weight: bold; padding-top: 35px; font-size: 24px;'>"
				+"				Tipo:"
				+"			</font>"
				+"		</div>"
				+"		<div class='col-md-6'>"
				+"			<select class='form-control input-md' required='required' id='tipoAdicional[]' name='tipoAdicional[]'>"
				+"				<option value='d'>Débito</option>"
				+"				<option value='c'>Crédito</option>	"							
				+"			</select>"
				+"		</div>"
				+"	</div>"
				+"	<div class='row' style='margin-top: 10px;' > "
				+"		<div class='col-md-6 '>"
				+"			<font id='' style='font-weight: bold; padding-top: 35px; font-size: 24px;'>"
				+"				Descrição:"
				+"			</font>"
				+"		</div>"
				+"		<div class='col-md-6'>"
				+"			<input id='descricaoAdicional[]' name='descricaoAdicional[]' type='text' class='form-control input-md' required='required'>"
				+"		</div>"
				+"	</div>"
				+"	<div class='row' style='margin-top: 10px;' > "
				+"		<div class='col-md-6 '>"
				+"			<font id='' style='font-weight: bold; padding-top: 35px; font-size: 24px;'>"
				+"				Valor:"
				+"			</font>"
				+"		</div>"
				+"		<div class='col-md-6'>"
				+"			<input id='valorAdicional[]' name='valorAdicional[]' type='text' class='form-control input-md' required='required'>"
				+"		</div>"
				+"	</div>"
				+"	<div class='row' style='margin-top: 10px;' > "
				+"		<div class='col-md-7'>"
				+"			<font id='' style='font-weight: bold; padding-top: 35px; font-size: 24px;'>"
				+"				Parcela Atual:"
				+"			</font>"
				+"		</div>"
				+"		<div class='col-md-5'>"
				+"			<input name='parcelaAtualAdicional[]' id='parcelaAtualAdicional[]' type='text' class='form-control input-md'  onkeypress='mascara(this,\"##/##\");' maxlength='5' required>"
				+"		</div>"
				+"	</div>"
				+"	<div class='row' style='margin-top: 10px;' > "
				+"		<button class='btn btn-danger col-md-10 col-md-offset-1' onclick='removerCampoAdicional(\"add"+n+"\");'><span class='glyphicon glyphicon-remove'></span></button>"
				+"	</div>"
				+"	</div>";


		novaDiv.innerHTML = campos;
		divAdicionais.appendChild(novaDiv);
		document.getElementById('botao').value = n+1;
}

function removerCampoAdicional(nomeDiv){
	var divParaExcluir = document.getElementById(nomeDiv);
	if(divParaExcluir.parentNode){
		divParaExcluir.parentNode.removeChild(divParaExcluir);
	}
}

function verificaUsuario(){

	var registro = document.getElementById("registro").value;

	var xhttp = new XMLHttpRequest(); 

	    if(registro !== ""){
	    	var url = '//iguatemiimoveis.com.br/adm/verificaInquilino.php';
		    xhttp.open("GET", url , true);
		    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		    xhttp.send();
	    }

	    xhttp.onreadystatechange = function() {

	        if (xhttp.readyState == 4 && xhttp.status == 200) {
	            	
	            	document.getElementById("registro").value = "";

	            	alert("Inquilino já cadastrado no sistema");

		        }
	    };   
}

function tipoCliente(registro){
	if(registro == "cnpj"){
		document.getElementById("tituloRegistro").innerHTML = "CNPJ:";
		document.getElementById("registroCliente").value= "";
		document.getElementById("registroCliente").setAttribute("maxlength","18");
		document.getElementById("registroCliente").setAttribute("onkeypress","mascara(this,'##.###.###/####-##')");
	}
	if(registro == "cpf"){
		document.getElementById("tituloRegistro").innerHTML = "CPF:";
		document.getElementById("registroCliente").value="";
		document.getElementById("registroCliente").setAttribute("maxlength","15");
		document.getElementById("registroCliente").setAttribute("onkeypress","mascara(this,'####.###.###-##')");
	}
}