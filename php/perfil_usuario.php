<?php
session_start();

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

// Verifica se uma imagem foi enviada
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
	$imagem_tmp = $_FILES['imagem']['tmp_name'];
	$nome_imagem = $_FILES['imagem']['name'];
	$caminho_destino = '/img/fotos_site/' . $nome_imagem;

	// Move a imagem para o diretório desejado
	if (move_uploaded_file($imagem_tmp, $caminho_destino)) {
		// Atualiza o caminho da imagem no banco de dados
		$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
		$update_query = "UPDATE usuarios SET imagem = '$caminho_destino' WHERE email = '$email'";
		mysqli_query($conexao, $update_query);
		mysqli_close($conexao);
	}
}
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
				<img class="foto_perfil" src="<?php echo $usuario["imagem"]; ?>" id="imagem-perfil" onclick="mostrarBotoesImagem()">
				<div class="botoes_imagem" id="botoes-imagem" style="display: none;">
					<form method="POST" enctype="multipart/form-data">
						<input type="file" name="imagem" id="imagem" style="display: none;">
						<label for="imagem" id="label-imagem">Selecionar Imagem</label>
						<button type="submit" id="enviar-imagem">Enviar</button>
					</form>
				</div>
			</div>

			<h1><?php echo $usuario["nome"]; ?></h1> <br> <br>
			<a href=""><button class="editar">Editar Informações</button></a>
			<a href="/index.php"><button class="encerrar">Encerrar Sessão</button></a>
			<a><button class="excluir">Excluir Conta</button></button>
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

	<script>
		function mostrarBotoesImagem() {
			var botoesImagem = document.getElementById("botoes-imagem");
			if (botoesImagem.style.display === "none") {
				botoesImagem.style.display = "block";
			} else {
				botoesImagem.style.display = "none";
			}
		}
	</script>
</body>

</html>