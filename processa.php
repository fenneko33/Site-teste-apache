<?php
$servidor = "localhost";
$usuario = "usuario";
$senha = "123";
$banco = "atividade_db";

// Cria a conexão com o banco de dados
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se houve falha na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Captura os dados enviados pelo formulário via POST
$nome = $_POST['nome'] ?? '';
$sobrenome = $_POST['sobrenome'] ?? '';
$email = $_POST['email'] ?? '';
$devweb = $_POST['devweb'] ?? '';
$senioridade = $_POST['senioridade'] ?? '';
$experiencia = $_POST['experiencia'] ?? '';

// Comando SQL para inserir os dados na tabela
$sql = "INSERT INTO cadastros (nome, sobrenome, email, devweb, senioridade, experiencia) 
        VALUES ('$nome', '$sobrenome', '$email', '$devweb', '$senioridade', '$experiencia')";

// Executa a query e valida o resultado
if ($conexao->query($sql) === TRUE) {
    echo "<h2>Dados salvos com sucesso no Banco de Dados!</h2>";
    echo "<br><a href='index.html'>Voltar ao formulário</a>";
} else {
    echo "Erro ao inserir: " . $conexao->error;
}

// Fecha a conexão
$conexao->close();
?>
