# 🎂 Etamainha

**Etamainha** é um site de vendas de bolos desenvolvido como projeto acadêmico para a faculdade. Criado com **PHP puro** e **MySQL**, o sistema possui uma interface intuitiva tanto para o **consumidor final**, quanto para o **administrador da plataforma**, permitindo pedidos, gestão de produtos e controle de usuários.

---

## 📌 Visão Geral

Este projeto simula uma confeitaria online onde clientes podem visualizar produtos e realizar pedidos, enquanto os administradores têm acesso a um painel de controle completo para gerenciar o catálogo de bolos e os usuários cadastrados.

---

## 🚀 Tecnologias Utilizadas

- 💻 **PHP** (sem frameworks)
- 🗃️ **MySQL**
- 🧩 **Prisma ORM** (para mapeamento relacional)
- 🧪 **XAMPP** (Apache + MySQL)
- ☁️ **Railway** (deploy — atualmente desativado)

---

## 🧩 Funcionalidades

### 👥 Parte do Consumidor:
- Visualização de produtos disponíveis
- Realização de pedidos
- Confirmação de pedido

### 🔐 Parte do Administrador:
- Autenticação com login e senha
- Cadastro de novos bolos
- Edição e exclusão de produtos existentes
- Gestão de usuários (criação, edição e exclusão)

---

## 📂 Estrutura do Projeto

```bash
etamainha/
├── index.php              # Página inicial
├── produtos/              # Lógica de exibição dos bolos
├── admin/                 # Painel do administrador
│   ├── login.php
│   ├── dashboard.php
│   ├── produtos/
│   ├── usuarios/
├── db/                    # Conexão com o banco de dados
├── assets/                # Imagens, CSS, JS
├── prisma/                # Configuração ORM (Prisma)
├── .gitignore
└── README.md
```

---

## 🛠️ Como Executar Localmente

### Pré-requisitos:
- [XAMPP](https://www.apachefriends.org/pt_br/index.html)
- PHP 7.4+
- MySQL
- Composer (opcional, se usar dependências)
- Prisma CLI (caso queira atualizar modelos)

### Passo a passo:

```bash
# 1. Clone o repositório
git clone https://github.com/Dev-GustavoRibeiro/etamainha.git

# 2. Copie os arquivos para a pasta htdocs do XAMPP
mv etamainha/ /caminho/para/xampp/htdocs/

# 3. Inicie o XAMPP (Apache + MySQL)

# 4. Importe o banco de dados
# Acesse o phpMyAdmin e importe o arquivo `db.sql` ou semelhante

# 5. Acesse o sistema no navegador
http://localhost/etamainha/
```

---

## 🌐 Deploy

O projeto foi publicado inicialmente na plataforma **[Railway](https://railway.app/)**, mas atualmente o deploy está desativado.

---

## 📷 Capturas de Tela *(adicione se quiser)*

> *Você pode adicionar imagens aqui usando:*
> ```md
> ![Home](./assets/screenshots/home.png)
> ![Admin](./assets/screenshots/admin-dashboard.png)
> ```

---

## 📌 Próximos Passos (To-do)

- [ ] Reativar o deploy via Railway ou Vercel com backend via API
- [ ] Adicionar sistema de pagamento (ex: Mercado Pago)
- [ ] Melhorar responsividade em dispositivos móveis
- [ ] Implementar testes básicos de segurança/autenticação
- [ ] Adicionar feedbacks visuais com JavaScript

---

## 📝 Licença

Este projeto está licenciado sob a **[Licença MIT](LICENSE)** — sinta-se à vontade para usar, modificar e distribuir.

---

## 🙋‍♂️ Autor

Desenvolvido por **Gustavo Ribeiro**  
[GitHub](https://github.com/Dev-GustavoRibeiro) • [LinkedIn](https://www.linkedin.com/in/gustavoribeirodev)