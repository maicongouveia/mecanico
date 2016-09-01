	function buscaCepEndereco(){

		var endereco = document.getElementById('endereco').value;

		var xhttp = new XMLHttpRequest(); 

	    if(endereco !== ""){
	    	var url = '//viacep.com.br/ws/SP/Sao Paulo/'+endereco+'/json/';
		    xhttp.open("GET", url , true);
		    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		    xhttp.send();
	    }

	    xhttp.onreadystatechange = function() {

	        if (xhttp.readyState == 4 && xhttp.status == 200) {
	            	var json = JSON.parse(xhttp.responseText);
	            	if(json.length > 1){
	            		//Verifica se o bairro é diferente
	            		var novaDiv = document.createElement("div");
	            		var campos = "<div id='modal' class='modal fade col-md-12' tabindex='-1' role='dialog'>"
									+"	  <div class='modal-dialog' role='document'>"
									+"	    <div class='modal-content'>"
									+"	      <div class='modal-header'>"
									+"	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
									+"	        <h4 class='modal-title'>Escolha de CEP</h4>"
									+"	      </div>"
									+"	      <div class='modal-body'>"
									+"	        <p>CEP encontrados: "+json.length+"</p>";
						
						for (var i = 0; i < json.length; i++) {
							campos += "<p><a href='#' onclick='escolherEndereco("+i+",\""+json[i].cep+"\",\""+json[i].bairro+"\",\""+json[i].localidade+"\");'>"+json[i].cep +" - "+json[i].logradouro +" - "+json[i].complemento +" - "+json[i].bairro +"</a></p>";
						}

						campos 	    +="	      </div>"
									+"	      <div class='modal-footer'>"
									+"	        <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>"
									+"	      </div>"
									+"	    </div><!-- /.modal-content -->"
									+"	  </div><!-- /.modal-dialog -->"
									+"</div><!-- /.modal -->";
	            		novaDiv.innerHTML = campos;
	            		document.body.appendChild(novaDiv);
	            		$('#modal').modal('show');
	            	}
	            	else{
	            		document.getElementById('cep').value = (json[0].cep);
	            		document.getElementById('bairro').value = (json[0].bairro);
	            		document.getElementById('cidade').value = (json[0].localidade);
	            		document.getElementById('endereco').value = (json[0].logradouro);
	            	}
	            	
		        }
	    };   
	}

	function buscaCep(){

		var cep = document.getElementById('cep').value;
		
    	document.getElementById('endereco').value = "...";
    	document.getElementById('bairro').value = "...";
    	document.getElementById('cidade').value = "...";

		var xhttp = new XMLHttpRequest(); 

	    if(cep !== ""){
	    	var url = '//viacep.com.br/ws/'+cep+'/json/';
		    xhttp.open("GET", url , true);
		    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		    xhttp.send();
	    }

	    xhttp.onreadystatechange = function() {

	        if (xhttp.readyState == 4 && xhttp.status == 200) {
	            	var json = JSON.parse(xhttp.responseText);
	            	document.getElementById('cep').value = (json.cep);
	            	document.getElementById('endereco').value = (json.logradouro);
	            	document.getElementById('bairro').value = (json.bairro);
	            	document.getElementById('cidade').value = (json.localidade);
	            	document.getElementById('numero').focus();

		        }
	    };   
	}

	function escolherEndereco(i,cep,bairro,localidade){

		$('#modal').modal('hide');
		document.getElementById('cep').value = (cep);
	    document.getElementById('bairro').value = (bairro);
	    document.getElementById('cidade').value = (localidade);
	    document.getElementById('numero').focus();

	    var divParaExcluir = document.getElementById("modal");
		if(divParaExcluir.parentNode){
			divParaExcluir.parentNode.removeChild(divParaExcluir);
		}


	}