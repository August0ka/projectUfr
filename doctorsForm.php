<?php
include 'header.php';
 
?>
<main>
    <form action="createDoctors.php" method="post" style="padding: 15%; padding-top:6%;  padding-bottom:1%; max-width: 100%;" class="row g-3">
    <div style="background-color: rgba(0, 0, 0, 0.2);padding-left:10%; padding-right: 10%; padding-bottom:4%; padding-top:4%; border-radius: 10px; ">
    
    <legend style="padding-left:35%; padding-bottom:2%">CADASTRO DE MÉDICOS</legend>
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
    </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#inputPhone4').on('input', function() {
              var input = $(this).val().replace(/\D/g, '');
              var formattedInput = '';

              if (input.length >= 2) {
                  formattedInput += '(' + input.substring(0, 2) + ')';
              }

              if (input.length > 2) {
                  formattedInput += ' ' + input.substring(2, 6);
              }

              if (input.length > 6) {
                  formattedInput += '-' + input.substring(6, 10);
              }

              $(this).val(formattedInput);
          });
      });
  </script>

</main>