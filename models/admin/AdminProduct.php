<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class AdminProductModel 
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 

    public function getAllProduct()
    {
        try {
            $sql = "SELECT * FROM products";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception$e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
