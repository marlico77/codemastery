<?php
// Incluir arquivo de configuração
$mysqli = new mysqli("localhost", "root", "", "test");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
   // Validar nome de usuário
   if(empty(trim($_POST["email"]))){
       echo "Por favor coloque um email de usuário.";
   } else{
       $email = trim($_POST["email"]);
       $sql = "SELECT id FROM dadosentrar WHERE email = ?";
       $stmt = $mysqli->prepare($sql);
       $stmt->bind_param("s", $email);
       $stmt->execute();
       $result = $stmt->get_result();
       if($result->num_rows == 0){
           echo "Este nome de usuário não existe.";
       }
   }
   // Validar senha
   if(empty(trim($_POST["password"]))){
       echo "Por favor insira uma senha.";    
   } else{
       $password = trim($_POST["password"]);
       $sql = "SELECT id FROM dadosentrar WHERE senha = ?";
       $stmt = $mysqli->prepare($sql);
       $stmt->bind_param("s", $password);
       $stmt->execute();
       $result = $stmt->get_result();
       if($result->num_rows == 0){
           echo "Senha incorreta.";
       } else {
            header('Location: ftrlogin.html');
            exit();
       }
   }
 }
?>