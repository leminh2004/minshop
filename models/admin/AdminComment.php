<?php

class AdminComment
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function all()
    {
        $sql = "SELECT comments.*,users.name user_name
                FROM comments
                JOIN users
                ON users.id  = comments.user_id
                ORDER BY comments.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $sql = "SELECT comments.*,users.name user_name
                FROM comments
                JOIN users
                ON users.id  = comments.user_id
                WHERE comments.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function update($id, $active)
    {
        $sql = "UPDATE comments
                SET active = :active
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'active' => $active
        ]);
        return true;
    }
}
