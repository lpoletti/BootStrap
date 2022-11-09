<?php 
include "header.php";
include "classe/Pessoa.php";
include "classe/Cliente.php";
include "classe/Servico.php";
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

?>
<form class="form-horizontal" action="" method="post">
    <table class="table table-hover table-striped table-bordered">
        <tr class="info">
            <td>Código</td><td>Cliente</td><td>Serviço</td><td>Total</td><td>Editar</td>
        </tr>
  <?php
    $relServico = new Servico();
    $relServico->connect();
    $relServico->selectServico('c.id_pessoa,p.nome,s.des_servico,s.valor', 'pessoa p,cliente c,solicitacao_servico s', 's.id_cliente = c.id_cliente AND c.id_pessoa = p.id_pessoa');
    while ($row = mysqli_fetch_array($relServico->getSelect())) {
        echo "<tr class=\"info\">
                <td>$row[0]</td><td>".utf8_encode($row[1])."</td><td>".utf8_encode($row[2])."</td><td>$row[3]</td><td><a href=\"editaSol.php?id=$row[0]\" class=\"btn\">Editar</a></td>
            </tr>";
    }
  ?>
    </table>
</form>
<?php include "footer.php";?>