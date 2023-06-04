<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Painel Administrativo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/fonts/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css" />
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.4.0.min.js"></script>
</head>

<body class="bg-slate-200">
	<header class="w-full bg-sky-950 h-16">
		<div class="container h-16 flex justify-between items-center mx-auto text-white">
			<span>[LOGO]</span>
			<nav class="font-medium">
				<a class="px-3 hover:text-slate-400" href="<?php echo BASE_URL; ?>">DASHBOARD</a>
				<a class="px-3 hover:text-slate-400" href="<?php echo BASE_URL; ?>boardrequests">SOLICITAÇÕES</a>
				<a class="px-3 hover:text-slate-400" href="<?php echo BASE_URL; ?>reports">RELATÓRIOS</a>
				<a class="px-3 hover:text-slate-400" href="<?php echo BASE_URL; ?>settings">CONFIGURAÇÕES</a>
			</nav>
			<span>
				<a class="hover:text-slate-400" href="<?php echo BASE_URL; ?>login/logout"><i class="fa-solid fa-right-from-bracket fa-lg"></i></a>
			</span>
		</div>
	</header>

	<main class="container mx-auto py-3">
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
	</main>
	<footer>
		Desenvolvido por: <a href="https://7upweb.com.br">7UpWeb Sistemas</a>
	</footer>
	<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>
</body>

</html>