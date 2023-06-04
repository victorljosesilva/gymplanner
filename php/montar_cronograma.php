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
            <a href="perfil_usuario.php"><img src="https://img.wattpad.com/2847a54156b8585551507c322a26d2c58a487e0f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f726350555f6446443230756d76513d3d2d3839303633343438322e313631663730643738383739386364353930343838353933353730302e6a7067?s=fit&w=720&h=720" alt="Imagem do usuário"></a>
        </div>
    </nav>

    <h2 class="texto">Lista de Treinos</h2>
    <div class="tabela">
        <table>
            <tr>
                <th id="cabeca">Grupo Muscular</th>
                <th id="cabeca">Exercício</th>
                <th id="cabeca">Serie x Repetição</th>
                <th id="cabeca">Intervalo/pausa</th>
                <th id="cabeca">Email</th>
            </tr>
        </table>
    </div>
    <main>
        <h3>Escolha Grupo Muscular:</h3>
        <form method="POST">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "#userVL2023";
            $dbname = "gymplanner";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $categoria = $_POST['categoria'];
                $exercicioId = $_POST['exercicio'];
                $series = $_POST['serie'];
                $repeticoes = $_POST['repeticao'];
                $tempo = $_POST['tempo'];
                $usuarioId = 1; // Substitua pelo ID de usuário real

                $sql = "INSERT INTO exercicios_usuarios (categoria, nome, series, repeticoes, tempo, usuario_id, email)
                        VALUES (?, (SELECT nome FROM exercicios WHERE id = ?), ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssiiisi", $categoria, $exercicioId, $series, $repeticoes, $tempo, $usuarioId, $_SESSION["email"]);
                $stmt->execute();
                $stmt->close();
            }

            $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

            $sql = "SELECT DISTINCT categoria FROM exercicios";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<select id="categoria" name="categoria">';
                echo '<option value="">Selecione uma categoria</option>';
                while ($row = $result->fetch_assoc()) {
                    $selected = $categoria === $row['categoria'] ? 'selected' : '';
                    echo '<option value="' . $row['categoria'] . '" ' . $selected . '>' . $row['categoria'] . '</option>';
                }
                echo '</select>';
            } else {
                echo 'Nenhuma categoria encontrada.';
            }

            $exercicios = array();
            if (!empty($categoria)) {
                $sql = "SELECT * FROM exercicios WHERE categoria = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $categoria);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $exercicio = array(
                            'id' => $row['id'],
                            'nome' => $row['nome'],
                            'series' => $row['series'],
                            'repeticao' => $row['repeticao'],
                            'tempo' => $row['tempo']
                        );
                        array_push($exercicios, $exercicio);
                    }
                }
                $stmt->close();
            }

            $conn->close();
            ?>
            <br>
            <h3>Escolha o Exercício:</h3>
            <select id="exercicio" name="exercicio">
                <?php
                foreach ($exercicios as $exercicio) {
                    echo '<option value="' . $exercicio['id'] . '">' . $exercicio['nome'] . '</option>';
                }
                ?>
            </select>

            <br>
            <h3>Escolha a Série:</h3>
            <input type="number" name="serie" value="<?php echo isset($exercicio['series']) ? $exercicio['series'] : ''; ?>">

            <br>
            <h3>Escolha a Repetição:</h3>
            <input type="number" name="repeticao" value="<?php echo isset($exercicio['repeticao']) ? $exercicio['repeticao'] : ''; ?>">

            <br>
            <h3>Escolha o Tempo:</h3>
            <input type="number" name="tempo" value="<?php echo isset($exercicio['tempo']) ? $exercicio['tempo'] : ''; ?>">

            <br><br>
            <button type="submit">Adicionar Exercício</button>
        </form>
    </main>

    <script>
        // Função para adicionar o exercício selecionado à tabela
        function adicionarExercicio() {
            var exercicioSelect = document.getElementById('exercicio');
            var exercicioSelecionado = exercicioSelect.options[exercicioSelect.selectedIndex].text;

            var tabela = document.querySelector('.tabela table');
            var novaLinha = tabela.insertRow();

            var colunaGrupoMuscular = novaLinha.insertCell();
            var colunaExercicio = novaLinha.insertCell();
            var colunaSerieRepeticao = novaLinha.insertCell();
            var colunaDuracao = novaLinha.insertCell();
            var colunaEmail = novaLinha.insertCell();

            colunaGrupoMuscular.textContent = document.getElementById('categoria').value;
            colunaExercicio.textContent = exercicioSelecionado;
            colunaSerieRepeticao.textContent = document.getElementById('serie').value + ' x ' + document.getElementById('repeticao').value;
            colunaDuracao.textContent = document.getElementById('tempo').value + ' min';
            colunaEmail.textContent = document.getElementById('email').value;

            // Limpa os campos de seleção
            exercicioSelect.selectedIndex = 0;
            document.getElementById('serie').selectedIndex = 0;
            document.getElementById('repeticao').selectedIndex = 0;
            document.getElementById('tempo').selectedIndex = 0;
            document.getElementById('email').value = '';
        }

        document.getElementById('categoria').addEventListener('change', function() {
            var categoria = document.getElementById('categoria').value; // Obtém a categoria selecionada
            location.href = 'montar_cronograma.php?categoria=' + encodeURIComponent(categoria);
        });
    </script>
</body>

</html>