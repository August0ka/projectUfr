<?php
include 'header.php';
 
?>
<main>
    <form action="createDoctors.php" method="post" style="padding: 10%; max-width: 100%;" class="row g-3">
      <div class="col-8">
        <label for="inputAddress" class="form-label">Nome</label>
        <input name="name" type="text" class="form-control" id="inputName" />
      </div>
      <div class="col-md-4">
        <label for="inputPassword4" class="form-label">CRM</label>
        <input name="CRM" placeholder="00000" type="text" class="form-control" id="inputCRM" />
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Email</label>
        <input name="email" placeholder="example@mail.com" type="email" class="form-control" id="inputEmail4" />
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Telefone</label>
        <input name="phone" placeholder="(00) 0000-0000" type="text" class="form-control" id="inputPhone4" />
      </div>
      <div class="col-md-8">
        <label for="inputEmail4" class="form-label">Especialidade</label>
        <input name="expertise" type="text" class="form-control" id="inputExpertise4" />
      </div>
      <div class="col-12">
        <button style="margin-top: 2%;" type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
</main>