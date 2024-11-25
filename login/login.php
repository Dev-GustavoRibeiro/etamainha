<?php
session_start();
include '../config/db.php';

$error = ''; // Inicializa variável para mensagens de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os valores enviados pelo formulário
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Consulta o banco para verificar o usuário
        $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $funcionario = $result->fetch_assoc();

            // Compara a senha diretamente ou usando password_verify (se armazenada com hash)
            if ($password === $funcionario['password']) { // Altere para password_verify se usar hash
                // Login bem-sucedido
                $_SESSION['employee_id'] = $funcionario['id'];
                header('Location: dashboard.php');
                exit(); // Evita execução de código após redirecionar
            } else {
                $error = "Senha incorreta.";
            }
        } else {
            $error = "Usuário não encontrado.";
        }
    } else {
        $error = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Êta Mainha</title>
    <link rel="icon" href="../icons/icon-logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css?v=<?= time(); ?>">
</head>
<body>
    <!-- Cabeçalho com a logo -->
    <header class="header">
        <a href="../index.php">
            <img src="../images/logo.jpeg" alt="Logo da Empresa">
        </a>
    </header>

    <!-- Caixa de login -->
    <div class="login-container">
        <h2>Entrar</h2>
        <form method="POST" action="login.php">
            <div class="input-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="button-group">
                <a href="../index.php" class="back-btn">Voltar</a>
                <button type="submit" class="btn">Entrar</button>
            </div>
        </form>

        <!-- Exibe mensagem de erro, se existir -->
        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
