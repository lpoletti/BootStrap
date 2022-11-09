<?php 
include "header.php";
include "classe/Pessoa.php";
include "classe/Cliente.php";
include "classe/Servico.php";
if(!empty($_GET)){
    $id = $_GET['id'];
}else{
    echo "Nada foi selecionado para edição";
    
}
if(isset($_POST) && !empty($_POST['cadastrar']) == 'Cadastrar'){
    $solservico = new Servico($_POST['cliente'], $_POST['status'], $_POST['parcelas'], utf8_decode($_POST['des_servico']), $_POST['valor']);
    $solservico->connect();
    if($solservico->insertServico('solicitacao_servico')){
        echo "<div class=\"alert alert-success\">Solicitacão de Servico Cadastrado com <b>SUCESSO</b>!</DIV>";
    }else{
        echo "<div class=\"alert alert-error\"><b>ERRO</b> ao cadastrar solicitação tente novamente ou entre em contato com o administrador do sistema!</div><br>";
        echo $solservico;
    }
}
$edit = new Servico();
$edit->connect();
$edit->selectServico('*', 'solicitacao_servico', "id_cliente = $id", '', '');
$rowEdit = mysqli_fetch_array($edit->getSelect());
?>
<form class="form-horizontal" action="" method="post">
  <div class="control-group">
    <label class="control-label">Cliente:</label>
    <div class="controls">
        <select name="cliente">
            <option class="muted" value="<?php echo $rowEdit[1] ?>"><?php echo $rowEdit[1] ?></option>
            <?php
            $clienteSelect = new Cliente();
            $clienteSelect->connect();
            $clienteSelect->selectCliente('c.id_pessoa,p.nome','pessoa p,cliente c','p.id_pessoa = c.id_pessoa','nome');
            while($resSelectCliente = mysqli_fetch_array($clienteSelect->getSelect())){
                echo "<option value=\"$resSelectCliente[0]\">".utf8_encode($resSelectCliente[1])."</option>";
            }
            ?>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Status:</label>
    <div class="controls">
        <select name="status">
            <option value="<?php echo $rowEdit[2] ?>" selected="selected"><?php echo $rowEdit[2] ?></option>
            <option value="aberto">Aberto</option>
            <option value="fechado">Fechado</option>
        </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Parcelas</label>
    <div class="controls">
        <input type="number" id="inputParcelas" name="parcelas" value="<?php echo $rowEdit[3] ?>"/>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Descrição do Serviço</label>
    <div class="controls">
        <textarea name="des_servico" rows="5"><?php echo utf8_encode($rowEdit[4]); ?></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Valor</label>
    <div class="controls">
        <input type="text" id="inputValor" value="<?php echo $rowEdit[5] ?>" name="valor"/>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <input type="submit" value="Cadastrar" name="cadastrar" class="btn btn-primary"/>
    </div>
  </div>
</form>
<?php include "footer.php";?>