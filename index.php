<?php
//conectar
require_once "db_connect.php";
//sessao
session_start();
// botao enviar
if(isset($_POST['btn-entrar'])):
	$erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $password = mysqli_escape_string($connect, $_POST['password']);

    if(empty($login) or empty($password)):
    	$erros[] = 'please type your credencials correctly';
    else:
    	$sql = "SELECT login FROM usuarios WHERE login = '$login'";
    	$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0): 

        	$password = md5($password);
            $sql = "SELECT * FROM usuarios WHERE login = '$login' AND password = '$password'";
            $resultado = mysqli_query($connect,$sql);

            if(mysqli_num_rows($resultado) == 1):
            	$dados = mysqli_fetch_array($resultado);
            	mysqli_close($connect);
            	$_SESSION['logado'] = true;
            	$_SESSION['id_usuario'] = $dados['id'];
            	header('Location:home.php');
            else:
            	$erros[] = 'please type your credencials correctly';
            endif;


        else:
        	$erros[] = "nonexistent username";
        endif;
        

     endif;
endif;

?>


<html>
<head>
	<title>login </title>
	<meta charset="utf-8">
</head>
<body>

	<h1>thiagoboiko</h1>

	<?php
	if (!empty($erros)) {
		foreach ($erros as $erro) {
			echo $erro;
		}
	}

echo "<hr>";
	?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	login:    <input type="text" name="login"><br>
	password: <input type="password" name="password"><br>
	<button type="submit" name='btn-entrar'>join</button>
    </form>
</body>
</html>