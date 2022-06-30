
<form id="post_criar_form" name="post_criar_form" onsubmit="cliente_store(this)" action="#">
    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="nome" class="col-form-label">Nome:</label>
                    <input name="nome" data-cliente-id="" id="nome" class="form-control" placeholder="Digite um nome" required>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-4">
                <div class="form-group">
                    <label for="cpf" class="col-form-label">Cpf:</label>
                    <input name="cpf" id="cpf" class="form-control"
                           maxlength="14"
                          placeholder="Digite um cpf" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="data_nascimento" class="col-form-label">Data de nascimento:</label>
                    <input type="date" class="form-control" name="data_nascimento" id="data_nascimento">
                </div>
            </div>
            <div class="col-4">
                <div class="col-form-label"><strong>Genêro:</strong></div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="radio" name="genero" id="M" value="M">
                            <label for="M">Masculino</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="radio" name="genero" id="F" value="F">
                            <label for="F">Feminino</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="estado_civil" class="col-form-label">Estado civil:</label>
                    <input name="estado_civil" id="estado_civil" class="form-control" placeholder="Digite uma profisão">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="profissao" class="col-form-label">Profissão:</label>
                    <input name="profissao" id="profissao" class="form-control" placeholder="Digite um nome">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="escolaridade" class="col-form-label">Escolaridade:</label>
                    <input name="escolaridade" id="escolaridade" class="form-control" placeholder="Digite escolaridade">
                </div>
            </div>
        </div>
        <button type="submit" class="button-padrao">Salvar</button>

        <!-- @include('componente.endereco.endereco_form') -->
    </div>
    <div id="erro" class="alert alert-danger" hidden="true">

    </div>

</form>
