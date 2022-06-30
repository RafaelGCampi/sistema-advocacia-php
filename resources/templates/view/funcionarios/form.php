<form name="funcionario_form" onsubmit="funcionario_store(this)" action="#" enctype="multipart/form-data">
    <div class="form-group">
        <div class="modal-body">
            <label for="exampleFormControlSelect1">Tipo funcionario: </label>
            <select name="tipo_funcionario" class="form-control" id="situacaoSelect">
                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                <option value="ATENDENTE">ATENDENTE</option>
                <option value="ADVOGADO(A)">ADVOGADO(A)</option>
                <option value="ESTÁGIARIO">ESTÁGIARIO</option>
            </select>

            <label for="nome" class="col-form-label">Nome:</label>
            <input name="name" data-funcionario-id="" id="name" class="form-control" placeholder="Digite o nome"><br>

            <label for="email" class="col-form-label">Email:</label>
            <input type="text" name="email" id="cpf" class="form-control" placeholder="Digite "><br>

            <label for="email" class="col-form-label">Login:</label>
            <input type="text" name="login" id="login" class="form-control" placeholder="Digite "><br>

            <label for="senha" class="col-form-label">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite uma senha"><br>

    
            <strong>
                <div id="erro" class="alert alert-danger" hidden="true">

                </div>
            </strong>

        </div>

    </div>
    <button type="submit" class="button-padrao">Salvar</button>
</form>