<?php

require_once __DIR__."\..\..\model\Filme.php";

$filmeModel = new Filme ();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $id = $_POST["id"];

    $sucesso = FALSE;
    
    if(!empty($_POST["id"])){

        $nome = $_POST["nome"];
        $ano = $_POST["ano"];
        $descricao = $_POST["descricao"];
        $imagem = $_POST["imagem"];

        $sucesso = $filmeModel->editar($id, $nome, $ano, $descricao, $imagem);

    } else{
        // fluxo para cadastro

        $nome = $_POST["nome"];
        $ano = $_POST["ano"];
        $descricao = $_POST["descricao"];
        $imagem = $_POST["imagem"];

        $sucesso = $filmeModel->inserir($nome, $ano, $descricao, $imagem);
    }

    if ($sucesso){
        return header("Location: listar.php?mensagem=sucesso") ;
    } 
    else{
        return header("Location: listar.php?mensagem=erro") ;
    }
} else if ($_SERVER["REQUEST_METHOD"] === "GET"){

    
    $filme = null;

    if(!empty($_GET["id"])){
        // fluxo para editar
        $id = $_GET["id"];

        $filme = $filmeModel->buscarPorId($id);
    }
    else{
        // fluxo de cadastrar
        $filme = new Filme ();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
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
        
    <section class="cardc">
        <form action="cadastro.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $filme->id?>"  >
            <div>
                <label for="nome">Imagem:</label>
                <input type="text" name="imagem" value="<?php echo $filme->imagem?>">
            </div>
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name= "nome" value="<?php echo $filme->nome?> ">
            </div>
            <div>
                <label for="nome">Ano:</label>
                <input type="text" name="ano" value="<?php echo $filme->ano?>">
            </div>
            <div>
                <label for="nome">Descrição:</label>
                <input type="text" name="descricao" value="<?php echo $filme->descricao?>">
            </div>
            <button>Salvar</button>
        </form>
    </section>
    
</body>
</html>

