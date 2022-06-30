    <h1>Meus Dados</h1>
    <form name="atualizar-dados-funcionario" method="POST" action="http://localhost:8080/funcionario/atualiza-dados">
        <h3>Atualizar dados</h3>
        <input type="hidden" name="_token" value="RgKgexYWBaEsRuMui2oOVtOxSbR0WQQtfmjkZauM">
        <div class="form-group">
            <label for="nome" class="col-form-label">Tipo Acesso:</label>
            <select data-funcionario-id="1" class="form-control" value="Admin">
                <option value="ADMINISTRADOR" selected="" disabled="">ADMINISTRADOR</option>
            </select>
            <br>

            <label for="nome" class="col-form-label">Nome:</label>
            <input name="name" data-funcionario-id="" id="name" class="form-control" value="Admin" placeholder="Digite o nome"><br>

            <label for="email" class="col-form-label">Email:</label>
            <input type="text" name="email" id="cpf" class="form-control" value="admin@medeirosadvogadas.com.br" placeholder="Digite o email"><br>
        </div>
        <button type="submit" class="button-padrao">Atualizar dados</button>
    </form>

    <form name="atualizar-senha-funcionario" method="POST" action="http://localhost:8080/funcionario/atualiza-senha">
        <h3>Atualizar senha</h3>
        <input type="hidden" name="_token" value="RgKgexYWBaEsRuMui2oOVtOxSbR0WQQtfmjkZauM">
        <input type="text" name="email" hidden="" value="admin@medeirosadvogadas.com.br" placeholder="Digite o email"><br>
        <div class="form-group">



            <label for="new_password" class="col-form-label">Nova senha</label>
            <input class="form-control" name="password" id="new_password" type="password"><br>

            <label for="password_confirmation" class="col-form-label">Confirmar nova senha</label>
            <input class="form-control" name="password_confirmation" id="password_confirmation" type="password"><br>


        </div>
        <button type="submit" class="button-padrao">Atualizar Senha</button>
    </form>