<?php
session_start();

// Verifica se o funcionário está logado
if (!isset($_SESSION['employee_id'])) {
    header("Location: ../login/login.php");
    exit;
}

// Inclui a conexão com o banco de dados
include '../config/db.php';

// Lógica para adicionar um produto
if (isset($_POST['add_product'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];
    $imagem_url = $_POST['imagem_url'];

    $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, imagem_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdsss", $nome, $preco, $descricao, $categoria_id, $imagem_url);

    if ($stmt->execute()) {
        $message = "Produto adicionado com sucesso!";
    } else {
        $message = "Erro ao adicionar produto: " . $conn->error;
    }
}

// Lógica para remover um produto
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $message = "Produto removido com sucesso!";
    } else {
        $message = "Erro ao remover produto: " . $conn->error;
    }
}

// Busca todos os produtos
$query = "SELECT p.id, p.nome, p.preco, p.descricao, c.nome AS categoria 
          FROM produtos p 
          JOIN categorias c ON p.categoria_id = c.id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos - Eita Mainha</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>Gerenciar Produtos</h1>

    <?php if (isset($message)): ?>
        <p class="message"><?= $message ?></p>
    <?php endif; ?>

    <!-- Formulário para Adicionar Produto -->
    <form method="POST" action="">
        <h2>Adicionar Produto</h2>
        <input type="text" name="nome" placeholder="Nome do Produto" required>
        <input type="number" step="0.01" name="preco" placeholder="Preço" required>
        <textarea name="descricao" placeholder="Descrição" required></textarea>
        <select name="categoria_id" required>
            <option value="">Selecione a Categoria</option>
            <?php
            $categories = $conn->query("SELECT id, nome FROM categorias");
            while ($row = $categories->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>
        <input type="text" name="imagem_url" placeholder="URL da Imagem" required>
        <button type="submit" name="add_product">Adicionar Produto</button>
    </form>

    <!-- Tabela de Produtos -->
    <h2>Lista de Produtos</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nome']) ?></td>
                    <td>R$ <?= number_format($row['preco'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($row['descricao']) ?></td>
                    <td><?= htmlspecialchars($row['categoria']) ?></td>
                    <td>
                        <a href="editar_produtos.php?delete=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
