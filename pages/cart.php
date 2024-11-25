<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    $produtoId = $_POST['produto_id'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $preco = $_POST['preco'] ?? null;
    $imagem_url = $_POST['imagem_url'] ?? null;

    // Verifique se todos os dados estão presentes
    if ($_POST['acao'] === 'adicionar' && $produtoId && $nome && $preco && $imagem_url) {
        // Inicialize o carrinho, se não existir
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // Se o produto já existe no carrinho, aumente a quantidade
        if (isset($_SESSION['carrinho'][$produtoId])) {
            $_SESSION['carrinho'][$produtoId]['quantidade']++;
        } else {
            // Adiciona o novo produto ao carrinho
            $_SESSION['carrinho'][$produtoId] = [
                'nome' => $nome,
                'preco' => $preco,
                'imagem_url' => $imagem_url,
                'quantidade' => 1,
            ];
        }

        // Redirecione de volta para evitar reenvio do formulário
        header('Location: bolos.php');
        exit;
    } else {
        echo "Dados incompletos para adicionar o produto ao carrinho.";
        exit;
    }
}

// Carregar o carrinho da sessão
$carrinho = $_SESSION['carrinho'] ?? [];
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="icon" href="../icons/icon-logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/cart.css?v=<?= time(); ?>">
</head>
<body>
    <header class="header d-flex justify-content-between align-items-center p-3 bg-dark text-white">
        <h1>Compras</h1>
        <a href="../index.php" class="btn btn-secondary">Voltar para Loja</a>
        <div class="logo text-center">
            <a href="../index.php">
                <img src="../images/logo.jpeg" alt="Logo Eita Mainha">
            </a>
        </div>
    </header>

    <div class="container my-4">
        <?php if (empty($carrinho)): ?>
            <h2 class="page-title">Seu carrinho está vazio &#128557</h2>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Preço Unitário</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_geral = 0; ?>
                    <?php foreach ($carrinho as $produtoId => $item): ?>
                        <?php $total = $item['preco'] * $item['quantidade']; ?>
                        <?php $total_geral += $total; ?>
                        <tr>
                            <td><img src="<?= htmlspecialchars($item['imagem_url']) ?>" alt="<?= htmlspecialchars($item['nome']) ?>" width="80"></td>
                            <td><?= htmlspecialchars($item['nome']) ?></td>
                            <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                            <td>
                                <form method="POST" class="d-inline">
                                    <input type="hidden" name="acao" value="atualizar">
                                    <input type="hidden" name="produto_id" value="<?= $produtoId ?>">
                                    <input type="number" name="quantidade" value="<?= $item['quantidade'] ?>" min="1" class="form-control w-50 d-inline">
                                    <button type="submit" class="btn btn-primary btn-sm">Atualizar</button>
                                </form>
                            </td>
                            <td>R$ <?= number_format($total, 2, ',', '.') ?></td>
                            <td>
                                <form method="POST" class="d-inline">
                                    <input type="hidden" name="acao" value="remover">
                                    <input type="hidden" name="produto_id" value="<?= $produtoId ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total Geral:</th>
                        <th colspan="2">R$ <?= number_format($total_geral, 2, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
            <div class="text-end">
                <a href="https://wa.me/75992191260" class="btn btn-success">Finalizar Compra no WhatsApp</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
