![LYBRIS](https://github.com/GuilhermmeDev/Sistema-biblioteca/assets/139175554/65a55631-7ab5-4be1-9b4b-13e86fe39dc2)

---

# 📚 LYBRIS

**Lybris** é uma plataforma integrada que conecta bibliotecas físicas e virtuais, desenvolvida especialmente para alunos do ensino médio e bibliotecários. A solução tem como objetivo digitalizar e automatizar processos burocráticos de empréstimos e reservas de livros, promovendo uma gestão moderna, eficiente e sustentável das bibliotecas escolares.

---

## 🚀 Funcionalidades

* 📖 Busca inteligente de livros
* 🗓️ Reservas e empréstimos automatizados
* 📊 Gestão de acervo para bibliotecários
* 🧾 Redução do uso de papel e burocracia
* 🔒 Autenticação e controle de usuários

---

## 🔎 Integração com a API do Google Books

Lybris utiliza a **API do Google Books** para facilitar o cadastro de livros na biblioteca. Ao digitar o ISBN de um livro, a plataforma consulta automaticamente a API e preenche campos como:

* 📘 Título
* ✍️ Autor(es)
* 🏷️ Editora
* 🗓️ Data de publicação
* 🖼️ Capa do livro

Essa integração **agiliza o processo de cadastro**, evita erros manuais e garante que as informações estejam completas e padronizadas, melhorando a experiência de uso para bibliotecários e alunos.

> ✅ Basta informar o Título do livro e o sistema faz o resto!

---


## 📱 Responsividade

Lybris possui um **design totalmente responsivo**, funcionando perfeitamente em smartphones, tablets e desktops. Isso garante que tanto alunos quanto bibliotecários possam utilizar todos os recursos de forma prática e intuitiva em qualquer dispositivo.

---

## ⚙️ Instalação

### 1. Clone o repositório

```
git clone https://github.com/GuilhermmeDev/Sistema-biblioteca
cd Sistema-biblioteca
```

### 2. Configure o ambiente

* Renomeie o arquivo `.env.example` para `.env`.
* Edite as variáveis de ambiente relacionadas ao banco de dados (de `DB_CONNECTION` até `DB_PASSWORD`).
  **Exemplo:**

  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=lybris
  DB_USERNAME=root
  DB_PASSWORD=sua_senha
  ```

### 3. Instale as dependências

#### 3.1. Backend (Laravel)

```
composer install
```

#### 3.2. Frontend (Vue.js)

```
npm install
npm run build
```

### 4. Configure o banco de dados

* Execute as migrações:

```
php artisan migrate
```

> 💡 Recomendado: utilize uma ferramenta como **phpMyAdmin** para visualizar e acompanhar os dados do banco.

### 5. Gere a chave da aplicação

```
php artisan key:generate
```

---

## ▶️ Executando o projeto

Após a instalação, basta rodar:

```
php artisan serve
```

Acesse a aplicação no navegador pelo endereço `http://localhost:8000`.

---

## 💻 Tecnologias utilizadas

* PHP 8+ / Laravel
* Vue.js
* MySQL / PostgreSQL / SQLite
* Composer / NPM

---

