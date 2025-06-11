<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Raiol Mecânica</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
require_once '../model/ServicoManutencao.php';

$servico = null;
if (isset($_GET['id'])) {
    $dao = new ServicoManutencaoDAO();
    $servico = $dao->buscarPorId($_GET['id']);
}
?>

<h2><?php echo $servico ? "Editar Serviço" : "Cadastrar Serviço"; ?></h2>
<form method="post" action="../controller/ServicoManutencaoController.php">
    <?php if ($servico): ?>
        <input type="hidden" name="id" value="<?php echo $servico->id; ?>">
    <?php endif; ?>
    <label>Nome do Serviço:</label><br>
    <input type="text" name="nomeServico" value="<?php echo $servico->nome_servico ?? ''; ?>" required><br>

    <label>Tempo Estimado (horas):</label><br>
    <input type="number" name="tempoEstimadoHoras" value="<?php echo $servico->tempo_estimado_horas ?? ''; ?>" required><br>

    <label>Custo:</label><br>
    <input type="number" step="0.01" name="custo" value="<?php echo $servico->custo ?? ''; ?>" required><br>

    <label>Tipo de Veículo:</label><br>
    <input type="text" name="tipoVeiculo" value="<?php echo $servico->tipo_veiculo ?? ''; ?>" required><br><br>

    <input type="submit" value="Salvar">
</form>
<a href="listaservicos.php">Voltar à Lista</a>

</body>
</html>
