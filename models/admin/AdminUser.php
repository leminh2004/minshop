<?php
// Có class chứa các function thực thi tương tác với cơ sở dữ liệu 
class AdminUser
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
            $sql = "SELECT * FROM users";
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
            $sql = "SELECT * FROM users
            WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function create($name, $email, $phone, $role, $password)
    {
        try {
            $hashPass = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (`name`,`email`,`phone`,`role`,`password`)
                    VALUES (:name, :email, :phone, :role, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'role' => $role,
                'password' => $hashPass
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function update($id, $name, $email, $phone, $role)
    {
        try {
            $sql = "UPDATE users SET
                    name = :name,
                    email = :email,
                    phone = :phone,
                    role = :role
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'role' => $role
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function updatePass($id, $password)
    {
        try {
            $hashPass = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE users SET
                    password = :password
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'id' => $id,
                'password' =>  $hashPass
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        return true;
    }

    public function checkEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
       return $user ? false : true;
    }
}
