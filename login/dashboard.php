session_start();
if (!isset($_SESSION['employee_id'])) {
    header('Location: login.php'); 
    exit();
}

$edit_mode = false;
$edit_id = null;
$edit_nome = '';
$edit_preco = '';
$edit_descricao = '';
$edit_categoria_id = '';
$edit_imagem_url = '';

$message = '';
$message_type = '';

if (isset($_GET['edit_id'])) {
    $edit_mode = true;
    $edit_id = $_GET['edit_id'];
    $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
        $edit_nome = $produto['nome'];
        $edit_preco = $produto['preco'];
        $edit_descricao = $produto['descricao'];
        $edit_categoria_id = $produto['categoria_id'];
        $edit_imagem_url = $produto['imagem_url'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'];

    if ($acao === 'adicionar') {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $categoria_id = $_POST['categoria_id'];
        $imagem_url = null;

        if (!empty($_POST['imagem_url'])) {
            $imagem_url = filter_var($_POST['imagem_url'], FILTER_VALIDATE_URL);
        } elseif (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $imagem_nome = uniqid() . '_' . basename($_FILES['imagem']['name']);
            $upload_dir = '../uploads/';
            $imagem_caminho = $upload_dir . $imagem_nome;

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            if (is_writable($upload_dir)) {
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem_caminho)) {
                    $imagem_url = $imagem_caminho;
                }
            }
        } else {
            $imagem_url = '../uploads/default-image.jpg';
        }

        $stmt = $conn->prepare("INSERT INTO produtos (nome, preco, imagem_url, descricao, categoria_id) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sdssi", $nome, $preco, $imagem_url, $descricao, $categoria_id);
            if ($stmt->execute()) {
                $message = 'Produto adicionado com sucesso!';
                $message_type = 'success';
            }
        }
    } elseif ($acao === 'editar') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $categoria_id = $_POST['categoria_id'];
        $imagem_url = $_POST['imagem_url'];

        $stmt = $conn->prepare("UPDATE produtos SET nome = ?, preco = ?, imagem_url = ?, descricao = ?, categoria_id = ? WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("sdssii", $nome, $preco, $imagem_url, $descricao, $categoria_id, $id);
            if ($stmt->execute()) {
                $message = 'Produto atualizado com sucesso!';
                $message_type = 'success';
            }
        }
    } elseif ($acao === 'excluir') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $message = 'Produto excluído com sucesso!';
                $message_type = 'success';
            }
        }
    } elseif ($acao === 'adicionar_funcionario') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nome_completo = $_POST['nome_completo'];
        $email = $_POST['email'];
        $cargo = $_POST['cargo'];
        $data_contratacao = $_POST['data_contratacao'];

        $stmt = $conn->prepare("INSERT INTO funcionarios (username, password, nome_completo, email, cargo, data_contratacao) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("ssssss", $username, $password, $nome_completo, $email, $cargo, $data_contratacao);
            if ($stmt->execute()) {
                $message = 'Funcionário adicionado com sucesso!';
                $message_type = 'success';
            }
        }
    }
}

$produtos = $conn->query("SELECT p.*, c.nome AS categoria FROM produtos p JOIN categorias c ON p.categoria_id = c.id ORDER BY p.id DESC");
$categorias = $conn->query("SELECT * FROM categorias");
$funcionarios = $conn->query("SELECT * FROM funcionarios");
?>
