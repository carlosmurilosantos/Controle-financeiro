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

<script>
$(document).ready(function(){
    $('.delete_btn').click(deleteRow);
});

 function deleteRow(){
     var id = this.id;
     $.post(api('sample', 'action_one'), {id}, function(d,s,x){console.log(x.responseText)});
 }
</script>