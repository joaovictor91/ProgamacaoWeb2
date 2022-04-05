@extends('layout.padrao')

@section('titulo','Beleza Natural Cosméticos')
@section('style','/css/StyleHome.css')

@section('conteudo')
    <div class="BarraMenu">
        <div class="container sticky-top">
            <div class="row align-items-center">
                <div class="col-1">
                    <img class="ImagemHomeBarraMenu" src="/img/logo_home.png" alt="Clorofitum">
                </div>
                <div class="col-1"></div>
                <div class="col-1">
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Shampoo</a></li>
                            <li><a class="dropdown-item" href="#">Another Creme</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Contato</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-5">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
                        <button class="btn btn-dark" type="submit">Buscar</button>
                    </form>
                </div>
                <div class="col-2">

                </div>
                <div class="col-1">
                    <a href="/login" <button class="btn btn-dark" type="submit"> Login</button></a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h1 class="TituloCentro">Cadastro de Usuário</h1>
        <div class="DivFormularioCentro">
            <form action="/action_page.php">
                <label for="fname">Nome:</label><br>
                <input type="text" id="nome" name="nome"><br>
                <label for="lname">Login:</label><br>
                <input type="text" id="login" name="login"><br>
                <label for="lname">Senha:</label><br>
                <input type="text" id="senha" name="senha"><br>
                <label for="lname">E-mail:</label><br>
                <input type="text" id="email" name="email"><br>
                <button type="submit">Enviar</button>
            </form>
        </div>

    </div>
@endsection
