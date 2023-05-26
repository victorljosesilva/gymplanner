<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Escolha o exercício</title>
</head>

<body>
	<a href="montar_cronograma.php">voltar</a>
	<h1 class="titulo_principal">Página do Treino</h1>

	<div class="formulario">
		<p class="camp">Adicionar Treino </p>

		<form>
			<p>Grupo Muscular: <?php echo $_GET['categoria']; ?></p>

			<div class="opcoes">
				<p id="type_training">Selecione o Exercicio:</p>
				<select name="exercicio">
					<?php
					// Conexão com o banco de dados (substitua os valores pelos seus próprios)
					$servername = "localhost";
					$username = "root";
					$password = "#userVL2023";
					$dbname = "gymplanner";

					// Criar conexão
					$conn = new mysqli($servername, $username, $password, $dbname);

					// Verificar conexão
					if ($conn->connect_error) {
						die("Falha na conexão: " . $conn->connect_error);
					}

					// Verificar se uma categoria foi selecionada
					if (isset($_GET['categoria'])) {
						$categoria = $_GET['categoria'];

						// Consulta SQL para buscar os exercícios da categoria selecionada
						$sql = "SELECT * FROM exercicios WHERE categoria = '$categoria'";
						$result = $conn->query($sql);

						// Verificar se há resultados
						if ($result->num_rows > 0) {
							// Gerar as opções do select com base nos exercícios
							while ($row = $result->fetch_assoc()) {
								echo '<option value="' . $row['nome'] . '">' . $row['nome'] . '</option>';
							}
						} else {
							echo '<option value="">Nenhum exercício encontrado</option>';
						}
					}

					// Fechar conexão com o banco de dados
					$conn->close();
					?>
				</select>
			</div>
		</form>
	</div>
</body>

</html>