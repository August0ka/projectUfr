<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KITSUNE</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/ico" href="favicon\kitsune.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body style="height: 100%; background-color: #f5f5dc;">

  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">HOSPITAL KITSUNE</a>
      <button class="navbar-toggler"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">REGISTROS</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" onclick="redirect('consultIndex.php')">Consultas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" onclick="redirect('patientsIndex.php')">Pacientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" onclick="redirect('doctorsIndex.php')">Médicos</a>
            </li>  
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="redirect('index.php')">Logout</a>
            </li>            
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <script>
    function redirect(url) {
      window.location.href = url;
    } 
  </script>
</body>
</html>
