<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/menu_navegacao.css">
    <link rel="stylesheet" type="text/css" href="../css/montar_cronograma.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <title>Cronograma</title>
</head>

<body class="corpo">

    <nav>
        <div class="nav-bar">
            <a class="menu-inicial" href="tela_inicial.php">Início</a>
            <a href="montar_cronograma.php">Cronograma</a>
            <a href="ver_exercicios.php">Exercícios</a>
            <a href="saiba_mais.php">Saiba Mais</a>
        </div>
        <div>
            <a href="perfil_usuario.php"><img src="/img/fotos_site/profile.png" alt="Imagem do usuário"></a>
        </div>
    </nav>

    <h2 class="texto">Lista de Treinos</h2>
    <div class="tabela">
        <table>
            <tr>
                <th id="cabeca">Grupo Muscular</th>
                <th id="cabeca">Exercício</th>
                <th id="cabeca">Serie x Repetição</th>
                <th id="cabeca">
                    Duração
                    (Intervalo)
                </th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    <main>
        <h3>Escolha Grupo Muscular:</h3>
        <form action="cadastro_exercicio.php" method="GET">
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

            // Consulta SQL para buscar as categorias únicas
            $sql = "SELECT DISTINCT categoria FROM exercicios";
            $result = $conn->query($sql);

            // Verificar se há resultados
            if ($result->num_rows > 0) {
                // Gerar as opções do select com base nas categorias
                echo '<select name="categoria">';
                echo '<option value="">Selecione</option>';
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['categoria'] . '">' . $row['categoria'] . '</option>';
                }
                echo '</select>';
                echo '<button type="submit">Selecionar</button>';
            } else {
                echo 'Nenhuma categoria encontrada.';
            }

            // Fechar conexão com o banco de dados
            $conn->close();
            ?>
        </form>
    </main>
</body>

</html>