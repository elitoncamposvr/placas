<div class="content">
	<div class="breadcrumb">
		<h2>Alunos<i class="fas fa-angle-right fa-xs"></i>Importar Alunos<i class="fas fa-angle-right fa-xs"></i>Selecionar Turma</h2>
	</div>

	<?php foreach ($classes_list as $classes) : ?>
		<div class="table_data">
			<div class="table-40"><span class="table-title-mobile">Escola:</span><?php echo $classes['series_name']; ?>&ordf;</div>
			<div class="table-30"><span class="table-title-mobile">Escola:</span><?php echo $classes['name_class_students']; ?></div>
			<div class="table-30 table-options txt-right">
				<a class="btn" href="<?php echo BASE_URL; ?>students/imports_students/<?php echo $classes['id']; ?>">Selecionar Série</a>
			</div>
		</div>
	<?php endforeach; ?>

</div>