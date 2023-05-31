<div class="breadcrumb">
    <div class="breadcrumb-title">
        <span>Solicitações</span>
        <i class="fa-solid fa-angle-right breadcrumb-icon"></i>
        <span>Visualizar</span>
    </div>
    <span>
        <a href="<?php echo BASE_URL; ?>boardrequests">Voltar</a>
    </span>
</div>

<div class="w-full flex my-4">
    <div class="w-1/5">
        <span class="font-semibold">
            Solicitação nº:
        </span>
        <?php echo $request_info['id']; ?>
    </div>
    <div class="w-3/5">
        <span class="font-semibold">
            Nome:
        </span>
        <?php echo $request_info['license_name']; ?>
    </div>
    <div class="w-1/5">
        <span class="font-semibold">
            Placa:
        </span>
        <?php echo $request_info['license_plate']; ?>
    </div>
</div>
<div class="w-full flex mb-5">
    <div class="w-1/5">
        <span class="font-semibold">
            Data:
        </span>
        <?php echo date('d/m/Y', strtotime($request_info['request_date'])); ?>
    </div>
    <div class="w-1/5">
        <span class="font-semibold">
            CPF nº:
        </span>
        <?php echo $request_info['cpf']; ?>
    </div>
    <div class="w-1/5">
        <span class="font-semibold">
            Telefone:
        </span>
        <?php echo $request_info['phone']; ?>
    </div>
    <div class="w-1/5">
        <span class="font-semibold">
            Tipo:
        </span>
        <?php
        $types = $request_info['plate_type'];
        $plate_type = match ($types) {
            1 => 'Moto',
            2 => 'Carro Dianteira',
            3 => 'Carro Traseira',
            4 => 'Carro Ambas',
        };
        echo ($plate_type);
        ?>
    </div>
    <div class="w-1/5">
        <span class="font-semibold">
            Status:
        </span>
        <?php
        $st = $request_info['status'];
        $status = match ($st) {
            1 => '<span class="badge badge-pending">Pendente</span>',
            2 => '<span class="badge badge-progress">Em Andamento</span>',
            3 => '<span class="badge badge-success">Concluído</span>',
            4 => '<span class="badge badge-canceled">Cancelado</span>',
        };
        echo ($status);
        ?>
    </div>
</div>
<div class="w-full flex justify-center items-center">
    <?php if ($request_info['status'] == 1) : ?>
        <span class="px-1">
            <a href="<?php echo BASE_URL; ?>boardrequests/update/<?php echo $request_info['id']; ?>" class="btn"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
        </span>
        <span class="px-1">
            <a onclick="return confirm('Deseja realmente cancelar?')" href="<?php echo BASE_URL; ?>boardrequests/cancel/<?php echo $request_info['id']; ?>" class="btn-cancel"><i class="fa-solid fa-ban"></i> Cancelar</a>
        </span>
    <?php endif ?>
    <span class="px-1">
        <a href="#" class="btn-secondary"><i class="fa-solid fa-print"></i> Imprimir</a>
    </span>
</div>