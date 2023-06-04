<?php
if (isset($_POST['confirmado'])) {
	$peso = $_POST['peso'];
	$altura = $_POST['altura'];
	$imc = $peso / ($altura * $altura);

	if ($imc < 18.5) {
		echo '<script>alert("Você esta no estado de magreza");</script>';
	}
	if ($imc > 18.5 && $imc < 24.9) {
		echo '<script>alert("Peso normal");</script>';
	}
	if ($imc > 24.99 && $imc < 30) {
		echo '<script>alert("Você esta no estado de Sobrepeso");</script>';
	}
	if ($imc > 29.99) {
		echo '<script>alert("Você esta no estado de Obesidade");</script>';
	}
} else {
	$peso = 0;
	$altura = 0;
	$imc = 0;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/css/calcular_imc.css">
	<link rel="stylesheet" href="/css/menu_navegacao.css">
</head>
<header>
	<nav>
		<div class="nav-bar">
			<a class="menu-inicial" href="tela_inicial.php">Início</a>
			<a href="montar_cronograma.php">Cronograma</a>
			<a href="ver_exercicios.php">Exercícios</a>
			<a href="saiba_mais.php">Saiba Mais</a>
		</div>
		<div>
			<a href="perfil_usuario.php"><img src="https://img.wattpad.com/2847a54156b8585551507c322a26d2c58a487e0f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f726350555f6446443230756d76513d3d2d3839303633343438322e313631663730643738383739386364353930343838353933353730302e6a7067?s=fit&w=720&h=720" alt="Imagem do usuário"></a>
		</div>
	</nav>
</header>

<body>
	<h1>Bem vindo a Página do IMC</h1>

	<h1>seu IMC é <?= number_format($imc, 2, '.', '') ?></h1>
	<form method="POST">
		<h2>Digite seu peso:</h2>
		<input type="number" name="peso" placeholder="Digite seu Peso"> <br>

		<h2>Digite sua altura:</h2>
		<input type="number" step="0.010" name="altura" placeholder="Digite sua altura"> <br> <br>
		<button type="submit" name="confirmado">save</button>
	</form>
</body>

</html>