<?php
//conexao
require_once 'db_connect.php';
//sessao
session_start();
//verificacao
if (!isset($_SESSION['logado'])):
	header('Location:index.php');
endif;
//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>



<!DOCTYPE html>
<html>
<head>
	<title>Thiago Boiko</title>
	<meta charset="utf-8">

</head>
<body>
<h1>Welcome <?php echo $dados['username']; ?></h1><hr>
<h1>Welcome <?php echo var_dump($dados); ?></h1>
<a href="logout.php">logout</a>
</body>
</html>