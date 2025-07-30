<?php


include ('../../../controller/config.php');

date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }


     public function fetch_all_categories(){
        $query = $this->conn->prepare("SELECT * 
        FROM category where status='1'"    
    );

        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }


    public function LoginAdmin($username, $password)
    {
        $query = $this->conn->prepare("SELECT * FROM `admin` WHERE `admin_email` = ?");
        $query->bind_param("s", $username);
    
        if ($query->execute()) {
            $result = $query->get_result();
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
    
                if (password_verify($password, $user['admin_password'])) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['id'] = $user['admin_id'];
                    $_SESSION['admin_fullname'] = $user['admin_fullname'];
                    $query->close();
                    return ['success' => true, 'data' => $user];
                } else {
                    // Password mismatch
                    $query->close();
                    return ['success' => false, 'message' => 'Login Failed.'];
                }
            } else {
                // No user found
                $query->close();
                return ['success' => false, 'message' => 'Login Failed.'];
            }
        } else {
            $query->close();
            return ['success' => false, 'message' => 'Database error during execution.'];
        }
    }




    public function check_account($id) {
        $id = intval($id);
        $query = "SELECT * FROM user_member WHERE id = $id";

        $result = $this->conn->query($query);

        $items = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }
        return $items; 
    }






  








}