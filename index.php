<?php
require_once __DIR__ . "/vendor/autoload.php";
require "App/Config.php";

$Read = new App\Conn\Read;
$Create = new App\Conn\Create;

$Read->allRead("user");

$arrUser = [
    "name" => "Bart Simpson",
    "email" => "bart@teste.com.br",
    "sexo" => "Masculino"
];
// $Create->goCreate("user", $arrUser);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo PHP Singleton</title>

    <link rel="stylesheet" href="./Assets/Style/Boot.css">
    <link rel="stylesheet" href="./Assets/Style/Style.css">
    <link rel="stylesheet" href="./Assets/Style/Icons.css">
    <link rel="stylesheet" href="./Assets/Style/sendModal.css">
</head>

<body>
    <?php require $imgModal . "modal-send-form.php"; ?>

    <div class="container-1280 grid-container">
        <div class="box50 p60">
            <div class="border-line">
                <?php if ($Read->getRowCount() > 0) { ?>
                    <?php foreach ($Read->getResult() as $user) { ?>
                        <div class="zebra-striped grid-container">
                            <div class="box70">
                                <p class="icon-user"><strong>Nome:</strong> <?= ucfirst($user["name"]); ?></p>
                                <p class="icon-email"><strong>E-mail:</strong> <?= $user["email"]; ?></p>
                                <p class="icon-genre"><strong>Sexo:</strong> <?= $user["sexo"]; ?></p>
                            </div>
                            <div class="box30 update_delete_form">
                                <form method="POST" action="" class="send_form_update">
                                    <input type="hidden" name="key-form" value="form-update">
                                    <input type="hidden" name="id" value="<?= $user["id"]; ?>">
                                    <button value="" class="icon-edit js_edit box-transition"></button>
                                </form>
                                <form method="POST" action="" class="send_form_delete">
                                    <input type="hidden" name="key-form" value="form-delete">
                                    <input type="hidden" name="id" value="<?= $user["id"]; ?>">
                                    <button value="" class="icon-delet js_delet box-transition"></button>
                                </form>
                                <!-- <p class="icon-delet icon-notext"></p> -->
                            </div>
                            <div class="clear-both"></div>

                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div style='color: #FEEAEA; background: #d12121; border:1px solid #7C1515; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                        Opsss... :-( Não encontramos nenhum usuário cadastrado. Cadastre-se ao lado
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="box50 p60">
            <form method="POST" action="" class="send_form">

                <input type="hidden" name="key-form" value="form-general">
                <!-- <input type="hidden" name="by-form" value="by-form"> -->

                <label>
                    <input type="text" name="name" placeholder="Informe seu nome: *" required>
                </label>
                <label>
                    <input type="email" name="email" placeholder="Informe seu e-mail: *" required>
                </label>
                <label>
                    <select name="sexo" required>
                        <option value="masculino" selected>Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </label>
                <button class="bt-blue box-transition">Cadastrar</button>
            </form>
        </div>
        <div class="clear"></div>

    </div>
    <!-- <div class="container-1280">
        <?php if ($Create->getResult()) { ?>
            <div style='color: #fff; background: #00d33f; border:1px solid #14b74d; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                Uhuuu... Cadastro realizado com sucesso!!!
            </div>
        <?php } else { ?>
            <div style='color: #FEEAEA; background: #d12121; border:1px solid #7C1515; padding: 10px; font-family: Calibri, sans-serif; border-radius: 5px;'>
                Opsss... :-( Erro ao cadastrar o usuário. Tente novamente!
            </div>
        <?php } ?>
    </div> -->


    <!--SCRIPTS-->
    <script src="Assets/Js/jquery.js"></script>
    <script src="Assets/Js/send-form.js"></script>
</body>

</html>