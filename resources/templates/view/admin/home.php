<div class="area">
        <nav class="main-menu" id="main">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                                Home
                            </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i>
                        <span class="nav-text">
                                Meus dados
                            </span>
                    </a>

                </li>

                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span class="nav-text">
                                Funcionarios
                            </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-users" ></i>
                        <span class="nav-text">
                                Clientes
                            </span>
                    </a>

                </li>

               
                        <li class="has-subnav">
                            <a
                               onclick="if(confirm('Deseja sair?')){event.preventDefault(); document.getElementById('logout-form').submit();}">
                                <i class="fa fa-power-off fa-2x"></i>
                                <span class="nav-text">Sair</span>
                                
                            </a>
                        </li>
            </ul>
        </nav>

        <div id="meu-conteudo">
            
        </div>

                <div class="modal" id='modal-geral' tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="modal-geral-title">Modal title</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modal-body-geral">
                                <p>Modal body text goes here.</p>
                            </div>
                        </div>
                    </div>
                </div>
    </div>