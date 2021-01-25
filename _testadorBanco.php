<?php
// pagina apenas para testes!
include '_funcoesConfigBanco.php';

$con = conectarBanco(); // conecta
$dados = executarSelect($con, "SHOW TABLES"); // obtem dados da consulta 'SHOW TABLES'

// Exibe resultados na tela
echo "<h1> Teste de conexão com o BD!</h1>";
echo "<pre>";
print_r($dados);
echo "</pre>";

desconectarBanco($con);

