<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?= base_url(); ?>assets/img/chave.png">
  <link href="<?= base_url(); ?>assets/css/login.css" rel="stylesheet">
  <title>Login | Clínica</title>

</head>

<body class="text-center">
  <form class="form-signin" method="post" action="<?= base_url()?>home/logar">
    <img class="mb-4" src="<?= base_url(); ?>assets/img/med.png" alt="" width="100" height="100">
    <h1 class="h3 mb-3 font-weight-normal">Bem-vindo!</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email..." required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha..." required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Lembre-me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
  </form>
</body>
</html>
