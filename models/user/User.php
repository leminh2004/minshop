<?php
class User
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Viết truy vấn danh sách danh mục

    public function login($email, $password)
    {
        try {
            $sql = "SELECT * FROM users
                    WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return "Sai tài khoản hoặc mật khẩu";
            }
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
            return false;
        }
    }

        public function register($name, $email, $password)
    {
        try {
            $hashPass = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (`name`, `email`, `password`)
                    VALUES (:name, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'password' => $hashPass
            ]);
            
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
            return false;
        }
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
