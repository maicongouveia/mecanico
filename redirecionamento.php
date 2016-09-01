<?php

if ( $_SESSION['logado'] != true ) {
	echo "<meta http-equiv='refresh' content=1;url='login.php'>";
}
else{
	echo "<meta http-equiv='refresh' content=1;url='home.php'>";
}
?>