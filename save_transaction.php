<?php
// Receber os dados da transação do formulário
$nome = $_POST['nome'] ?? '';
$valor = $_POST['valor'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$descricao = $_POST['descricao'] ?? '';

// Construir a linha de transação
$linhaTransacao = "<li>Nome: $nome | Valor: R$ $valor | Tipo: $tipo | Descrição: $descricao</li>";

// Abrir o arquivo transiction.html
$file = fopen("transiction.html", "a");

// Escrever a linha de transação no arquivo
fwrite($file, $linhaTransacao . PHP_EOL);

// Fechar o arquivo
fclose($file);

// Responder para o JavaScript que a transação foi salva com sucesso
echo "Transação salva com sucesso.";
?>
