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
		if($operacao == "cadastrar"){
			//SQL
			$sql = "INSERT INTO clientes (nome, registro) VALUES "
			."('".$_POST['nome']."','".$_POST['registro']."')";

			//Executa a Query
			if (!($conn->query($sql) === TRUE)){
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}

			//Consulta ID do Cliente cadastrado
			//SQL
			$sql = "SELECT id FROM clientes WHERE nome = '".$_POST['nome']."' ORDER by id DESC LIMIT 1";
			//Executa a Query
			$result = $conn->query($sql);

			$row = $result->fetch_row();
			
			$id_cliente = $row[0];
			

			if($_POST['telefones']!=""){
				$sql = "INSERT INTO clientes_telefone (id_cliente,telefone) VALUES ";
				$telefones = explode(",", $_POST['telefones']);
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

			if($_POST['emails']!=""){
				$sql = "INSERT INTO clientes_email (id_cliente,email) VALUES ";
				$emails = explode(",", $_POST['emails']);
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
			if($_POST['enderecos']!=""){
				$sql = "INSERT INTO clientes_endereco (id_cliente,endereco) VALUES ";
				$enderecos = explode(" * ", $_POST['enderecos']);
				for ($i=0; $i < count($enderecos); $i++) { 
					$sql .= " ($id_cliente,'$enderecos[$i]')";
					if($i != count($enderecos)-1){
						$sql .= " , ";
					}	
				}
				echo $sql;
				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}//Fim de Cadastro de Cliente
		if($operacao == "consultar"){

			$sql = "SELECT * FROM clientes ORDER BY id DESC";
			$clientes = array();
			//Pega os dados da tabela
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()) {

					$id_cliente = $row['id'];

					//Pega todos os telefones
					$sql = "SELECT id,telefone FROM clientes_telefone WHERE id_cliente = $id_cliente ORDER BY id DESC";
					$telefones = array();
					//Pega os dados da tabela
					$result1 = $conn->query($sql);
					//Preenche Array
					if($result1->num_rows > 0){
						while($row1 = $result1->fetch_assoc()) {
							array_push($telefones, $row1);
						}
					}
					else{
						$telefones = NULL;
					}

					$sql = "SELECT id,endereco FROM clientes_endereco WHERE id_cliente = $id_cliente ORDER BY id DESC";
					$enderecos = array();
					//Pega os dados da tabela
					$result2 = $conn->query($sql);
					//Preenche Array
					if($result2->num_rows > 0){
						while($row2 = $result2->fetch_assoc()) {
							array_push($enderecos, $row2);
						}
					}
					else{
						$enderecos = NULL;
					}
					$sql = "SELECT id,email FROM clientes_email WHERE id_cliente = $id_cliente ORDER BY id DESC";
					$emails = array();
					//Pega os dados da tabela
					$result3 = $conn->query($sql);
					//Preenche Array
					if($result3->num_rows > 0){
						while($row3 = $result3->fetch_assoc()) {
							array_push($emails, $row3);
						}
					}
					else{
						$emails = NULL;
					}


					$cliente = array(
							"id"=>$row['id'],
							"nome"=>utf8_encode($row['nome']),
							"registro"=>$row['registro'],
							"telefones"=>$telefones,
							"enderecos"=>$enderecos,
							"emails"=>$emails
						);
					array_push($clientes, $cliente);		
				}

				echo json_encode($clientes);
		}
	
		}
	}




?>