<?php
class Comment
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function show($product_id)
    {
        try {
            $sql = "SELECT comments.*, users.name user_name
                    FROM comments
                    JOIN users
                    ON users.id = comments.user_id
                    WHERE product_id = :product_id
                    ORDER BY comments.id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'product_id' => $product_id,
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function post($content,$user_id, $product_id)
    {
        try {
            $sql = "INSERT INTO comments (`content`,`user_id`, `product_id`)
                    VALUES (:content,  :user_id, :product_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'content' => $content,
                'product_id' => $product_id,
                'user_id' => $user_id
            ]);
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
