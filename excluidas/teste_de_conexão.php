<?php
include 'config/db.php';

if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>
