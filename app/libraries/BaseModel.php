<?php

class BaseModel
{
    protected $pdo; // Stores the database connection object
    protected $table; // Stores the name of the table being interacted with

    // Initializes the database connection and sets the table name
    public function __construct($table)
    {
        $this->pdo = (new Database())->getConnection(); // this is pdo
        $this->table = $table;
    }


    /**
     * Dynamic SELECT query based on given parameters.
     */
    public function dynamicSelect(string $table, array $conditions = [], string $orderBy = '', string $order = 'ASC', int $limit = null, bool $singleRow = false): ?array {
        // Start building the SQL query
        $sql = "SELECT * FROM $table";

        // Add WHERE conditions if provided
        if (!empty($conditions)) {
            $whereClauses = [];
            foreach ($conditions as $field => $value) {
                $whereClauses[] = "$field = :$field";
            }
            $sql .= ' WHERE ' . implode(' AND ', $whereClauses);
        }

        // Add ORDER BY if specified
        if ($orderBy) {
            $sql .= " ORDER BY $orderBy $order";
        }

        // Add LIMIT if specified
        if ($limit) {
            $sql .= " LIMIT :limit";
        } elseif ($singleRow) {
            $sql .= " LIMIT 1";
        }

        // Prepare the statement
        $stmt = $this->pdo->prepare($sql);

        // Bind the WHERE condition values
        foreach ($conditions as $field => &$value) {
            $stmt->bindParam(":$field", $value);
        }

        // Bind the LIMIT value if provided
        if ($limit) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        }

        // Execute the query
        $stmt->execute();

        // Fetch the result: fetch a single row or all rows based on $singleRow
        return $singleRow ? $stmt->fetch(PDO::FETCH_ASSOC) : $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Dynamic INSERT method.
     */
    public function dynamicInsert(string $table, array $data): int {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_map(fn($key) => ":$key", array_keys($data)));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $stmt = $this->pdo->prepare($sql);
        foreach ($data as $key => &$value) {
            $stmt->bindParam(":$key", $value);
        }

        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    /**
     * Dynamic UPDATE method.
     */
    public function dynamicUpdate(string $table, array $data, array $conditions): int {
        $setClauses = [];
        foreach ($data as $column => $value) {
            $setClauses[] = "$column = :$column";
        }
        $sql = "UPDATE $table SET " . implode(', ', $setClauses);

        if (!empty($conditions)) {
            $whereClauses = [];
            foreach ($conditions as $field => $value) {
                $whereClauses[] = "$field = :where_$field";
            }
            $sql .= ' WHERE ' . implode(' AND ', $whereClauses);
        }

        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $key => &$value) {
            $stmt->bindParam(":$key", $value);
        }

        foreach ($conditions as $field => &$value) {
            $stmt->bindParam(":where_$field", $value);
        }

        $stmt->execute();
        return $stmt->rowCount();
    }

    /**
     * Dynamic DELETE method.
     */
    public function dynamicDelete(string $table, array $conditions): int {
        $sql = "DELETE FROM $table";

        if (!empty($conditions)) {
            $whereClauses = [];
            foreach ($conditions as $field => $value) {
                $whereClauses[] = "$field = :$field";
            }
            $sql .= ' WHERE ' . implode(' AND ', $whereClauses);
        }

        $stmt = $this->pdo->prepare($sql);

        foreach ($conditions as $field => &$value) {
            $stmt->bindParam(":$field", $value);
        }

        $stmt->execute();
        return $stmt->rowCount();
    }

    // Simple Methods

    /**
     * Simple SELECT method (fetches a single row).
     */
    public function select(string $table, array $conditions = []): ?array {
        return $this->dynamicSelect($table, $conditions, '', '', null, true);
    }

    public function selectAll(string $table, array $conditions = []): ?array {
        return $this->dynamicSelect($table, $conditions, '', '', null, false);
    }

    /**
     * Simple INSERT method.
     */
    public function insert(string $table, array $data): int {
        return $this->dynamicInsert($table, $data);
    }

    /**
     * Simple UPDATE method.
     */
    public function update(string $table, array $data, array $conditions): int {
        return $this->dynamicUpdate($table, $data, $conditions);
    }

    /**
     * Simple DELETE method.
     */
    public function delete(string $table, array $conditions): int {
        return $this->dynamicDelete($table, $conditions);
    }
}
