<?php

require_once __DIR__ ."\..\..\model\Filme.php";
require_once __DIR__ ."\..\..\config\database.php";


$id = $_GET["id"];

if ($id == "") {

    return header( "Location: listar.php");
}

$filmeModel = new Filme();
$filme = $filmeModel->buscarPorId($id);

?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>

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

    <section class="container"> 

        <h2>Detalhes do filme</h2>

        <div class="detalhes-film">
        <h3>Nome: <?php echo $filme->nome?> </h3>
        <p>Ano: <?php echo $filme->ano?></p>
        <p>Descrição: <?php echo $filme->descricao?></p>
        <p><img class = "img_view" src="<?php echo $filme->imagem ?>" alt="Imagem do Filme">
        <br>
        </div>
        
        <div class="botoes">
        <a href="listar.php">
            <button>
                <span class="material-symbols-outlined">
                    keyboard_return
                </span>
            </button>
        </a>
    </section>

    <div class="acao_home">
            <a href="home.php">
                <button>
                    <span class="material-symbols-outlined">
                        home
                    </span>
                </button>
            </a>
        </div> 
        </div>

</body>
</html>