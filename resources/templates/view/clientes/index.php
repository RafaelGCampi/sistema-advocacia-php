<style>
    .parte-cep {
        padding: 0px !important;
    }
</style>
<?php $clientes = $_REQUEST['clientes']; ?>
<form id="cliente-pesquisar" name="cliente-pesquisar" action="#" type="POST" onsubmit="cliente_pesquisar()" enctype="multipart/form-data">
    <div class="row">
        <div class="col-10">
            <div class="input-group">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <input type="text" class="form-control" maxlength="14" id="pesquisa" name="pesquisa" placeholder="Pesquisa por CPF">

            </div>
        </div>
    </div>
</form>

<button type="button" class="button-padrao" data-toggle="modal" style="margin-top: 50px;" onclick="cliente_form()" data-target="#exampleModalCenter">Criar Cliente
</button>

<br>
<div id="modal">

</div>

<h3 class="tile-title">Listagem de Clientes</h3>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Clientes Ativos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Clientes Baixados</a>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div id="tabela-cliente">

        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div id="tabela-cliente-baixado">

        </div>
    </div>

</div>



<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Processo</th>
            <th scope="col">Observação</th>

            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody id="tbody-cliente">
        <?php
        foreach ($_REQUEST['clientes'] as $cliente) {
            $processo = $cliente->lastProcesso() ? $cliente->lastProcesso()->getProcesso() : '-';
            $obs = $cliente->lastProcesso() ? $cliente->lastProcesso()->getObservacao() : '-';
            echo '<tr>
                <td id="categoria">' . $cliente->getNome() . '</td>
                <td>' . $cliente->getCpf() . '</td>
                <td>' . $cliente->getData_nasc() . '</td>
                <td>' . $processo . '</td>
                <td>' . $obs . '</td>
                <td><button id="alterar" class="button-padrao" onclick="cliente_altera(' . $cliente->getId_cliente() . ')" data-cliente-id="">Alterar</button>
                    <button id="deletar1" class="button-padrao" onclick="cliente_deletar(' . $cliente->getId_cliente() . ')" name="botaoDeletar">Deletar</button>
                    <a href="/perfil-cliente?cliente_id=' . $cliente->getId_cliente() . '" class="button-padrao">Perfil</a>
                </td>
                </tr>
                ';
        }
        ?>
    </tbody>
</table>


<script defer>
    function cliente_store(el) {
        event.preventDefault();
        let button = $(el).find('button');
        console.log(button);
        button.attr('disabled', true);
        button.html('Salvando...');

        let formData = new FormData(el);

        $.ajax({
            url: "/enderecos/store",
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

    function cliente_deletar(id_cliente) {
        if (confirm('Deseja deletar cliente ?')) {
            let button = $('#deletar' + id_cliente);
            button.attr('disabled', true);
            button.html('Deletando...');
            $.ajax({
                url: "/clientes/delete?cliente_id=" + id_cliente,
                method: "DELETE",
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {
                    //list_cliente();
                    window.location.reload();
                    button.attr('disabled', false);
                    button.html('Deletar');
                }
            });
        }
        return false;
    }


    function mascaraCpf() {
        var key = window.event.key;
        var element = window.event.target;
        var isAllowed = /\d|Backspace|Tab|.|-/;
        if (!isAllowed.test(key)) window.event.preventDefault();

        var inputValue = element.value;
        inputValue = inputValue.replace(/(d{3}).(\d{3}).(\d{3})-(\d{2})/);

        element.value = inputValue;
    }

    function cliente_altera(id_cliente) {
        $('#modal-geral').modal('show');
        $('#modal-body-geral').html('Carregando....');
        $('#modal-geral-title').html('Criação de cliente');
        $('#modal-body-geral').load('/clientes/form', function() {

            $.ajax({
                url: "/clientes/edit?cliente_id=" + id_cliente,
                method: "GET",
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.cliente.sexo == "M") {
                        $('#M').prop('checked', true);
                    } else if (result.cliente.sexo == "F") {
                        $('#F').prop('checked', true);
                    }
                    $('#nome').val(result.cliente.nome);
                        $('#cpf').val(result.cliente.cpf);
                        $('#estado_civil').val(result.cliente.estado_civil);
                        $('#profissao').val(result.cliente.profissao);
                        $('#escolaridade').val(result.cliente.escolaridade);
                        $('#data_nascimento').val(result.cliente.data_nasc);
                    $('#post_criar_form').attr('onsubmit', 'cliente_update(this,' + id_cliente + ')');

                },
                error: function(erro) {

                },

            });
        });
    }

    function cliente_update(el,cliente_id) {
        event.preventDefault();
        let button = $(el).find('button');
        console.log(button);
        button.attr('disabled', true);
        button.html('Salvando...');

        let formData = new FormData(el);
       
        $.ajax({
            url: "/clientes/update?cliente_id="+cliente_id,
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

    function cliente_form() {
        $('#modal-geral').modal('show');
        $('#modal-body-geral').html('Carregando....');
        $('#modal-geral-title').html('Criação de cliente');
        $('#modal-body-geral').load('/clientes/form', function() {

        });
    }
</script>