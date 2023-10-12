
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hospital Kitsune</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/ico" href="favicon\kitsune.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
<form action="auth.php" method="POST" style="padding: 30%; padding-top: 5%; ">
<legend style="margin-top:10%; margin-bottom: 10%;">LOGIN</legend>
  <!-- Email input -->
  <div class="form-outline mb-4">
      <label  class="form-label" for="form2Example1">Email</label>
      <input name="email" type="email" id="form2Example1" class="form-control" />
    </div>

  <!-- Password input -->
    <div class="form-outline mb-4">
      <label class="form-label" for="form2Example2">Senha</label>
      <input name="password" type="password" id="form2Example2" class="form-control" />
    </div>
    </div>

  <!-- Submit button -->
    <button type="submit" class="btn btn-success btn-block mb-4">Entrar</button>

</form>
</body>

</html>