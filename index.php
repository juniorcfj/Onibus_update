<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Passagem</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body class="body-index">
    <div class="passagem-bg">
        <h1>Compra de Passagem</h1>
        <form class="compra_form" id="compraForm" action="comprar_passagem.php" method="POST">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>
            <label for="CPF">CPF</label>
            <input type="text" id="CPF" name="CPF" required>
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" required>
            <label for="data_compra">Data de Compra</label>
            <input type="date" id="data_compra" name="data_compra" required>
            <label for="opcaoValor">Viagem</label>
            <select id="opcaoValor" name="opcaoValor" required>
                <option value="a-b">De A para B (R$10,00)</option>
                <option value="a-c">De A para C (R$20,00)</option>
            </select>
             <div class="info-section">
            <h2>Informações do Motorista</h2>
            <p>Nome: <?php echo $motorista->nome; ?></p>
            <p>CNH: <?php echo $motorista->cnh; ?></p>

            <h2>Informações do Ônibus</h2>
            <p>Modelo: <?php echo $onibus->modelo; ?></p>
            <p>Placa: <?php echo $onibus->placa; ?></p>

            <h2>Informações das Viagens</h2>
            <p>Origem: <?php echo $viagemAB->origem; ?> - Destino: <?php echo $viagemAB->destino; ?> - Valor: R$<?php echo $viagemAB->valor; ?></p>
            <p>Origem: <?php echo $viagemAC->origem; ?> - Destino: <?php echo $viagemAC->destino; ?> - Valor: R$<?php echo $viagemAC->valor; ?></p>
        </div>
            <button type="submit" id="comprarButton">Comprar Passagem</button>
        </form>
    </div>
</body>
</html>
