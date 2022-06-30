<form id="post_criar_processo_form" name="post_criar_processo_form" onsubmit="processo_store(this)" action="#" method="POST">
    <div class="form-group">
        <div class="modal-body">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="data_limite" data-cliente-id="" class="col-form-label">Data limite:</label>
                        <input class="form-control" type="date" name="date" id="data_limite">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="processo" data-cliente-id="" class="col-form-label">Processo:</label>
                        <select name="processo" data-cliente-id="1" data-processo-id="" class="form-control" id="processo">
                            <option value="1">Administrativo</option>
                            <option value="3">Arquivo</option>
                            <option value="2">Jurídico</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="grupo_tipo_processo" class="form-group">
                <label for="exampleFormControlSelect1">Tipo de processo: </label>
                <select name="tipo_processo" class="form-control" id="tipo_processo">
                    <option value="9">Alt. Local ou Forma Pgto</option>
                    <option value="2">Apos. Idade Rural</option>
                    <option value="3">Apos. Idade Urbana</option>
                    <option value="1">Apos. Pessoa com Def. Por Idade</option>
                    <option value="4">Apos. Tempo Cont</option>
                    <option value="7">Apresentar Defesa - MOB</option>
                    <option value="8">Apuração Bat. Contínuo / MDS</option>
                    <option value="18">Aux. Reclusão</option>
                    <option value="19">Aux. Reclusão</option>
                    <option value="17">Benefício Assist. ao Idoso</option>
                    <option value="10">Cadastrar ou Renovar Procuração</option>
                    <option value="5">Cancelar CTC</option>
                    <option value="21">Cópia de Processo</option>
                    <option value="6">CTC</option>
                    <option value="15">Pedido de Prorrog. com Doc. Médico</option>
                    <option value="20">Pensão</option>
                    <option value="11">Reativar Benefício</option>
                    <option value="22">Recurso</option>
                    <option value="23">Revisão</option>
                    <option value="24">Revisão de CTC</option>
                    <option value="16">Solicitação de Acréscimo de 25 %</option>
                    <option value="12">Solicitar Cert. Inexistência Dep. Habil. Pensão</option>
                    <option value="13">Solicitar Desistência do Benefício</option>
                    <option value="14">Solicitar Pgto de Benefício Não Recebido</option>
                </select>
            </div>


            <div class="form-group">
                <label for="exampleFormControlSelect1">Situação: </label>
                <select name="situacao" class="form-control" id="situacaoSelect">
                    <option value="3">ANÁLISE</option>
                    <option value="7">ANDAMENTO</option>
                    <option value="5">CANCELADA</option>
                    <option value="1">CONCEDIDO</option>
                    <option value="9">CONCLUÍDO</option>
                    <option value="6">CUMPRIDO</option>
                    <option value="8">EXIGÊNCIA INTERNA</option>
                    <option value="2">EXIGÊNGIA</option>
                    <option value="4">INDEFIRIDO</option>
                </select>
            </div>



            <div class="form-group">
                <label for="observacao" class="col-form-label">Observação:</label>
                <textarea name="observacao" id="observacao" class="form-control" placeholder="Digite "></textarea>
            </div>
        </div>
    </div>


    <div id="erro" class="alert-danger"></div>
    <button type="submit" class="button-padrao">Salvar</button>

</form>