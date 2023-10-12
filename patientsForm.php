<?php
include 'header.php';
 
?>
<main>
    <form action="createPatients.php" method="post" style="padding: 9%; max-width: 100%;" class="row g-3">
    <legend style="padding-left:15%; padding-bottom:2%">CADASTRO DE PACIENTE</legend>
        <div class="col-md-8">
          <label for="inputEmail4" class="form-label">Nome</label>
          <input name="name" type="text" class="form-control" id="inputExpertise4" />
        </div>
        <div class="col-md-4">
          <label for="inputPassword4" class="form-label">CPF</label>
          <input name="CPF" placeholder="000.000.000-00" type="text" class="form-control" id="inputCPF" />
        </div>  
      <div class="col-md-8">
        <label for="inputPassword4" class="form-label">Email</label>
        <input name="email" placeholder="example@mail.com" type="email" class="form-control" id="inputEmail4" />
      </div>
      <div class="col-md-4">
        <label for="inputEmail4" class="form-label">Telefone</label>
        <input name="phone" placeholder="(00) 0000-0000" type="text" class="form-control" id="inputPhone4" />
      </div>

      <div class="col-12">
        <label for="inputAddress" class="form-label">Endereço</label>
        <input
          name="address"
          type="text"
          class="form-control"
          id="inputAddress"
          placeholder="R. Arnaldo,  Jardim Brasilia, Porto Velho - RO "
        />
      </div>    
      <div class="col-12">
        <button style="margin-top: 2%;" type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
</main>