<?php 
include "header.php";
include "classe/Pessoa.php";
include "classe/Cliente.php";
if(isset($_POST) && !empty($_POST['cadastrar']) == 'Cadastrar'){
    $cliente = new Cliente($_POST['pessoa'], $_POST['pessoa'], $_POST['obs']);
    $cliente->connect();
    if($cliente->insertCliente('cliente')){
        echo "<div class=\"alert alert-success\">Cliente Cadastrada com <b>SUCESSO</b>!</DIV>";
    }else{
        echo "<div class=\"alert alert-error\"><b>ERRO</b> ao cadastrar cliente tente novamente ou entre em contato com o administrador do sistema!</div><br>";
        echo $cliente;
    }
}

?>
<form class="form-horizontal" action="" method="post">
  <div class="control-group">
    <label class="control-label">Pessoa</label>
    <div class="controls">
        <select name="pessoa">
            <option class="muted">Selecione a Pessoa</option>
            <?php
            $pessoaSelect = new Pessoa();
            $pessoaSelect->connect();
            $pessoaSelect->selectPessoa('pessoa','','nome');
            while($resSelectPessoa = mysqli_fetch_array($pessoaSelect->getSelect())){
                echo "<option value=\"$resSelectPessoa[0]\">".utf8_encode($resSelectPessoa[1])."</option>";
            }
            ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Observação</label>
    <div class="controls">
      <textarea name="obs" rows="3"></textarea>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-primary">
    </div>
  </div>
</form>
<?php include "footer.php";?>