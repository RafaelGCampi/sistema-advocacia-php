<div class="conteudo-funcionario">
    <h1>Funcionario</h1>

    <button id="criar-funcionario" type="submit" onclick="funcionario_form()" class="button-padrao">Cadastrar funcionario</button>
    <div id="tabela-funcionario">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo funcionario</th>
                    <th scope="col">Ultima ação</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>

            <tbody id="tabela-funcionario-body">

                <?php
                    foreach( $_REQUEST['funcionarios'] as $funcionario){
                        $acao = $funcionario->getAtivo()==1?'desativar':'ativar';
                        echo '
                                <tr>

                            <td>'.$funcionario->getNome().'</td>
                            <td>'.$funcionario->getEmail().'</td>
                            <td>'.$funcionario->getTipo_funcionario().'</td>
                            <td></td>
                            <td> <input name="2" type="checkbox" class="custom-control-input" checked="" disabled=""></td>
                            <td>

                                <button id="deletar2" class="button-padrao" onclick="funcionario_desativar('.$funcionario->getId().', `'.$acao.'`)" name="botaoDeletar">'.$acao.'</button>

                            </td>
                        </tr>
                        ';
                    }
                ?>
               
            </tbody>

        </table>

    </div>
</div>

<script>

function funcionario_store(el){
        event.preventDefault();
        let button = $('#salvar');
        let formData = new FormData(el);
        $.ajax({
            url: "/funcionarios/store",
            method: "POST",
            /* headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, */
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                alert("Salvo");
                window.location.reload();
            },
            error:function(erro){
                $('#erro').html('');
                
            },

        });
        return false;
    }
    function funcionario_desativar(funcionario_id,acao){
        if(confirm("Deseja "+acao+" funcionario?")) {
            $.ajax({
                url: "/funcionarios/desativar?funcionario_id="+funcionario_id+"&acao="+acao,
                method: "DELETE",
                /* headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, */

                success: function (result) {
                    window.location.reload();
                },
                error: function (erro) {

                },

            });
            return false;
        }
    }
    function funcionario_form(){
        event.preventDefault();
        $('#modal-geral').modal('show');
        $('#modal-body-geral').html('Carregando....');
        $('#modal-geral-title').html('Criação de funcionario');
        $('#modal-body-geral').load('/funcionarios/form');
    }

   


</script>