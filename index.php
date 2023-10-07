<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nekoquimia</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/ico" href="favicon\kitsune.png">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="?page=novo">Cadastrar</a>
          <a class="nav-link" href="?page=listar">Listar usuario</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col mt-5">
        <?php
        include("config.php");
        switch (@$_REQUEST["page"]) {
          case "novo":
            include("novoUsuario.php");
            break;
          case "listar":
            include("listarUsuario.php");
            break;
          case "salvar":
            include("salvarUsuario.php");
          default:
            print "<h1>Bem Vindos!</h1>";
        }
        ?>
      </div>
    </div>
  </div>

</body>
<script src="js/bootstrap.bundle.min.js"></script>

</html>