<?php

require_once __DIR__ . "\..\..\model\Filme.php";

$filmeModel = new Filme();
$filmes = $filmeModel->buscarTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/vitorb/catalogo/public/css/style.css">
</head>
<body>

    <header>
        <nav>
            <a class = "logo" href="">Catálogo de filmes</a>
            <ul>
                <li><a href="listar.php">Listar</a></li>
                <li><a href="cadastro.php">Cadastrar</a></li>

            </ul>

            <div class="acao">
                <a href="home.php">
                    <button>
                        <span class="material-symbols-outlined">
                            home
                        </span>
                    </button>
                </a>
            </div>
        </nav>
    </header>

    <section class="container_card">
        <?php foreach($filmes as $filme) {?>
            <div class="cards">
            <a href="/vitorb/catalogo/app/view/filme/visualizar.php?id=<?php echo$filme->id?>"><img class="img"src="<?php echo $filme->imagem ?>" alt="Imagem do Filme" ></a>
            <h2 class="title"><?php echo $filme->nome ?></h2>
            <span class="descricao"><?php echo $filme->descricao ?></span>
            </div>
        <?php }?>
    </section>
    
</body>
</html>