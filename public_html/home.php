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
        $validator->setMsgSuccess('Seu e-mail foi cadastrado com sucesso em nossa newsletter!');

        // Validação dos campos

        $validator->setCampo('nome')->minChar(5)->obrigatorio();
        $validator->setCampo('mail')->obrigatorio()->email();

        $validator->showMsgsAfterRequest('form-result');

        echo $form->render();
    ?>

</div> <!-- /container -->

</body>
</html>
