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

$dao = new ServicoManutencaoDAO();
$servicos = $dao->listarTodos();
?>

<h2>Lista de Serviços de Manutenção</h2>
<a href="cadastroservico.php">Cadastrar Novo Serviço</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Tempo (h)</th>
        <th>Custo (R$)</th>
        <th>Tipo de Veículo</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($servicos as $s): ?>
    <tr>
        <td><?php echo $s->id; ?></td>
        <td><?php echo $s->nome_servico; ?></td>
        <td><?php echo $s->tempo_estimado_horas; ?></td>
        <td><?php echo number_format($s->custo, 2, ',', '.'); ?></td>
        <td><?php echo $s->tipo_veiculo; ?></td>
        <td>
            <a href="cadastroservico.php?id=<?php echo $s->id; ?>">Editar</a> |
            <a href="../controller/ServicoManutencaoController.php?delete=<?php echo $s->id; ?>" onclick="return confirm('Deseja realmenteeeeeeeeeeeeeeeeeeeee excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
