<?php
include "classe/Bd.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
         <link href="css/style.css" rel="stylesheet" media="screen">
        <title></title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>HardSoft</h1>
                <blockquote><p class="muted">Painel Administrativo</p></blockquote>            
                <ul class="nav nav-pills">
                    <li class="active">
                      <a href="home.php">Home</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Cadastro<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="cadastroPessoa.php">Pessoa</a></li>
                            <li><a href="cadastroCliente.php">Cliente</a></li>
                            <li><a href="#">Fornecedor</a></li>
                            <li><a href="cadastroProdutos.php">Produtos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Pedido<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Pedido de Compra</a></li>
                            <li><a href="#">Pedido de Venda</a></li>
                            <li><a href="SolServico.php">Solicitação de Serviço</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Financeiro<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Entrada</a></li>
                            <li><a href="#">Saida</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Relatórios<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="relPessoa.php">Pessoa</a></li>
                            <li><a href="#">Pedido de Venda</a></li>
                            <li><a href="relServico.php">Solicitação Serviço</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="content">