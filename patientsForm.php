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
          <input name="CPF" placeholder="000.000.000-00" type="text" class="form-control cpf" id="inputCPF" />
        </div>  
      <div class="col-md-8">
        <label for="inputPassword4" class="form-label">Email</label>
        <input name="email" placeholder="example@mail.com" type="email" class="form-control" id="inputEmail4" />
      </div>
      <div class="col-md-4">
        <label for="inputEmail4" class="form-label">Telefone</label>
        <input name="phone" placeholder="(00) 00000-0000" type="text" class="form-control phone_with_ddd" id="inputPhone4" />
      </div>

      <div class="col-12">
        <label for="inputAddress" class="form-label">Endereço</label>
        <input
          name="address"
          type="text"
          class="form-control"
          id="inputAddress"
        />
      </div>    
      <div class="col-12">
        <button style="margin-top: 2%;" type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"> </script>


<script>

    $(document).ready(function() {
        $('.cpf').mask('000.000.000-00');

        $('.phone_with_ddd').mask('(00) 00000-0000');

    });

</script>