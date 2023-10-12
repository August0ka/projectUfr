
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nekoquimia</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/ico" href="favicon\kitsune.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

</head>
<!-- <style>
  *{
    font-weight: bold;
  }
</style> -->

<body style=" overflow: hidden; background-image: url(img/background2.jpg); background-size: cover; background-attachment: fixed; background-repeat: no-repeat; ">
<form action="auth.php" method="POST" style="padding: 30%; padding-top: 9%;">
<div style="background-color: rgba(0, 0, 0, 0.4); padding-right: 10%; padding-bottom:5%; border-radius: 10px; ">

    <legend style="padding-top:10%; margin-bottom: 10%; font-weight: bold; color:white; margin-left: 45%;">LOGIN</legend>
    <!-- Email input -->
    <div class="form-outline mb-4" style="margin-left: 10%;">
        <label  class="form-label" for="form2Example1" style="font-weight: bold; color:white; ">Email</label>
        <input name="email" type="email" id="form2Example1" class="form-control" />
      </div>
  
    <!-- Password input -->
      <div class="form-outline mb-4"  style="margin-left: 10%;">
        <label class="form-label" for="form2Example2" style="font-weight: bold; color:white;">Senha</label>
        <input name="password" type="password" id="form2Example2" class="form-control"  />
      </div>
  
  
    <!-- Submit button -->
      <button type="submit" class="btn btn-success btn-block mb-4" style="width: 20%; margin-left: 43%;">Entrar</button>
</div>

</form>
</body>

</html>