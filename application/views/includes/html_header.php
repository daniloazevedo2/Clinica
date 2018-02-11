
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/med.png">

    <title>Clínica</title>

    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/dashboard.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/sub.css" rel="stylesheet">
  

</head>

<body>
    <script>
        function formatar(mascara, documento) {
            var i = documento.value.length;
            var saida = mascara.substring(0, 1);
            var texto = mascara.substring(i)

            if (texto.substring(0, 1) != saida) {
                documento.value += texto.substring(0, 1);

            }

        }
        function somenteNumeros(num) {
            var er = /[^0-9.-]/;
            er.lastIndex = 0;
            var campo = num;
            if (er.test(campo.value)) {
                campo.value = "";
            }
        }
    </script>