<?php 
	require_once("logica-usuario.php"); //a sessão tem que ser a primeira a inicializar, antes de qualquer html 
	require_once("banco/banco-categoria.php");

	verificaUsuario(); //verifica se o usuário está logado
	require_once("partials/_header.php");

	$id = $_POST['id'];
	$nome = $_POST["nomeCategoria"]; 	
	

	if (alteraCategoria($conexao, $nome, $id)) { 
		$_SESSION["success"] = "Categoria alterada com sucesso!";
		echo "<script>location.href='listar-categorias.php';</script>";
		die();
	}

	else {
		$msg = mysqli_error($conexao);
		$_SESSION["danger"] = "A categoria não foi alterada!";	
		echo "<script>location.href='listar-categorias.php';</script>"; //<script>location.href='listar-hospedes.php?cadastrado=false';</script>
		die();
	}
