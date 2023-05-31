<div class="breadcrumb">
	<div class="breadcrumb-title">
		<span>Solicitações</span>
		<i class="fa-solid fa-angle-right breadcrumb-icon"></i>
		<span>Criar Solicitação</span>
	</div>
</div>

<div class="menu-data">
	<span>
		<a href="<?php echo BASE_URL; ?>boardrequests/create" class="btn hover:bg-sky-800">
			<i class="fa-solid fa-plus"></i>
			Nova Solicitação
		</a>
	</span>
	<div class="w-1/4">
		<form class="form-search-right" method="post" action="<?php echo BASE_URL; ?>boardrequests/search">
			<span class="mb-2 w-100">
				<input type="text" class="w-full" name="request_search" id="request_search" minlength="2" placeholder="Pesquisar Solicitação" required>
			</span>
			<p class="text-xs font-medium text-slate-600">* Pesquise por PLACA, NOME ou CPF</p>
		</form>
	</div>
</div>

<?php if ($requests_list) : ?>
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
			<div class="w-1/12 text-right">
				<?php if ($rl['status'] == 1) : ?>
					<a class="mx-1" onclick="return confirm('Deseja realmente cancelar?')" href="<?php echo BASE_URL; ?>boardrequests/cancel/<?php echo $rl['id']; ?>">
						<i class="fa-solid fa-ban"></i>
					</a>
				<?php endif; ?>
				<a href="<?php echo BASE_URL; ?>boardrequests/show/<?php echo $rl['id']; ?>">
					<i class="fa-solid fa-up-right-from-square"></i>
				</a>

			</div>
		</div>
	<?php endforeach; ?>

	<?php if ($p_count > 1) { ?>
		<div class="pagination">
			<a class="pagination-item hover:pagination-active" href="<?php echo BASE_URL; ?>boardrequests?p=1">Primeira</a>
			<?php
			for ($q = $p - 5; $q <= $p - 1; $q++) {
				if ($q >= 1) { ?>
					<a class="pagination-item hover:pagination-active" href="<?php echo BASE_URL; ?>boardrequests?p=<?php echo $q; ?>"><?php echo $q; ?></a>
			<?php }
			} ?>
			<div class="pagination-item pagination-active "><?php echo "$q"; ?></div>
			<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
				if ($q <= $p_count) { ?>
					<a class="pagination-item hover:pagination-active" href="<?php echo BASE_URL; ?>boardrequests?p=<?php echo $q; ?>"><?php echo $q; ?></a>
			<?php }
			}
			?>
			<a class="pagination-item hover:pagination-active" href="<?php echo BASE_URL; ?>boardrequests?p=<?php echo $p_count; ?>">Última</a>
		</div>
	<?php } ?>

<?php else : ?>
	<div class="flash-info">
		<p><i class="fas fa-exclamation-circle fa-2x text-sky-700 px-1"></i></p><span>Nenhum registro encontrado!</span>
	</div>
<?php endif; ?>

<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>