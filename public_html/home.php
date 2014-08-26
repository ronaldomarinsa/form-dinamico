<?php
    use JRP\HTML\Alert\Alert;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulário básico</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container">

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $mail = $_POST['mail'];

            if(!empty($nome) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $alert =  alert::success('<b>Sucesso!</b><br />Seu e-mail foi cadastrado em nossa newsletter!');
            } else {
                $alert =  alert::error('<b>Ops, algo deu errado!</b><br />Por favor, insira um e-mail válido!');
            }

            echo "<div class=\"form-result\">{$alert}</div>";
        }

        echo $formulario->render();
    ?>

</div> <!-- /container -->

</body>
</html>
