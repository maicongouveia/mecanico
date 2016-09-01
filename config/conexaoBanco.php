<?php
// 1 - Local
// 2 - maicongouveia.com.br
$conexao = 1;
if($conexao == 1){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticovolari";
$urlAPI = "http://localhost";
}
else if($conexao == 2){
$servername = "maicongouveia.com.br";
$username = "maicongo_victor";
$password = "comuniquevictor";
$dbname = "maicongo_comuniqueVictor";
$urlAPI = "http://maicongouveia.com.br";
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>