<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo(a)</title>
    <link rel="stylesheet" href="/css/tela_inicial.css">
    <link rel="stylesheet" href="/css/menu_navegacao.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="nav-bar">
        </div>
        <div>
            <a href="perfil_usuario.php"><img src="/img/fotos_site/profile.png" alt="Imagem do usuário"></a>
        </div>
    </nav>

    <h1> Bem - Vindo(a) ao GymPlanner </h1>
    <div class="botoes">
        <button onclick="window.location.href = '/php/montar_cronograma.php'">Monte seu cronograma</button>
        <button onclick="window.location.href = '/php/ver_exercicios.php'">Ver exercícios</button>
        <button onclick="window.location.href = '/php/saiba_mais.php'">Saiba mais</button>
    </div>
</body>

</html>