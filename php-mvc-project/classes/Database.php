<?php
// ===================================================
// Database.php — Class untuk koneksi database
// ===================================================

class Database {
    private static ?Database $instance = null;
    public  ?PDO   $pdo = null;

    private string $host   = 'localhost';
    private string $dbname = 'akuatmin_db';
    private string $user   = 'root';
    private string $pass   = '';
    private string $charset = 'utf8mb4';

    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            // Koneksi gagal — simpan error, jangan expose ke user
            error_log('DB Connection failed: ' . $e->getMessage());
            $this->pdo = null;
        }
    }

    /**
     * Singleton — satu koneksi per request
     */
    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Ambil objek PDO langsung
     */
    public static function getConnection(): ?PDO {
        return self::getInstance()->pdo;
    }

    /**
     * Jalankan query SELECT, kembalikan array hasil
     */
    public function query(string $sql, array $params = []): array {
        if (!$this->pdo) return [];
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Jalankan query SELECT, kembalikan satu baris
     */
    public function queryOne(string $sql, array $params = []): array|false {
        if (!$this->pdo) return false;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    /**
     * Jalankan INSERT / UPDATE / DELETE
     * Kembalikan jumlah baris yang terpengaruh
     */
    public function execute(string $sql, array $params = []): int {
        if (!$this->pdo) return 0;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    /**
     * Ambil ID terakhir yang di-insert
     */
    public function lastInsertId(): string {
        return $this->pdo ? $this->pdo->lastInsertId() : '0';
    }

    // Cegah clone & unserialize (Singleton)
    private function __clone() {}
    public function __wakeup() {}
}
