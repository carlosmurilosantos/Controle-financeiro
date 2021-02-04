<div class="container">
 
        <div class="mt-4">
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Nova conta
          </a>
        </div>
  
        <?php echo form_error('parceiro', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('descricao', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('valor', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('ano', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('mes', '<div class="alert alert-danger">', '</div>'); ?>

        <div class="collapse" id="collapseExample">


            <div class="row">
                <div class="col-md-6 mx-auto border mt-5 pt-3 pb-3">
            <form method="POST" id="contas-form"> 

            <input class="form-control" value="<?= set_value('parceiro') ?> " name="parceiro" type="text" placeholder="Devedor / Credor"><br>
            <input class="form-control" value="<?= set_value('descricao')?> " name="descricao" type="text" placeholder="Descrição"><br>
            <input class="form-control" value="<?= set_value('valor')?> " name="valor" type="number" placeholder="Valor"><br><br>

            <div class="row">
                <div class="col-md-6">
                    <input class="form-control" value="<?= set_value('mes')?> " name="mes" type="number" placeholder="Mês">
                </div>    
                <div class="col-md-6">
                    <input class="form-control" value="<?= set_value('ano')?> " name="ano" type="number" placeholder="Mês">
                </div>   
            </div>

            <input type="hidden" name="tipo" value="<?= $tipo ?>"><br>
 
  
            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contas-form').submit();">Enviar</a>
            </div>

            </form>
        </div>
    </div>
        
        </div>
       
    

    <div class="row mt-5">
                <div class="cow">
                    <?= $lista ?>
                </div>
            </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remoção de Contas</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">Deseja realmente remover esta conta? Essa ação é irreversivel</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Cancelar
        </button>
        <button type="button" id="confirmBtn" class="btn btn-primary">Deletar</button>
      </div>
    </div>
  </div>
</div>

<script>
row_id = 0;

$(document).ready(function(){
    $('.delete_btn').click(openModal);
    $('#confirmBtn').click(deleteRow);
});

function openModal(){
    row_id = this.id;
    $('#exampleModal').modal();
}

 function deleteRow(){
     var id = row_id;
     $.post(api('sample', 'action_one'), {id}, function(d,s,x){console.log(x.responseText)});
     $('#'+row_id).parent().parent().parent().remove();
     $('#exampleModal').modal('hide');
}
</script>