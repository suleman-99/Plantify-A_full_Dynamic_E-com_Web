<?php
if (!class_exists('DB')) {
    class DB {
        private $conn;

        public function __construct($server, $db) {
            $connectionInfo = [
                "Database" => $db,
                "TrustServerCertificate" => true
            ];

            $this->conn = sqlsrv_connect($server, $connectionInfo);

            if (!$this->conn) {
                die("Database connection failed: " . print_r(sqlsrv_errors(), true));
            }
        }

        public function query($sql) {
            $stmt = sqlsrv_query($this->conn, $sql, [], ["Scrollable" => SQLSRV_CURSOR_KEYSET]);
            if ($stmt === false) {
                die("SQL Error: " . print_r(sqlsrv_errors(), true));
            }
            return new DBResult($stmt);
        }

        public function prepare($sql) {
            return new DBStatement($this->conn, $sql);
        }

        public function close() {
            sqlsrv_close($this->conn);
        }
    }

    class DBResult {
        private $stmt;
        public $num_rows;

        public function __construct($stmt) {
            $this->stmt = $stmt;
            $this->num_rows = sqlsrv_num_rows($stmt);
        }

        public function fetch_assoc() {
            return sqlsrv_fetch_array($this->stmt, SQLSRV_FETCH_ASSOC);
        }
    }

    class DBStatement {
        private $conn;
        private $sql;
        private $params = [];
        private $stmt;

        public function __construct($conn, $sql) {
            $this->conn = $conn;
            $this->sql = $sql;
        }

        // MySQLi style bind_param
        public function bind_param($types, &...$vars) {
            $this->params = $vars;
        }

        public function execute() {
            $this->stmt = sqlsrv_prepare($this->conn, $this->sql, $this->params);
            if ($this->stmt === false) {
                die("SQL Prepare Error: " . print_r(sqlsrv_errors(), true));
            }
            if (!sqlsrv_execute($this->stmt)) {
                die("SQL Execute Error: " . print_r(sqlsrv_errors(), true));
            }
            return true;
        }

        public function get_result() {
            $this->stmt = sqlsrv_prepare($this->conn, $this->sql, $this->params, ["Scrollable" => SQLSRV_CURSOR_KEYSET]);
            if ($this->stmt === false) {
                die("SQL Prepare Error: " . print_r(sqlsrv_errors(), true));
            }
            if (!sqlsrv_execute($this->stmt)) {
                die("SQL Execute Error: " . print_r(sqlsrv_errors(), true));
            }
            return new DBResult($this->stmt);
        }

        public function close() {
            if (isset($this->stmt) && $this->stmt) {
                sqlsrv_free_stmt($this->stmt);
            }
        }
    }
}

// === Actual connection ===
$conn = new DB("DESKTOP-1KIUUIV", "plantify");
?>
