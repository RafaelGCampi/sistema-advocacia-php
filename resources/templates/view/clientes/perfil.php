<h1>Perfil do cliente</h1>

<h3 class="nome-cliente"> Cliente: <span>asa</span></h3>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Processos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Endereços</a>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

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

                    <?php
                    foreach ($_REQUEST['processos']  as $processo) {
                       
                        echo '
                            <tr>
                                <td id="categoria">' .$processo->getNameProcesso(). '</td>
                                <td>' . $processo->getNameSituacaoProcesso() . '</td>
                                <td>' . $processo->getObservacao() . '</td>
                                <td><button class="button-padrao" onclick="processo_altera(' . $processo->getId_processo() . ')" data-processo-id="">Alterar</button>
                                    <button id="deletar1" class="button-padrao" onclick="processo_deletar(' . $processo->getId_processo() . ')" name="botaoDeletar">Deletar</button>
                                </td>
                            </tr>
                            ';
                    }
                    ?>
                </tbody>


            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                            <?php

                            foreach ($_REQUEST['enderecos'] as $endereco) {
                                echo '
                                    <tr>

                                        <td>' . $endereco->getCidade() . '</td>
                                        <td>' . $endereco->getBairro() . '</td>
                                        <td>' . $endereco->getRua() . '</td>
                                        <td>' . $endereco->getUf() . '</td>
                                        <td>' . $endereco->getTelefone_residencial() . '</td>
                                        <td>' . $endereco->getTelefone_celular() . '</td>

                                        <td><button class="button-padrao" onclick="endereco_altera(' . $endereco->getId_endereco() . ')" data-endereco-id="">Alterar</button>
                                            <button id="deletar1" class="button-padrao" onclick="endereco_deletar(' . $endereco->getId_endereco() . ')" name="botaoDeletar">Deletar</button>
                                        </td>

                                    </tr>
                                    ';
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



<script defer>
    function processo_store(el) {
        event.preventDefault();
        let button = $(el).find('button');
        console.log(button);
        button.attr('disabled', true);
        button.html('Salvando...');

        let formData = new FormData(el);

        $.ajax({
            url: "/processos/store?cliente_id=<?php echo $_REQUEST['cliente']->getId_cliente();?>",
            method: "POST",
            /* headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, */
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                console.log('RESULTADO', result);

                alert("Processo salvo !");
                window.location.reload();
                //list_cliente();

            },
            error: function(erro) {
                $('#erro').html('');

            },

        });
        button.html('Salvar');
        button.attr('disabled', false);
        return false;
    }

    function processo_deletar(processo_id) {
        if (confirm('Deseja deletar processo ?')) {
            $.ajax({
                url: "/processos/delete?cliente_id=<?php echo $_REQUEST['cliente']->getId_cliente();?>&processo_id="+processo_id,
                method: "DELETE",
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    //list_cliente();
                    window.location.reload();
                }
            });
        }
        return false;
    }


    function processo_altera(processo_id) {
        $('#modal-geral').modal('show');
        $('#modal-body-geral').html('Carregando....');
        $('#modal-geral-title').html('Criação de cliente');
        $('#modal-body-geral').load('/processos/form', function() {

            $.ajax({
                url: "/processos/edit?cliente_id=<?php echo $_REQUEST['cliente']->getId_cliente();?>&processo_id="+processo_id,
                method: "GET",
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    var result = JSON.parse(response);
                        $('#data_limite').val(result.processo.date);
                        $('#processo').val(result.processo.processo);
                        $('#situacao').val(result.processo.situacao_id);
                        $('#observacao').val(result.processo.observacao);
                        $('#tipo_processo').val(result.processo.tipo_processo_id);
                        $('#post_criar_processo_form').attr('onsubmit', 'processo_update(this,' + processo_id + ')');
                },
                error: function(erro) {

                },

            });
        });
    }

    function processo_update(el,processo_id) {
        event.preventDefault();
        let button = $(el).find('button');
        console.log(button);
        button.attr('disabled', true);
        button.html('Salvando...');

        let formData = new FormData(el);
       
        $.ajax({
            url: "/processos/update?cliente_id=<?php echo $_REQUEST['cliente']->getId_cliente();?>&processo_id="+processo_id,
            method: "POST",
            /* headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, */
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                console.log('RESULTADO',result);
               
                    alert("Cliente salvo !");
                    window.location.reload();
                    //list_cliente();
                
            },
            error: function(erro) {
                $('#erro').html('');

            },

        });
        button.html('Salvar');
        button.attr('disabled', false);
        return false;
    }

    function processo_form() {
        $('#modal-geral').modal('show');
        $('#modal-body-geral').html('Carregando....');
        $('#modal-geral-title').html('Criação de processo');
        $('#modal-body-geral').load('/processos/form', function() {
            
        });
    }



    function endereco_store(el) {
        event.preventDefault();
        let button = $(el).find('button');
        console.log(button);
        button.attr('disabled', true);
        button.html('Salvando...');

        let formData = new FormData(el);

        $.ajax({
            url: "/enderecos/store?cliente_id=<?php echo $_REQUEST['cliente']->getId_cliente();?>",
            method: "POST",
            /* headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, */
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                console.log('RESULTADO', result);

                alert("Endereco salvo !");
                window.location.reload();
                //list_cliente();

            },
            error: function(erro) {
                $('#erro').html('');

            },

        });
        button.html('Salvar');
        button.attr('disabled', false);
        return false;
    }

    function endereco_deletar(endereco_id) {
        if (confirm('Deseja deletar endereco ?')) {
            $.ajax({
                url: "/enderecos/delete?endereco_id="+endereco_id,
                method: "DELETE",
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    //list_cliente();
                    window.location.reload();
                }
            });
        }
        return false;
    }


    function endereco_altera(endereco_id) {
        $('#modal-geral').modal('show');
        $('#modal-body-geral').html('Carregando....');
        $('#modal-geral-title').html('Alteração de endereco');
        $('#modal-body-geral').load('/enderecos/form', function() {

            $.ajax({
                url: "/enderecos/edit?cliente_id=<?php echo $_REQUEST['cliente']->getId_cliente();?>&endereco_id="+endereco_id,
                method: "GET",
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    var result = JSON.parse(response)[0];
                    console.log('RESONASD', result);
                        $('#cep').val(result.endereco.cep);
                        $('#rua').val(result.endereco.rua);
                        $('#bairro').val(result.endereco.bairro);
                        $('#cidade').val(result.endereco.cidade);
                        $('#uf').val(result.endereco.uf);
                        $('#telefone_residencial').val(result.endereco.telefone_residencial);
                        $('#telefone_celular').val(result.endereco.telefone_celular);
                        $('#complemento').val(result.endereco.complemento);
                        $('#numero_casa').val(result.endereco.numero);
                        $('#post_criar_endereco_form').attr('onsubmit', 'endereco_update(this,' + endereco_id + ')');
                },
                error: function(erro) {

                },

            });
        });
    }

    function endereco_update(el,endereco_id) {
        event.preventDefault();
        let button = $(el).find('button');
        console.log(button);
        button.attr('disabled', true);
        button.html('Salvando...');

        let formData = new FormData(el);
       
        $.ajax({
            url: "/enderecos/update?cliente_id=<?php echo $_REQUEST['cliente']->getId_cliente();?>&endereco_id="+endereco_id,
            method: "POST",
            /* headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, */
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                console.log('RESULTADO',result);
               
                    alert("Endereco salvo !");
                    window.location.reload();
                    //list_cliente();
                
            },
            error: function(erro) {
                $('#erro').html('');

            },

        });
        button.html('Salvar');
        button.attr('disabled', false);
        return false;
    }

    function endereco_form() {
        $('#modal-geral').modal('show');
        $('#modal-body-geral').html('Carregando....');
        $('#modal-geral-title').html('Criação de endereco');
        $('#modal-body-geral').load('/enderecos/form', function() {
            
        });
    }

</script>