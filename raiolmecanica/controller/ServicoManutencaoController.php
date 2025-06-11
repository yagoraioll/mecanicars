<?php
require_once __DIR__ . '/../model/ServicoManutencao.php';

$dao = new ServicoManutencaoDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servico = new ServicoManutencao();
    $servico->nomeServico = $_POST['nomeServico'];
    $servico->tempoEstimadoHoras = $_POST['tempoEstimadoHoras'];
    $servico->custo = $_POST['custo'];
    $servico->tipoVeiculo = $_POST['tipoVeiculo'];

    if (!empty($_POST['id'])) {
        $servico->id = $_POST['id'];
        $dao->atualizar($servico);
    } else {
        $dao->inserir($servico);
    }

    header("Location: ../view/listaservicos.php");
    exit;
}

if (isset($_GET['delete'])) {
    $dao->excluir($_GET['delete']);
    header("Location: ../view/listaservicos.php");
    exit;
}
?>
