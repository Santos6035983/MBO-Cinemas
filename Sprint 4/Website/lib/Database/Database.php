<?php
abstract class AbstractDatabase {
    protected $host = 'localhost';
    protected $db_name = 'mbo_cinemas';
    protected $username = 'root';
    protected $password = '';
    protected $conn;

    abstract protected function connect();

    public function sanitize($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }
}

class Database extends AbstractDatabase {
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }

    public function create($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }

    public function read($table, $conditions = []) {
        $query = "SELECT * FROM $table";
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", array_map(function($key) {
                return "$key = :$key";
            }, array_keys($conditions)));
        }
        $stmt = $this->conn->prepare($query);
        $stmt->execute($conditions);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function($row) {
            return array_map([$this, 'sanitize'], $row);
        }, $results);
    }

    public function update($table, $data, $conditions) {
        $set = implode(", ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($data)));
        $where = implode(" AND ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($conditions)));
        $query = "UPDATE $table SET $set WHERE $where";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(array_merge($data, $conditions));
    }

    public function delete($table, $conditions) {
        $where = implode(" AND ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($conditions)));
        $query = "DELETE FROM $table WHERE $where";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($conditions);
    }
}
?>