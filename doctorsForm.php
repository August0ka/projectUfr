<?php
include 'header.php';
 
?>
<main>
    <form style="padding: 10%; max-width: 100%;" class="row g-3">
      <div class="col-8">
        <label for="inputAddress" class="form-label">Nome</label>
        <input type="text" class="form-control" id="inputName" />
      </div>
      <div class="col-md-4">
        <label for="inputPassword4" class="form-label">CRM</label>
        <input placeholder="00000" type="text" class="form-control" id="inputCRM" />
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Email</label>
        <input placeholder="exemple@mail.com" type="email" class="form-control" id="inputEmail4" />
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Telefone</label>
        <input placeholder="(00) 0000-0000" type="text" class="form-control" id="inputPhone4" />
      </div>
      <div class="col-md-8">
        <label for="inputEmail4" class="form-label">Especialidade</label>
        <input type="text" class="form-control" id="inputExpertise4" />
      </div>
      <div class="col-12">
        <button style="margin-top: 2%;" type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
</main>