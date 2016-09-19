<?php  

	include "config/conexaoBanco.php";

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
			
			echo $sql.'\n';

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$id_cliente = $row['id'];
				}
			}

			if(!is_null($_POST['telefone']) || $_POST['telefone'] != undefined){
				$sql = "INSERT INTO clientes_telefone (id_cliente,telefone) VALUES ";
				$telefones = $_POST['telefone'];
				for ($i=0; $i < count($telefones); $i++) { 
					$sql .= "($id_cliente,'$telefones[$i]')";
					if($i != count($telefones)-1){
						$sql .= " , ";
					}	
				}
			
				echo $sql.'\n';

				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "\n" . $conn->error;
				}
			}
			if(!is_null($_POST['email']) || $_POST['email'] != undefined){
				$sql = "INSERT INTO clientes_email (id_cliente,email) VALUES ";
				$emails = $_POST['email'];
				for ($i=0; $i < count($emails); $i++) { 
					$sql .= " ($id_cliente,'$emails[$i]') ";
					if($i != count($emails)-1){
						$sql .= " , ";
					}	
				}
				echo $sql.'\n';
				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			if(!is_null($_POST['endereco']) || $_POST['endereco'] != undefined){
				$sql = "INSERT INTO clientes_endereco (id_cliente,endereco) VALUES ";
				$enderecos = $_POST['endereco'];
				for ($i=0; $i < count($emails); $i++) { 
					$sql .= " ($id_cliente,'$enderecos[$i]')";
					if($i != count($enderecos)-1){
						$sql .= " , ";
					}	
				}
				echo $sql.'\n';
				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}

			$url = "clienteConsulta.php";
			//header("location:$url");
			
		}
	}





?>