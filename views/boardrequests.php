<div class="breadcrumb">
	<span>Solicitações</span>
</div>

<div class="menu-data">
	<span>
		<a href="<?php echo BASE_URL; ?>boardrequests/create" class="btn hover:bg-sky-800">
			<i class="fa-solid fa-plus"></i>
			Nova Solicitação
		</a>
	</span>
	<div class="menu_data--right">
		<form class="form-search-right" action="<?php echo BASE_URL; ?>boardrequests/search">
			<span class="mb-2 w-100"><input type="text" class="w-100" name="sp" id="sp" placeholder="Pesquisar Solicitação" required></span>
		</form>
	</div>
</div>


<!-- Cabeçalho da Tabela (Table Header) -->
<div class="table-header">
	<div class="w-1/12">Código</div>
	<div class="w-1/12">Placa</div>
	<div class="w-2/12">Nome</div>
	<div class="w-1/12">Data</div>
	<div class="w-2/12">CPF</div>
	<div class="w-2/12">Telefone</div>
	<div class="w-1/12 text-center">Tipo</div>
	<div class="w-1/12 text-center">Status</div>
	<div class="w-1/12 text-right">Ação</div>
</div>


<!-- Dados da Tabela (Table Data) -->
<?php foreach ($requests_list as $rl) : ?>
	<div class="table-data hover:bg-slate-100">
		<div class="w-1/12">
			<?php echo $rl['id']; ?>
		</div>
		<div class="w-1/12">
			<?php echo $rl['license_plate']; ?>
		</div>
		<div class="w-2/12">
			<?php echo $rl['license_name']; ?>
		</div>
		<div class="w-1/12">
			<?php echo date('d/m/Y', strtotime($rl['request_date'])); ?>
		</div>
		<div class="w-2/12">
			<?php echo $rl['cpf']; ?>
		</div>
		<div class="w-2/12">
			<?php echo $rl['phone']; ?>
		</div>
		<div class="w-1/12">
			<?php
			$types = $rl['plate_type'];
			$plate_type = match ($types) {
				1 => 'Moto',
				2 => 'Carro Diant.',
				3 => 'Carro Tras.',
				4 => 'Carro Ambas',
			};
			echo ($plate_type);
			?>
		</div>
		<div class="w-1/12">
			<?php
			$st = $rl['status'];
			$status = match ($st) {
				1 => '<div class="badge badge-pending">Pendente</div>',
				2 => '<div class="badge badge-progress">Em Andamento</div>',
				3 => '<div class="badge badge-success">Concluído</div>',
				4 => '<div class="badge badge-canceled">Cancelado</div>',
			};
			echo ($status);
			?>
		</div>
		<div class="w-1/12">

		</div>
	</div>
<?php endforeach; ?>

<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>