<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lybris</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Adicionando sua folha de estilo existente -->
    <link rel="stylesheet" href="{{asset('css/welcome/style.css')}}">
    
</head>
<body>
    <div >
        <header>
            <div class="logo">
                <img class="w-48" src="{{asset('imgs/navbar/LYBRIS.svg')}}" alt="Lybris Logo">
            </div>
            <nav>
                <a type="submit" class="nav-btn loginst" href="/login">
                    Login
                </a>
                <a type="submit" class="nav-btn cadastro" href="/register">
                    Cadastre-se
                </a>
            </nav>
        </header>
        <main class="text-center">
            <section class="intro">
                <h2>Biblioteca Virtual</h2>
                <h1 class="title"><span >Aumente seu conhecimento com a <span class="Lybris">Lybris</span></span></h1>
                <p>Conectando leitores ao conhecimento. Explore, empreste e mergulhe em um mundo de livros digitais com facilidade e comodidade.</p>
                <a type="submit" class="btn" href="/register">
                    Faça parte
                </a>
            </section>
            <section class="features">
                <div class="feature">
                    <div id="img" class="feature-header">
                        <svg width="39" style="margin-right: -35px;" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.5 35.75C10.5254 35.75 3.25 28.4746 3.25 19.5C3.25 10.5254 10.5254 3.25 19.5 3.25C28.4746 3.25 35.75 10.5254 35.75 19.5C35.75 28.4746 28.4746 35.75 19.5 35.75ZM19.5 32.5C26.6797 32.5 32.5 26.6797 32.5 19.5C32.5 12.3203 26.6797 6.5 19.5 6.5C12.3203 6.5 6.5 12.3203 6.5 19.5C6.5 26.6797 12.3203 32.5 19.5 32.5ZM17.875 11.375H21.125V14.625H17.875V11.375ZM17.875 17.875H21.125V27.625H17.875V17.875Z" fill="black"/>
                        </svg>
                        <h3>Acessibilidade Aprimorada</h3>
                    </div>
                    <p>Lybris amplia o acesso à leitura ao permitir que usuários naveguem e emprestem livros de bibliotecas físicas de forma virtual, eliminando barreiras geográficas e temporais.</p>
                </div>
                <div class="feature">
                    <div class="feature-header">
                        <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.66667 3H32C32.9205 3 33.6667 3.7462 33.6667 4.66667V36.5722C33.6667 37.0323 33.2935 37.4057 32.8333 37.4057C32.6768 37.4057 32.5233 37.3613 32.3907 37.2782L20.3333 29.7188L8.27598 37.2782C7.88605 37.5227 7.37177 37.4048 7.12728 37.0148C7.04412 36.8822 7 36.7288 7 36.5722V4.66667C7 3.7462 7.7462 3 8.66667 3ZM30.3333 6.33333H10.3333V32.054L20.3333 25.7845L30.3333 32.054V6.33333Z" fill="black"/>
                        </svg>
                        <h3>Diversidade de Títulos</h3>
                    </div>
                    <p>A plataforma oferece acesso a uma ampla variedade de títulos físicos disponíveis nas bibliotecas cadastradas, proporcionando aos usuários uma gama extensa de opções para escolha e reserva.</p>
                </div>
                <div class="feature">
                    <div class="feature-header">
                        <svg width="27" height="35" viewBox="0 0 27 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.5 34.75C0.5 27.5703 6.32029 21.75 13.5 21.75C20.6797 21.75 26.5 27.5703 26.5 34.75H23.25C23.25 29.3652 18.8848 25 13.5 25C8.11522 25 3.75 29.3652 3.75 34.75H0.5ZM13.5 20.125C8.11312 20.125 3.75 15.7619 3.75 10.375C3.75 4.98812 8.11312 0.625 13.5 0.625C18.8869 0.625 23.25 4.98812 23.25 10.375C23.25 15.7619 18.8869 20.125 13.5 20.125ZM13.5 16.875C17.0912 16.875 20 13.9663 20 10.375C20 6.78375 17.0912 3.875 13.5 3.875C9.90875 3.875 7 6.78375 7 10.375C7 13.9663 9.90875 16.875 13.5 16.875Z" fill="black"/>
                        </svg>
                        <h3>Gestão Eficiente de Empréstimos</h3>
                    </div>
                    <p>Com a Lybris, os usuários podem gerenciar empréstimos de forma simples, acompanhando datas de devolução e renovação dos livros de maneira eficiente através de uma plataforma online intuitiva.</p>
                </div>
            </section>
        </main>
    </div>
</body>
</html>