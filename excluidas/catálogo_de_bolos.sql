-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS catalogo_bolos;
USE catalogo_bolos;

-- Tabela para os funcionários
CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE, -- Nome de usuário único
    password VARCHAR(255) NOT NULL, -- Senha criptografada
    role ENUM('admin', 'editor') DEFAULT 'admin', -- Função do funcionário
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela para os bolos
CREATE TABLE IF NOT EXISTS bolos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL, -- Nome do bolo
    descricao TEXT, -- Descrição opcional do bolo
    preco DECIMAL(10, 2) NOT NULL, -- Preço do bolo
    imagem_url VARCHAR(255), -- URL para a imagem do bolo
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
