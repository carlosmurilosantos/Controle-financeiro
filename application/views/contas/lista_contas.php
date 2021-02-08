<div class="container">
 
        <div class="row mt-5">
            <div class="col-md-2">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseForm" aria-expanded="false" aria-controls="collapseExample">
            Nova conta
            </a>
        </div>
         <div class="col-md-2 offset-md-7 mt-3">
         <input type="month" id="month" name="month" value="<?= set_value('month')?>">
         </div> 
      </div>
  
        <?php echo form_error('parceiro', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('descricao', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('valor', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('ano', '<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_error('mes', '<div class="alert alert-danger">', '</div>'); ?>

        <div class="collapse" id="collapseForm">


            <div class="row">
                <div class="col-md-6 mx-auto border mt-5 pt-3 pb-3">
            <form method="POST" id="contas-form"> 

            <input class="form-control" value="<?= set_value('parceiro') ?> " name="parceiro" id="parceiro" type="text" placeholder="Devedor / Credor"><br>
            <input class="form-control" value="<?= set_value('descricao')?> " name="descricao" id="descricao" type="text" placeholder="Descrição"><br>
            <input class="form-control" value="<?= set_value('valor')?> " name="valor" id="valor" type="number" placeholder="Valor"><br><br>

            <input type="hidden" name="id" id="conta_id">
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
    $('#month').change(loadMonth);
    $('.delete_btn').click(openModal);
    $('#confirmBtn').click(deleteRow);
    $('.edit_btn').click(exibeForm);
    $('.pay_btn').click(liquidaConta);
});

function loadMonth(){
  var data = this.value.split('-');
  var ano = data[0];
  var mes = data[1];

  var v = window.location.href.split('/');
  var url = v.slice(0, 7).join('/');
  url = url + '/' + mes + '/' + ano;
  window.location.href = url;
}

function exibeForm(){
    var row_id = this.id;
    var td = $('#'+row_id).parent().parent().parent().children();

    $('#parceiro').val($(td[0]).text());
    $('#descricao').val($(td[1]).text());
    $('#valor').val($(td[2]).text());
    $('#mes').val($(td[3]).text());
    $('#ano').val($(td[4]).text());
    $('#conta_id').val(row_id);
    $('#collapseForm').collapse('show');
}


function openModal(){
    row_id = this.id;
    $('#exampleModal').modal();
}

 function deleteRow(){
     var id = row_id;
     $.post(api('contas', 'delete_conta'), {id}, function(d,s,x){console.log(x.responseText)});
     $('#'+row_id).parent().parent().parent().remove();
     $('#exampleModal').modal('hide');
}

function liquidaConta(){
    var id = this.id;
    $.post(api('contas', 'status_conta'), {id}, function(d,s,x){
        $('#' + id).toggleClass('text-muted green-text');
    });
}
 
</script>