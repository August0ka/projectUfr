<?php
include 'header.php';
 
?>
<main>
    <form action="createDoctors.php" method="post" style="padding: 15%; padding-top:6%;  padding-bottom:1%; max-width: 100%;" class="row g-3">
    <div style="background-color: rgba(0, 0, 0, 0.2);padding-left:10%; padding-right: 10%; padding-bottom:4%; padding-top:4%; border-radius: 10px; ">
    
    <legend style="padding-left:35%; padding-bottom:2%">CADASTRO DE MÉDICOS</legend>
      <div class="col-8">
        <label for="inputName4" class="form-label">Nome</label>
        <input name="name" type="text" class="form-control" id="inputName" />
      </div>
      <div class="col-md-4">
        <label for="inputCRM4" class="form-label">CRM</label>
        <input name="CRM" placeholder="0000000" type="text" class="form-control crm " id="inputCRM" />
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input name="email" placeholder="example@mail.com" type="email" class="form-control" id="inputEmail4" />
      </div>
      <div class="col-md-6">
        <label for="inputPhone4" class="form-label ">Telefone</label>
        <input name="phone" placeholder="(00) 00000-0000" type="text" class="form-control phone_with_ddd" id="inputPhone4" />
      </div>
      <div class="col-md-8">
        <label for="inputExpertise4" class="form-label">Especialidade</label>
        <input name="expertise" type="text" class="form-control" id="inputExpertise4" />
      </div>
      <div class="col-12">
        <button style="margin-top: 2%;" type="submit" class="btn btn-success">Cadastrar</button>
      </div>
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