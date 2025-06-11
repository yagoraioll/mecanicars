CREATE DATABASE IF NOT EXISTS raiolmecanica;
USE raiolmecanica;

CREATE TABLE IF NOT EXISTS servico_manutencao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_servico VARCHAR(100) NOT NULL,
    tempo_estimado_horas INT NOT NULL,
    custo DECIMAL(10,2) NOT NULL,
    tipo_veiculo VARCHAR(50) NOT NULL
);
