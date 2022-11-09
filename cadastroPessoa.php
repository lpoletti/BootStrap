<?php 
include "header.php";
include "classe/Pessoa.php";
if(isset($_POST) && !empty($_POST['cadastrar']) == 'Cadastrar'){
    $pessoa = new Pessoa(utf8_decode($_POST['nome']), $_POST['telefone'], $_POST['celular'], $_POST['endereco'], $_POST['cep'], $_POST['cidade'], $_POST['estado']);
    $pessoa->connect();
    if($pessoa->insertPessoa('pessoa')){
        echo "<div class=\"alert alert-success\">Pessoa Cadastrada com <b>SUCESSO</b>!</DIV>";
    }else{
        echo "<div class=\"alert alert-error\"><b>ERRO</b> ao cadastrar pessoa tente novamente ou entre em contato com o administrador do sistema!</div><br>";
        echo $pessoa;
    }
}

?>
<form class="form-horizontal" action="" method="post">
  <div class="control-group">
    <label class="control-label">Nome</label>
    <div class="controls">
      <input type="text" id="inputNome" placeholder="Nome" name="nome">
    </div>
  </div>
    <div class="control-group">
    <label class="control-label">Telefone</label>
    <div class="controls">
      <input type="text" id="inputTelefone" placeholder="Telefone" name="telefone">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Celular</label>
    <div class="controls">
      <input type="text" id="inputCelular" placeholder="Celular" name="celular">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Endereço</label>
    <div class="controls">
      <input type="text" id="inputEnderece" placeholder="Endereco" name="endereco">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">CEP</label>
    <div class="controls">
      <input type="text" id="inputCEP" placeholder="CEP" name="cep">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Cidade</label>
    <div class="controls">
      <input type="text" id="inputCidade" placeholder="Cidade" name="cidade">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Estado</label>
    <div class="controls">
        <select name="estado">
            <option class="muted">Selecione um Estado</option>
            <?php
            $estado = new Pessoa();
            $estado->connect();
            if($estado->selectPessoa('estado','', 'nome')){
                while($resQueryEstado = mysqli_fetch_array($estado->getSelect())){
                    echo "<option value=\"$resQueryEstado[0]\">".utf8_encode($resQueryEstado[1])."</option>";
                }
            }else    var_dump($estado->selectPessoa('estado','', 'nome'));
            ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-primary">
    </div>
  </div>
</form>
<?php include "footer.php";?>