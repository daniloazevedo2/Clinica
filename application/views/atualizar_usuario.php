<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3>Atualizar Usuário</h1>
    </div>
    <br>
        <form class="form-control" action="<?= base_url() ?>usuario/salvar_atualizacao" method="post">
            <input type="hidden" id="id" name="id" value="<?= $usuario[0]->id;?>">
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="nome" class="form-control" name="nome" id="nome" placeholder="Informe o nome..." value="<?= $usuario[0]->nome?>" required>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cpf">CPF: </label>
                        <input type="cpf" class="form-control" name="cpf" id="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" onkeyup="somenteNumeros(this);" placeholder="Informe o CPF..." value="<?= $usuario[0]->cpf?>" required>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="endereco">Endereço: </label>
                        <input type="endereco" class="form-control" name="endereco" id="endereco" placeholder="Informe o endereço..." value="<?= $usuario[0]->endereco?>" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="nivel">Nível: </label>
                    <select id="nivel" class="form-control" name="nivel" required>
                        <option value="0"> --- </option>
                        <option value="1" <?= $usuario[0]->nivel==1?' selected ':'';?>> Administrador </option>
                        <option value="2" <?= $usuario[0]->nivel==2?' selected ':'';?>> Usuário </option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Informe o Email..." value="<?= $usuario[0]->email?>" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="senha">Senha: </label>
                        <input type="button" class="btn btn-default btn-block" value="Alterar senha" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="status">Status: </label>
                    <select id="status" class="form-control" name="status" required>
                        <option value="0"> ---</option>
                        <option value="1" <?= $usuario[0]->status==1?' selected ':'';?>> Ativo</option>
                        <option value="2" <?= $usuario[0]->status==2?' selected ':'';?>> Inativo</option>
                    </select>
                </div>
            </div>

            <div style="text-align: right">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
            <br>
        </form>
</main>

