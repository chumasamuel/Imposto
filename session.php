<?php
// Inicializa a sessão.
	session_start();

// Destrói a sessão
	session_destroy();

//Redireciona o usuario para a página de login
		header("Location: .php");

?>