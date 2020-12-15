<div class="container">
 
        <div class="mt-4">
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Nova conta
          </a>
        </div>
  
        <div class="collapse" id="collapseExample">
            <div class="row">
                <div class="col-md-6 mx-auto border mt-5 pt-3 pb-3">
            <form method="POST" id="contas-form"> 

            <input class="form-control" name="parceiro" type="text" placeholder="Devedor / Credor"><br>
            <input class="form-control" name="descricao" type="text" placeholder="Descrição"><br>
            <input class="form-control" name="valor" type="number" placeholder="Valor"><br><br>
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