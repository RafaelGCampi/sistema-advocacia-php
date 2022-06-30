<form id="post_criar_endereco_form" name="endereco_criar" method="POST" onsubmit="endereco_store(this)" action="#" enctype="multipart/form-data">
    <div >
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label class="col-form-label" for="cep">Cep:</label>
                    <input class="form-control" required data-cliente-id="" data-endereco-id="" id="cep" name="cep"
                           type="text" value=""
                           size="15" maxlength="10" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label class="col-form-label" for="rua">Rua:</label>
                    <input class="form-control" required name="rua" type="text" id="rua" size="60" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label class="col-form-label" for="bairro">Bairro:</label>
                    <input class="form-control" required name="bairro" type="text" id="bairro" size="40" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label class="col-form-label" for="cidade">Cidade:</label>
                    <input class="form-control" required name="cidade" type="text" id="cidade" size="40" required>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label class="col-form-label" for="uf">Estado:</label>
                    <input class="form-control" required name="uf" type="text" id="uf" size="2" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label class="col-form-label" for="complemento">Complemento:</label>
                    <input class="form-control" name="complemento" type="text" id="complemento" size="2">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label class="col-form-label" for="numero_casa">Número:</label>
                    <input class="form-control" name="numero_casa" type="text" id="numero_casa" required>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group ">
                    <label class="col-form-label" for="telefone_celular">Celular:</label>
                    <input class="form-control" required name="telefone_celular" type="text" id="telefone_celular" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="col-form-label" for="telefone_residencial">Telefone residêncial:</label>
                    <input class="form-control" name="telefone_residencial" type="text" id="telefone_residencial" required>
                </div>
            </div>

        </div>
        <div id="erro" class="alert-danger"></div>
        <button type="submit" class="button-padrao">Salvar</button>
    </div>
</form>
