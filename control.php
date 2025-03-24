<?php
include ('viagem.php');

// Verificando se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $distancia = $_POST['distancia'];  // em km
    $consumo = $_POST['consumo'];      // em km/l
    $preco_combustivel = $_POST['preco_combustivel'];  // preço por litro
    
    if (is_numeric($preco_combustivel)) {
        // Calcular o custo da viagem
        if ($consumo > 0) {
            $litros_necessarios = $distancia / $consumo;  // Litros necessários para a viagem
            $custo_total = $litros_necessarios * $preco_combustivel;  // Cálculo do custo
        } else {
            $custo_total = 0;
        }
    } else {
        $erro = "Erro: O preço do combustível não é válido. Por favor, insira um valor numérico.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cálculo de Custo</title>
    
    <!-- Inclusão do arquivo CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($custo_total)): ?>
            <div class="resultado-container">
                <h3>Cálculo do Custo da Viagem</h3>
                <p>Distância: <span class="valor"><?php echo $distancia; ?> km</span></p>
                <p>Consumo do Veículo: <span class="valor"><?php echo $consumo; ?> km/l</span></p>
                <p>Preço do Combustível: <span class="valor">R$ <?php echo number_format($preco_combustivel, 2, ',', '.'); ?> por litro</span></p>
                <p>Custo Total da Viagem: <span class="valor">R$ <?php echo number_format($custo_total, 2, ',', '.'); ?></span></p>
            </div>
        <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($erro)): ?>
            <div class="erro-container">
                <p class="erro"><?php echo $erro; ?></p>
            </div>
        <?php else: ?>
            <p>Preencha o formulário para calcular o custo da viagem.</p>
        <?php endif; ?>
    </div>
</body>
</html>
