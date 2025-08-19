<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class AdminProduct
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
            $sql = "SELECT products.*, categories.name AS cate_name
            FROM products
            JOIN categories
            ON products.category_id = categories.id
            ORDER BY products.id DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getProduct($id)
    {
        try {
            $sql = "SELECT products.*, categories.name AS cate_name
            FROM products
            INNER JOIN categories
            ON products.category_id = categories.id
            WHERE products.id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function create($name, $image, $price, $discount, $category_id, $quantity, $description, $date)
    {
        try {
            $discount = !empty($discount) ? $discount : NULL;
            $sql = "INSERT INTO products (`name`,`image`, `price`, `discount`, `category_id`, `quantity`, `description`, `date`)
                    VALUES (:name, :image, :price, :discount, :category_id, :quantity, :description, :date)";


            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':image' => $image,
                ':price' => $price,
                ':discount' => $discount,
                ':category_id' => $category_id,
                ':quantity' => $quantity,
                ':description' => $description,
                ':date' => $date
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function update($id, $name, $image, $price, $discount, $category_id, $quantity, $description, $date)
    {
        try {
            $discount = !empty($discount) ? $discount : NULL;
            $sql = "UPDATE products
                    SET 
                    name = :name,
                    image = :image,
                    price = :price,
                    discount = :discount,
                    category_id = :category_id,
                    quantity = :quantity,
                    description = :description,
                    date = :date
                    WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':name' => $name,
                ':image' => $image,
                ':price' => $price,
                ':discount' => $discount,
                ':category_id' => $category_id,
                ':quantity' => $quantity,
                ':description' => $description,
                ':date' => $date
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
