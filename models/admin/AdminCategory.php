<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class AdminCategory
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM categories";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
