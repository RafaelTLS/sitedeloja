<?php 
	
	//conectar
	$conn = mysqli_connect('localhost', 'root', '', 'loja');

	//checar conexão
	if(!$conn) {
		echo 'erro: ' . mysqli_connect_error();
	}

 ?>