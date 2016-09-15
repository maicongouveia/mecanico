<?php  

	if(isset($_GET['operacao']) || isset($_POST['operacao'])){
		if(isset($_POST['operacao'])){
			$operacao = $_POST['operacao'];
		}
		else{
			$operacao = $_GET['operacao'];
		}

		//Cadastrar
		if($operacao == "cadastrar"){
			$sql = "INSERT INTO clientes (nome, registro) VALUES "
			."('".$_POST['nome']."','".$_POST['registro']."')";
			//Executa a Query
			if (!($conn->query($sql) === TRUE)){
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$sql = "SELECT * FROM clientes WHERE nome = '".$_POST['nome']."' ORDER by id DESC";
			
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$id_cliente = $row['id'];
				}
			}

			if(!is_null($_POST['telefone'])){
				$sql = "INSERT INTO clientes_telefone (id_cliente,telefoneye4e3emsxxxq";	
			}

			
		}
	}





?>