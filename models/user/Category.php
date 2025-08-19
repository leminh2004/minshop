<?php 
class Category
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách danh mục

    public function all()
    {
        try {
            $sql = "SELECT * FROM categories";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception$e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
