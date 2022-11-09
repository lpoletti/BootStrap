<?php include "header.php";
      include "classe/Servico.php";
?>
                <div id="tabela">
                    <table class="table table-hover table-striped table-bordered">
                        <tr>
                            <td>Código</td>
                            <td>Cliente/Fornecedor</td>
                            <td>Em Aberto</td>
                            <td>Total</td>
                        </tr>
                        <?php
                            $rel = new Servico();
                            $rel->connect();
                            $rel->selectServico('c.id_pessoa,p.nome,s.status,s.valor', 'pessoa p,cliente c,solicitacao_servico s', 's.id_cliente = c.id_cliente AND c.id_pessoa = p.id_pessoa AND s.status = \'aberto\'');
                            while ($row = mysqli_fetch_array($rel->getSelect())) {
                                echo "<tr class=\"info\">
                                        <td>$row[0]</td><td>".utf8_encode($row[1])."</td><td>".utf8_encode($row[2])."</td><td>$row[3]</td>
                                    </tr>";
                            }
                          ?>
                    </table>
                </div>
<?php include "footer.php";?>