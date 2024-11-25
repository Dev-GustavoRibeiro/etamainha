<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $employee_query = "SELECT id, password FROM funcionarios WHERE username = ?";
    $stmt = $conn->prepare($employee_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['employee_id'] = $user['id'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Senha incorreta.";
        }
    } else {
        $error = "Usuário não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Eita Mainha</title>
    <link rel="icon" href="../icons/icon-logo.png" type="image/png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilização geral */
         body {
            font-family: Arial, sans-serif;
            background: url('../images/fundo-textura.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            flex-direction: column;
        }

        /* Cabeçalho com a logo */
        .header {
            width: 100%;
            background: linear-gradient(200deg, #3b261b, #a85f38);
            padding: 10px 0;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .header img {
            height: 200px;
        }

        /* Caixa de login */
        .login-container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 150px;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #3b261b;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Botões */
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .btn {
            background: linear-gradient(200deg, #3b261b, #a85f38);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            flex: 1;
        }

        .btn:hover {
            background: linear-gradient(200deg, #5e3a26, #c17e4b);
        }

        .back-btn {
            background: linear-gradient(200deg, #3b261b, #a85f38);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background 0.3s ease;
            flex: 1;
        }

        .back-btn:hover {
            background: linear-gradient(200deg, #5e3a26, #c17e4b);
        }

        /* Mensagem de erro */
        .error {
            color: red;
            margin-top: 15px;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .login-container {
                width: 90%;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
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

        <?php if (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
