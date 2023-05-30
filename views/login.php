<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Painel Administrativo - Entrar</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/images/favicon.ico">
    <script defer src="<?php echo BASE_URL; ?>assets/plugins/fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css" />
</head>

<body class="h-screen w-full bg-slate-300 flex justify-center items-center">
    <div class="w-96 mx-auto bg-white p-3 shadow-md rounded-lg">
        <form method="POST">
            <?php if (isset($error) && !empty($error)) : ?>
                <div class="warning"><?php echo $error; ?></div>
            <?php endif; ?>
            <h1 class="py-3 text-center">[LOGO OU SLOGAN]</h1>
            <h2 class="font-semibold text-center p-3">Entrar no sistema</h2>
            <div class="w-full mb-5">
                <label for="email">E-mail</label>
                <input class="w-full p-2 border rounded-md" type="email" name="email" id="email" required autofocus>
            </div>
            <div class="w-full mb-8">
                <label for="email">Senha</label>
                <input class="w-full p-2 border rounded-md" type="password" name="password" id="password" required>
            </div>
            <div class="w-full mb-4">
                <button class="w-full bg-sky-700 rounded-md p-2 text-white" type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>

</html>