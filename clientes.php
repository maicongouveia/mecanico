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
		//Consultar Cliente
		else if($operacao == "consultar"){

			if(isset($_GET['id']))
				$sql = "SELECT * FROM clientes WHERE id = ".$_GET['id'];
			else
				$sql = "SELECT * FROM clientes ORDER BY id DESC";

			$clientes = array();
			//Pega os dados da tabela
			$result = $conn->query($sql);

			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()) {

					$id_cliente = $row['id'];

					//Pega todos os telefones
					if($_GET['tipo']=="tabela")
						$sql = "SELECT id,telefone FROM clientes_telefone WHERE id_cliente = $id_cliente ORDER BY id LIMIT 1";
					else	
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

					if($_GET['tipo']=="tabela")
						$sql = "SELECT id,endereco FROM clientes_endereco WHERE id_cliente = $id_cliente ORDER BY id DESC LIMIT 1";
					else
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

					if($_GET['tipo']=="tabela")
						$sql = "SELECT id,email FROM clientes_email WHERE id_cliente = $id_cliente ORDER BY id DESC LIMIT 1";
					else
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
		
		}//Fim de Consultar Cliente
		//Excluir Cliente
		else if($operacao == "excluir"){
			if(isset($_POST['tipo'])){
				$tipo = $_POST['tipo'];
				if($tipo=="telefone"){
					$sql = "DELETE FROM clientes_telefone WHERE id = ".$_POST['id'];
					//Executa a Query
					if (!($conn->query($sql) === TRUE)){
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				else if($tipo=="endereco"){
					$sql = "DELETE FROM clientes_endereco WHERE id = ".$_POST['id'];
					//Executa a Query
					if (!($conn->query($sql) === TRUE)){
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				else if($tipo=="email"){
					$sql = "DELETE FROM clientes_email WHERE id = ".$_POST['id'];
					//Executa a Query
					if (!($conn->query($sql) === TRUE)){
					    echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
			}
			else{
				$sql = "DELETE FROM clientes_email WHERE id_cliente = ".$_POST['id'];
				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$sql = "DELETE FROM clientes_telefone WHERE id_cliente = ".$_POST['id'];
				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$sql = "DELETE FROM clientes_endereco WHERE id_cliente = ".$_POST['id'];
				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$sql = "DELETE FROM clientes WHERE id = ".$_POST['id'];
				//Executa a Query
				if (!($conn->query($sql) === TRUE)){
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}//Fim Excluir Cliente
		//Editar Alguma merda
		else if	($operacao == "alterar"){

			if(isset($_POST['tipo'])){
				$tipo = $_POST['tipo'];
				if($tipo=="nomeCliente"){
					$sql = "UPDATE clientes SET nome = '".$_POST['valor']."' WHERE id = '".$_POST['id']."' ";
				}
				else if($tipo=="registro"){
					$sql = "UPDATE clientes SET registro = '".$_POST['valor']."' WHERE id = '".$_POST['id']."' ";
				}
				else if($tipo=="telefone"){
					$sql = "UPDATE clientes_telefone SET telefone = '".$_POST['valor']."' WHERE id = '".$_POST['id']."' ";
				}
				else if($tipo=="endereco"){
					$sql = "UPDATE clientes_endereco SET endereco = '".$_POST['valor']."' WHERE id = '".$_POST['id']."' ";
				}
				else if($tipo=="email"){
					$sql = "UPDATE clientes_email SET email = '".$_POST['valor']."' WHERE id = '".$_POST['id']."' ";
				}
			}

			//Executa a Query
			if (!($conn->query($sql) === TRUE)){
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}//Fim de Editar


	}




?>