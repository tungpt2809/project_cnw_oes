<?php
    include('database.php');
    class M_user extends Database
    {
        public $pwd;
        public $status;
        public $level;

        function addUser($email, $password, $status, $access_code, $level)
        {
            $sql = "INSERT INTO users(email, password, status, access_code, level) VALUES(?,?,?,?,?)";
            $this->setQuery($sql);
            $result = $this->execute(array($email, $password, $status, $access_code, $level));
            return $result;
        }

        function emailExists($email)
        {
            $sql = "SELECT id, password, status, level FROM users WHERE email = ?";
            
            $stmt = $this->conn->prepare( $sql );
            $email=htmlspecialchars(strip_tags($email));
            $stmt->bindParam(1, $email);

            // execute the query
            $stmt->execute();
            // get number of rows
            $num = $stmt->rowCount();
            if($num>0)
            {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->pwd = $row['password'];
                $this->status = $row['status'];
                $this->level = $row['level'];
                return true;
            }    
            return false;
        }

        function updateStatusByAccessCode($access_code){
            $sql = "UPDATE users SET status = 1  WHERE access_code = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $access_code);
            $stmt->execute();
        }

        function accessCodeExists($access_code){
            $sql = "SELECT id FROM users WHERE access_code = ? ";
            $stmt = $this->conn->prepare( $sql );
            $access_code = htmlspecialchars(strip_tags($access_code));
            $stmt->bindParam(1, $access_code);
            $stmt->execute();

            $num = $stmt->rowCount();
            if($num>0){
                return true;
            }
            return false;
        }
    }
?>