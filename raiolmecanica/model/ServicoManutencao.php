<?php
require_once "ConnectionFactory.php";

class ServicoManutencao {
    public $id;
    public $nomeServico;
    public $tempoEstimadoHoras;
    public $custo;
    public $tipoVeiculo;
}

class ServicoManutencaoDAO {
    private $conn;

    public function __construct() {
        $this->conn = ConnectionFactory::getConnection();
    }

    public function inserir(ServicoManutencao $s) {
        $stmt = $this->conn->prepare("INSERT INTO servico_manutencao (nome_servico, tempo_estimado_horas, custo, tipo_veiculo) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$s->nomeServico, $s->tempoEstimadoHoras, $s->custo, $s->tipoVeiculo]);
    }

    public function listarTodos() {
        $stmt = $this->conn->query("SELECT * FROM servico_manutencao");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM servico_manutencao WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar(ServicoManutencao $s) {
        $stmt = $this->conn->prepare("UPDATE servico_manutencao SET nome_servico = ?, tempo_estimado_horas = ?, custo = ?, tipo_veiculo = ? WHERE id = ?");
        return $stmt->execute([$s->nomeServico, $s->tempoEstimadoHoras, $s->custo, $s->tipoVeiculo, $s->id]);
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM servico_manutencao WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
