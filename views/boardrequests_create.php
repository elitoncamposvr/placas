<div class="breadcrumb">
    <div class="breadcrumb-title">
        <span>Solicitações</span>
        <i class="fa-solid fa-angle-right breadcrumb-icon"></i>
        <span>Criar Solicitação</span>
    </div>
    <span>
        <a href="<?php echo BASE_URL; ?>boardrequests">Voltar</a>
    </span>
</div>

<form method="post">
    <div class="w-full mb-3">
        <label for="license_name">Nome</label>
        <input type="text" name="license_name" id="license_name" class="w-full">
    </div>
    <div class="w-full flex mb-5">
        <div class="w-1/5 pr-1">
            <label for="license_plate">Placa</label>
            <input type="text" name="license_plate" id="license_plate" class="w-full uppercase" maxlength="7" minlength="7" required autofocus>
        </div>
        <div class="w-1/5 pr-1">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" class="w-full" maxlength="11">
        </div>
        <div class="w-1/5 pr-1">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" class="w-full" maxlength="11">
        </div>
        <div class="w-2/5">
            <label for="plate_type">Tipo de Placa</label>
            <select name="plate_type" id="plate_type" class="w-full">
                <option value="1">Moto (Placa Única)</option>
                <option value="2">Carro (Placa Dianteira)</option>
                <option value="3">Carro (Placa Traseira)</option>
                <option value="4">Carro (Ambas Placas)</option>
            </select>
        </div>
    </div>
    <div class="w-full text-center">
        <button class="btn" type="submit">Enviar Solicitação</button>
    </div>
</form>