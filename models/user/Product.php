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

    public function all()
    {
        try {
            $sql = "SELECT products.*, categories.name cate_name 
                    FROM products
                    JOIN categories
                    ON categories.id = products.category_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function productsLimit()
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
        } catch (Exception $e) {
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
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function featured()
    {
        try {
            $sql = "SELECT products.*, categories.name cate_name 
                    FROM products
                    JOIN categories
                    ON categories.id = products.category_id
                    ORDER BY views DESC
                    LIMIT 9";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function find($id)
    {
        try {
            $update  = "UPDATE products set views = views + 1 WHERE id = :id";
            $stmt = $this->conn->prepare($update);
            $stmt->execute(['id' => $id]);

            $sql = "SELECT products.*, categories.name cate_name 
                    FROM products
                    JOIN categories
                    ON categories.id = products.category_id
                    WHERE products.id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
