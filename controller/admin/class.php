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
    

      public function DogRegister(
            $dog_name, $owner_name, $breeder_name, $country, $color,
            $height, $dob, $contact_number, $facebook_name, $ig_name, $uniqueFileName
        ) {
            // Generate a unique dog code in format "9900000" + random 7-digit number
            $dog_code = $this->generateDogCode();

            $query = "INSERT INTO dogs (
                dog_code, dog_name, dog_owner_name, dog_breeder_name, dog_image, dog_country,
                dog_color, dog_height, dog_date_of_birth, dog_contact_number,
                dog_facebook_name, dog_ig_name, dog_type_status, dog_registered_status
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, 1)";

            $stmt = $this->conn->prepare($query);
            if (!$stmt) {
                die("Prepare failed: " . $this->conn->error);
            }

            $stmt->bind_param(
                "ssssssssssss",
                $dog_code,
                $dog_name,
                $owner_name,
                $breeder_name,
                $uniqueFileName,
                $country,
                $color,
                $height,
                $dob,
                $contact_number,
                $facebook_name,
                $ig_name
            );

            $result = $stmt->execute();
            $stmt->close();

            return $result;
        }


        private function generateDogCode() {
                do {
                    $code = '9900000' . str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);

                    // Check if code exists
                    $stmt = $this->conn->prepare("SELECT dog_id FROM dogs WHERE dog_code = ?");
                    $stmt->bind_param("s", $code);
                    $stmt->execute();
                    $stmt->store_result();
                    $exists = $stmt->num_rows > 0;
                    $stmt->close();

                } while ($exists);

                return $code;
            }





       public function UpdateDog(
            $dog_id, $dog_name, $owner_name, $breeder_name, $country, $color,
            $height, $dob, $contact_number, $facebook_name, $ig_name, $uniqueFileName = null
        ) {
            // Step 1: Fetch old image if a new one is uploaded
            if ($uniqueFileName) {
                $selectQuery = "SELECT dog_image FROM dogs WHERE dog_id = ?";
                $selectStmt = $this->conn->prepare($selectQuery);
                $selectStmt->bind_param("s", $dog_id);
                $selectStmt->execute();
                $selectStmt->bind_result($oldImage);
                $selectStmt->fetch();
                $selectStmt->close();

                // Step 2: Unlink old image if exists and not empty
                if (!empty($oldImage)) {
                    $oldImagePath = "../../../static/upload/" . $oldImage; 
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            // Step 3: Build query
            if ($uniqueFileName) {
                $query = "UPDATE dogs SET 
                    dog_name = ?, 
                    dog_owner_name = ?, 
                    dog_breeder_name = ?, 
                    dog_image = ?, 
                    dog_country = ?, 
                    dog_color = ?, 
                    dog_height = ?, 
                    dog_date_of_birth = ?, 
                    dog_contact_number = ?, 
                    dog_facebook_name = ?, 
                    dog_ig_name = ? 
                WHERE dog_id = ?";
            } else {
                $query = "UPDATE dogs SET 
                    dog_name = ?, 
                    dog_owner_name = ?, 
                    dog_breeder_name = ?, 
                    dog_country = ?, 
                    dog_color = ?, 
                    dog_height = ?, 
                    dog_date_of_birth = ?, 
                    dog_contact_number = ?, 
                    dog_facebook_name = ?, 
                    dog_ig_name = ? 
                WHERE dog_id = ?";
            }

            $stmt = $this->conn->prepare($query);
            if (!$stmt) {
                die("Prepare failed: " . $this->conn->error);
            }

            if ($uniqueFileName) {
                $stmt->bind_param(
                    "ssssssssssss",
                    $dog_name,
                    $owner_name,
                    $breeder_name,
                    $uniqueFileName,
                    $country,
                    $color,
                    $height,
                    $dob,
                    $contact_number,
                    $facebook_name,
                    $ig_name,
                    $dog_id
                );
            } else {
                $stmt->bind_param(
                    "sssssssssss",
                    $dog_name,
                    $owner_name,
                    $breeder_name,
                    $country,
                    $color,
                    $height,
                    $dob,
                    $contact_number,
                    $facebook_name,
                    $ig_name,
                    $dog_id
                );
            }

            $stmt->execute();
            $stmt->close();

            return $stmt;
        }







    public function check_account($id) {
        $id = intval($id);
        $query = "SELECT * FROM `admin` WHERE admin_id = $id";

        $result = $this->conn->query($query);

        $items = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }
        return $items; 
    }






 public function fetch_all_registered_dogs() {
    $query = $this->conn->prepare("SELECT * FROM dogs WHERE dog_registered_status = '1'");

    if ($query->execute()) {
        $result = $query->get_result();
        $dogs = [];

        while ($row = $result->fetch_assoc()) {
            $dogs[] = $row;
        }

        return $dogs;
    }
    return []; // Return empty array if failed
}









}