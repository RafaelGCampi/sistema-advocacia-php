<div class="conteudo">
    <h1>Perfil do cliente</h1>
    <h3 class="nome-cliente"> Cliente: <span>asa</span></h3>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Processos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Endereços</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">

            <button id="adiciona-processo" class="button-padrao" data-cliente-id="1" onclick="processo_form(1)">Adicionar Processo
            </button>

            <div id="tabela-processo">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Processo</th>
                            <th scope="col">Situacao</th>
                            <th scope="col">Observacao</th>

                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody id="tabela-processo-body">


                        <tr>

                            <td id="categoria">Administrativo</td>
                            <td>ANÁLISE</td>
                            <td>-</td>
                            <td><button class="button-padrao" onclick="processo_altera(1)" data-processo-id="">Alterar</button>
                                <button id="deletar1" class="button-padrao" onclick="processo_deletar(1)" name="botaoDeletar">Deletar</button>
                            </td>

                        </tr>
                    </tbody>


                </table>
            </div>
        </div>
        <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <button id="adiciona-endereco" class="button-padrao" data-cliente-id="1" onclick="endereco_form(1)">Adicionar Endereço
            </button>
            <div id="tabela-endereco">
                <div id="tabela-endereco" class="tile">
                    <h3 class="tile-title">Listagem de enderecos</h3>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Bairro</th>
                                    <th scope="col">Rua</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Telefone residencial</th>
                                    <th scope="col">Telefone celular</th>

                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody id="tabela-endereco-body">


                                <tr>

                                    <td>sfsd</td>
                                    <td>sdf</td>
                                    <td>sdf</td>
                                    <td>d</td>
                                    <td>23231321312231</td>
                                    <td>312312312231</td>

                                    <td><button class="button-padrao" onclick="endereco_altera(1)" data-endereco-id="">Alterar</button>
                                        <button id="deletar1" class="button-padrao" onclick="endereco_deletar(1)" name="botaoDeletar">Deletar</button>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>