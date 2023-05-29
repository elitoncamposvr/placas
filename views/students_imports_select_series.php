<div class="content">
	<div class="breadcrumb">
		<h2>Alunos<i class="fas fa-angle-right fa-xs"></i>Importar Alunos<i class="fas fa-angle-right fa-xs"></i>Selecionar Série</h2>
	</div>

	<?php foreach ($series_list as $series) : ?>
		<div class="table_data">
			<div class="table-70"><span class="table-title-mobile">Escola:</span><?php echo $series['series_name']; ?>&ordf;</div>
			<div class="table-30 table-options txt-right">
				<a class="btn" href="<?php echo BASE_URL; ?>students/imports_selectclasses/<?php echo $series['id']; ?>">Selecionar Série</a>
			</div>
		</div>
	<?php endforeach; ?>

</div>