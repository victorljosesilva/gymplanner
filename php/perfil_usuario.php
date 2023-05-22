<?php
session_start();

if (!isset($_SESSION["email"])) {
	header("Location: ../index.php");
	exit();
}

$servidor = "localhost";
$usuario = "root";
$senha = "#userVL2023";
$banco = "gymplanner";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
	die("Falha na conexão: " . mysqli_connect_error());
}

$email = $_SESSION["email"];

$consulta = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conexao, $consulta);

if (mysqli_num_rows($resultado) == 1) {
	$usuario = mysqli_fetch_assoc($resultado);
	$dataNascimento = new DateTime($usuario["nascimento"]);
	$hoje = new DateTime();
	$idade = $hoje->diff($dataNascimento)->y;
} else {
	header("Location: ../index.php");
	exit();
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Perfil</title>

	<link rel="stylesheet" href="/css/perfil_usuario.css">
	<link rel="stylesheet" href="/css/menu_navegacao.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
	<nav>
		<div class="nav-bar">
			<a class="menu-inicial" href="tela_inicial.php">Início</a>
			<a href="montar_cronograma.php">Cronograma</a>
			<a href="ver_exercicios.php">Exercícios</a>
			<a href="saiba_mais.php">Saiba Mais</a>
		</div>
		<div class="espaco"></div>
	</nav>

	<div class="container_geral">
		<div class="container1">
			<div class="container_imagem">
				<img class="foto_perfil" src="/img/fotos_site/profile.png" id="imagem-perfil">
			</div>

			<h1><?php echo $usuario["nome"]; ?></h1> <br> <br>
			<a href=""><button>Editar Informações</button></a>
			<a href="/index.php"><button>Encerrar Sessão</button></a>
			<a><button>Excluir Conta</button></button>
		</div>
		<div class="container2">
			<div class="info">E-mail:</div>
			<div class="info_valor"><?php echo $usuario["email"]; ?></div>
			<div class="info">Idade:</div>
			<div class="info_valor"><?php echo $idade; ?></div>
			<div class="info">Sexo:</div>
			<div class="info_valor"><?php echo $usuario["sexo"]; ?></div>
		</div>
	</div>

</body>

</html>