<?php
// Incluindo o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verificando se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpar os dados
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO dadosentrar (usuario, email, senha) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header('Location: entrar.html');
    }else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    

    }
    // Fechar a conexão
    $conn->close();
}
?>