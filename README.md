# 🦠 API COVID-19 Kidopi

Interface web desenvolvida em **PHP** para consulta e visualização de dados sobre **casos confirmados** e **óbitos por COVID-19** em diferentes países (como Brasil, Austrália e Canadá), consumindo a API da Kidopi e persistindo registros em banco de dados **MySQL**.

---

## 🛠️ Tecnologias Utilizadas

- **PHP**
- **MySQL** (compatível com XAMPP / Apache)
- **Composer** & **`vlucas/phpdotenv`** (gerenciamento de variáveis de ambiente)
- **HTML / CSS / JavaScript**

---

## 📁 Estrutura do Projeto

```text
├── public/
│   ├── index.php          # Ponto de entrada da aplicação
│   ├── css/styles.css     # Estilização da interface
│   ├── js/script.js       # Interações no front-end
│   └── images/            # Bandeiras e ícones
└── src/
    ├── api/getCovidAPI.php  # Consumo da API da Kidopi
    ├── db/connectToDB.php   # Conexão com o banco MySQL
    └── helpers/helpers.php  # Funções auxiliares
```

---

## 🚀 Como Executar Localmente

### 1. Pré-requisitos
- PHP 8+ (ou XAMPP)
- MySQL
- Composer

### 2. Instalação
Clone o repositório (dentro da pasta `htdocs` caso utilize XAMPP) e instale as dependências:

```bash
git clone https://github.com/Pedrohenr1qq/API-Covid-19-Kidopi.git
cd API-Covid-19-Kidopi
composer install
```

### 3. Variáveis de Ambiente
Crie um arquivo `.env` na raiz do projeto com base no `.env.example`:

```env
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=
DB_DATABASE=nome_do_banco
API_KEY=sua_chave_api
DB_TABLE=nome_da_tabela
```

### 4. Execução
Inicie o servidor Apache/MySQL (ou use o servidor embutido do PHP):

```bash
php -S localhost:8000 -t public
```

Acesse `http://localhost:8000` no navegador.

---

## 📄 Licença

Este projeto está sob a licença definida no arquivo [LICENSE](./LICENSE).
