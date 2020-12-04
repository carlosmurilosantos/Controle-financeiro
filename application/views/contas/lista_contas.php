<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto border mt-5 pt-3 pb-3">
            <form method="POST" id="contas-form"> 

            <input class="form-control" name="parceiro" type="text" placeholder="Devedor / Credor"><br>
            <input class="form-control" name="descricao" type="text" placeholder="Descrição"><br>
            <input class="form-control" name="valor" type="number" placeholder="Valor"><br><br>

            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contas-form').submit();">Send</a>
            </div>

            </form>
        </div>
    </div>
</div>