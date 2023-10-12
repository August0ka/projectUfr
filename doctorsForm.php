<?php
include 'header.php';
 
?>
<main>
    <form action="createDoctors.php" method="post" style="padding: 9%; max-width: 100%;" class="row g-3">
    <legend style="padding-left:15%; padding-bottom:2%">CADASTRO DE MÉDICOS</legend>
      <div class="col-8">
        <label for="inputAddress" class="form-label">Nome</label>
        <input name="name" type="text" class="form-control" id="inputName" />
      </div>
      <div class="col-md-4">
        <label for="inputPassword4" class="form-label">CRM</label>
        <input name="CRM" placeholder="0000000" type="text" class="form-control crm " id="inputCRM" />
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Email</label>
        <input name="email" placeholder="example@mail.com" type="email" class="form-control" id="inputEmail4" />
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label ">Telefone</label>
        <input name="phone" placeholder="(00) 00000-0000" type="text" class="form-control phone_with_ddd" id="inputPhone4" />
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"> </script>

<script>

  $(document).ready(function() {

      $('.phone_with_ddd').mask('(00) 00000-0000');

      $('.crm').mask('0000000');

  });

</script>