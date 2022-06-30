<html lang="pt_BR">

<head>









    <script href="http://localhost:8000/js/jquery.mask"></script>
    <script href="http://localhost:8000/js/jquery.mask.min"></script>

    <style>
        <?php include('./resources/static/css/estilo.css'); ?>
    </style>
    <!--  <link href="http://localhost:8000/css/app.css" rel="stylesheet"> -->
  

    <?php include('../view/estilos.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Use -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Instead of -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    
</head>
<body>
    <nav id="info-usuario">
        <div id="conteudo-usuario">
            Nome do usuario: <strong>admin</strong>
        </div>
    </nav>
    <div class="area">
        <nav class="main-menu" id="main">
            <ul>
                <li>
                    <a href="http://localhost:8000/home">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="http://localhost:8000/meus-dados">
                        <i class="fa fa-file-text-o"></i>
                        <span class="nav-text">
                            Meus dados
                        </span>
                    </a>

                </li>

                <li class="has-subnav">
                    <a href="http://localhost:8000/funcionarios">
                        <i class="fa fa-user"></i>
                        <span class="nav-text">
                            Funcionarios
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="http://localhost:8000/clientes">
                        <i class="fa fa-users"></i>
                        <span class="nav-text">
                            Clientes
                        </span>
                    </a>

                </li>


                <li class="has-subnav">
                    <a onclick="if(confirm('Deseja sair?')){event.preventDefault(); document.getElementById('logout-form').submit();}">
                        <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">Sair</span>
                        <form id="logout-form" action="http://localhost:8000/logout" method="POST">
                            <input type="hidden" name="_token" value="i7wNkvR8CfHt0yS5oIvq12DeEytGgduWorsf80kv">
                        </form>
                    </a>
                </li>
            </ul>
        </nav>

        <div id="meu-conteudo">
            <div class="conteudo">
                <div id="logo">
                    <!-- <img src="" height="150px"> -->
                </div>
                <?php $this->content(); ?>
            </div>
        </div>

        <div class="modal" id="modal-geral" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-geral-title">Modal title</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body-geral">
                        <p>Modal body text goes here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>