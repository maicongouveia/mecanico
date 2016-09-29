<?php  

	include "config/conexaoBanco.php";

	if(isset($_GET['operacao']) || isset($_POST['operacao'])){
		if(isset($_POST['operacao'])){
			$operacao = $_POST['operacao'];
		}
		else{
			$operacao = $_GET['operacao'];
		}

		//Cadastrar Cliente
		if($operacao == "cdastrar"){
			//SQL
			$sql = "INSERT INTO clientes (nome, registro) VALUES "
			."('".$_POST['nome']."','".$_POST['registro']."')";

			echo $sql;
			//Executa a Query
			if (!($conn->query($sql) === TRUE)){
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			//Consulta ID do Cliente cadastrado
			//SQL
			$sql = "SELECT * FROM clientes WHERE nome = '".$_POST['nome']."' ORDER by id DESC LIMIT BY 1";
			echo $sql;
			//Executa a Query
			$result = $conn->query($sql);
			//Traz o ultimo registro
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$id_cliente = $row['id'];
				}
			}

			if(!is_null($_POST['telefones']) || $_POST['telefones'] != undefined){
				$sql = "INSERT INTO clientes_telefone (id_cliente,telefone) VALUES ";
				echo $sql;
				$telefones = $_POST['telefones'];
				for ($i=0; $i < count($telefones); $i++) { 
					$sql .= "($id_cliente,'$telefones[$i]')";
					if($i != count($telefones)-1){
						$sql .= " , ";
					}	
				}

				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "\n" . $conn->error;
				}
			}

			if(!is_null($_POST['emails']) || $_POST['emails'] != undefined){
				$sql = "INSERT INTO clientes_email (id_cliente,email) VALUES ";
				echo $sql;
				$emails = $_POST['emails'];
				for ($i=0; $i < count($emails); $i++) { 
					$sql .= " ($id_cliente,'$emails[$i]') ";
					if($i != count($emails)-1){
						$sql .= " , ";
					}	
				}
				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			if(!is_null($_POST['enderecos']) || $_POST['enderecos'] != undefined){
				$sql = "INSERT INTO clientes_endereco (id_cliente,endereco) VALUES ";
				echo $sql;
				$enderecos = $_POST['enderecos'];
				for ($i=0; $i < count($emails); $i++) { 
					$sql .= " ($id_cliente,'$enderecos[$i]')";
					if($i != count($enderecos)-1){
						$sql .= " , ";
					}	
				}
				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			
		}
	
	}





?>