![LYBRIS](https://github.com/GuilhermmeDev/Sistema-biblioteca/assets/139175554/65a55631-7ab5-4be1-9b4b-13e86fe39dc2)

A **LYBRIS** é uma plataforma integrada que conecta **bibliotecas** virtuais e físicas, destinada a **alunos** de ensino médio e **bibliotecários**. A solução digitaliza e automatiza processos burocráticos de **empréstimos** e **reservas** de livros, oferecendo uma **interface amigável** para busca e consulta de acervos. O objetivo é reduzir papeladas, **facilitar** a gestão de bibliotecas e melhorar o acesso à informação, promovendo uma experiência mais eficiente e **moderna** no ambiente escolar.


## Responsividade
**Lybris** possui um design responsivo, garantindo que a plataforma funcione perfeitamente em dispositivos móveis. Isso permite que alunos e bibliotecários acessem e utilizem todas as funcionalidades, como busca de livros e gerenciamento de empréstimos, de maneira prática e intuitiva em **smartphones** e **tablets**.

## Instalação

1. clone o repo em algum local do seu computador com `git clone https://github.com/GuilhermmeDev/Sistema-biblioteca`
2. Após isso, renomeie o arquivo `.env.example` para apenas `.env`. Nesse arquivo, descomente os paramêtros de conexão do Banco de dados (`DB_CONNECTION` até `DB_PASSWORD`) e coloque as informações do banco de dados. Ex.: Em `DB_CONMECTION` coloque o tipo do seu BD (mysql, sqlite, postgresql).
3. Após isso, instale as dependências do projeto:
    3.1. Com o [Composer](https://getcomposer.org/) instalado, dê o comando no terminal na pasta do projeto: `composer install`.
    3.2. Com o [npm](https://www.npmjs.com/) execute o comando `npm install` seguido de `npm run build` para instalar as dependências de uma biblioteca vue.js e compilá-la, respectivamente.
4. Agora, com o arquivo `.env` previamente configurado para seu BD, execute no terminal o comando `php artisan migrate` para preencher seus BD com as tabelas do projeto (books, users, loans, reservations...)
5. Posteriormente, use o comando `php artisan db:seed` para preencher o BD com alguns dados fictícios para testes.
    5.1. **OBS**: recomendo usar o phpmyadmin para acompanhar os processos do banco de dados.
6. Por último, execute o comando `php artisan key:generate` para criar uma chave de autenticação para seu projeto e poder executá-lo


Agora é só executar o projeto! Use o comando `php artisan serve` e será aberto um localhost na porta indicada _(normalmente a porta 8000)_.

