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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="endereco">Endereço: </label>
                        <input type="endereco" class="form-control" name="endereco" id="endereco" placeholder="Informe o endereço..." value="<?= $usuario[0]->endereco?>" required>
                    </div>
                </div>
                <div class="col-md-3">
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
                        <input type="button" class="btn btn-default btn-block" value="Alterar senha" data-toggle="modal" data-target="#myModal">
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
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="datanascimento">Data de nascimento: </label>
                        <input type="text" class="form-control" name="datanascimento" id="datanascimento" placeholder="00/00/0000" value="<?= date('d/m/Y',strtotime($usuario[0]->dataNascimento));?>" required>
                    </div>
                </div>
            </div>

            <div style="text-align: right">
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
            <br>

        </form>
    </main>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <form action="<?= base_url()?>usuario/alterar_senha" method="post">
             <input type="hidden" id="id" name="id" value="<?= $usuario[0]->id;?>">
             <div class="modal-content">
              <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Alterar Senha</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="senha_antiga">Senha antiga:</label>
                        <input type="password" name="senha_antiga" id="senha_antiga" onkeyup="checarSenha()" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="nova_senha">Nova senha:</label>
                        <input type="password" name="nova_senha" id="nova_senha" onkeyup="checarSenha()" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="confirmar_senha">Confirmar senha:</label>
                        <input type="password" name="confirmar_senha" id="confirmar_senha" onkeyup="checarSenha()" class="form-control">
                    </div>
                    <div class="col-md-12 form-group">
                     <div id="divcheck">

                     </div>
                 </div>
             </div>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary" id="enviarsenha" disabled>Salvar alterações</button>
        </div>
    </div>
</form>
</div>
</div>

<script>
    $(document).ready(function(){
        $("#nova_senha").keyup(checarSenha);
        $("#confirmar_senha").keyup(checarSenha);
    });
    function checarSenha(){
        var oldPassword = $("#senha_antiga").val();
        var password = $("#nova_senha").val();
        var confirmPassword = $("#confirmar_senha").val();

        if (password == '' || '' == confirmPassword || '' == oldPassword){
            $("#divcheck").html("<span style='color: orange'>Preencha todos os campos!</span>");
            document.getElementById("enviarsenha").disabled = true;
        }
        else if (password != confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Senhas não conferem!</span>");
            document.getElementById("enviarsenha").disabled = true;
        } else {
            $("#divcheck").html("<span style='color: green'>Senhas iguais!</span>");
            document.getElementById("enviarsenha").disabled = false;
        }
    }
</script>