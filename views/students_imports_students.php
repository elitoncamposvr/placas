<div class="content">
    <div class="breadcrumb">
        <h2>Alunos<i class="fas fa-angle-right fa-xs"></i>Importar Alunos<i class="fas fa-angle-right fa-xs"></i>Selecionar Arquivo</h2>
    </div>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="series_id" value="<?php echo $series_info['series_id']; ?>">
        <input class="w-80" type="file" name="alunos" id="alunos" required accept=".csv">
        <button type="submit">Enviar Arquivo</button>
    </form>

</div>