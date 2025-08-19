<?php 
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class Product
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách sản phẩm 

    public function allProducts()
    {
        try {
            $sql = "SELECT products.*, categories.name cate_name 
                    FROM products
                    JOIN categories
                    ON categories.id = products.category_id
                    LIMIT 9";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception$e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

        public function newProduct()
    {
        try {
            $sql = "SELECT products.*, categories.name cate_name 
                    FROM products
                    JOIN categories
                    ON categories.id = products.category_id
                    ORDER BY products.id DESC
                    LIMIT 9";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception$e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
