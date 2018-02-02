<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuários</h1>

       <div class="col-md-2">
           <a class="btn btn-primary my-2" href="<?= base_url(); ?>usuario/cadastro">Novo Usuário</a>
       </div>
  </div>
  <div class="col-md-12">
  	<table class="table table-striped">
  		<tr>
  			<th>ID</th>
  			<th>Nome</th>
  			<th>Email</th>
  			<th>Nivel</th>
  			<th>Status</th>  	
  			<th></th>
  			<th></th>		
  		</tr>
  		<?php foreach($usuario as $usu) { ?>
  		<tr>
  			<td><?= $usu->id; ?></td>
  			<td><?= $usu->nome; ?></td>
  			<td><?= $usu->email; ?></td>
  			<td><?= $usu->nivel==1?'Administrador':'Usuário'; ?></td>
  			<td><?= $usu->status==1?'Ativo':'Invativo'; ?></td>
  			<td>
  				<a href="<?= base_url('usuario/atualizar/'.$usu->id) ?>" class="btn btn-primary btn-group">Atualizar</a>
  				<a href="<?= base_url('usuario/excluir/'.$usu->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir este usuario?');">Remover</a>
  			</td>
  		</tr>
  		<?php }?>
  	</table>
  	
  </div>
</main>