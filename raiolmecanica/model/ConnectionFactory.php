<?php
class ConnectionFactory {
    private static $conn;

    public static function getConnection() {
        if (!self::$conn) {
            try {
                self::$conn = new PDO("mysql:host=localhost;dbname=raiolmecanica", "root", "");
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>
