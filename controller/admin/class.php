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

        // First: Insert into dogs table
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
            
            if (!$result) {
                $stmt->close();
                return false;
            }

            // Get the inserted dog_id
            $dog_id = $this->conn->insert_id;
            $stmt->close();

            // Second: Insert into generation table using the dog_id
            $gen_query = "INSERT INTO generation (gen_dog_id) VALUES (?)";
            $gen_stmt = $this->conn->prepare($gen_query);
            if (!$gen_stmt) {
                die("Prepare failed (generation): " . $this->conn->error);
            }

            $gen_stmt->bind_param("i", $dog_id);
            $gen_result = $gen_stmt->execute();
            $gen_stmt->close();

            return $gen_result;
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
    return []; 
}


public function fetch_dogs_generation($dog_id) {
    $query = "
        SELECT 
            d.dog_name AS main_dog_name,
            d.dog_image AS main_dog_image,

            gen.*,

            father.dog_name AS father_name,
            father.dog_image AS father_image,

            mother.dog_name AS mother_name,
            mother.dog_image AS mother_image,

            gf1.dog_name AS grandfather1_name,
            gf1.dog_image AS grandfather1_image,

            gm1.dog_name AS grandmother1_name,
            gm1.dog_image AS grandmother1_image,

            gf2.dog_name AS grandfather2_name,
            gf2.dog_image AS grandfather2_image,

            gm2.dog_name AS grandmother2_name,
            gm2.dog_image AS grandmother2_image,

            ggf1.dog_name AS ggfather1_name,
            ggf1.dog_image AS ggfather1_image,

            ggm1.dog_name AS ggmother1_name,
            ggm1.dog_image AS ggmother1_image,

            ggf2.dog_name AS ggfather2_name,
            ggf2.dog_image AS ggfather2_image,

            ggm2.dog_name AS ggmother2_name,
            ggm2.dog_image AS ggmother2_image,

            ggf3.dog_name AS ggfather3_name,
            ggf3.dog_image AS ggfather3_image,

            ggm3.dog_name AS ggmother3_name,
            ggm3.dog_image AS ggmother3_image,

            ggf4.dog_name AS ggfather4_name,
            ggf4.dog_image AS ggfather4_image,

            ggm4.dog_name AS ggmother4_name,
            ggm4.dog_image AS ggmother4_image

        FROM dogs d
        LEFT JOIN generation gen ON d.dog_id = gen.gen_dog_id

        LEFT JOIN dogs father ON gen.father_dog_id = father.dog_id
        LEFT JOIN dogs mother ON gen.mother_dog_id = mother.dog_id

        LEFT JOIN dogs gf1 ON gen.grandfather1_dog_id = gf1.dog_id
        LEFT JOIN dogs gm1 ON gen.grandmother1_dog_id = gm1.dog_id

        LEFT JOIN dogs gf2 ON gen.grandfather2_dog_id = gf2.dog_id
        LEFT JOIN dogs gm2 ON gen.grandmother2_dog_id = gm2.dog_id

        LEFT JOIN dogs ggf1 ON gen.ggfather1_dog_id = ggf1.dog_id
        LEFT JOIN dogs ggm1 ON gen.ggmother1_dog_id = ggm1.dog_id

        LEFT JOIN dogs ggf2 ON gen.ggfather2_dog_id = ggf2.dog_id
        LEFT JOIN dogs ggm2 ON gen.ggmother2_dog_id = ggm2.dog_id

        LEFT JOIN dogs ggf3 ON gen.ggfather3_dog_id = ggf3.dog_id
        LEFT JOIN dogs ggm3 ON gen.ggmother3_dog_id = ggm3.dog_id

        LEFT JOIN dogs ggf4 ON gen.ggfather4_dog_id = ggf4.dog_id
        LEFT JOIN dogs ggm4 ON gen.ggmother4_dog_id = ggm4.dog_id

        WHERE d.dog_id = ?
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $dog_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();

    return $data;
}





  public function updateGenForm_registered($dogRole,$dog_id) {
        $stmt = $this->conn->prepare("UPDATE `orders` SET `order_status` = '$newStatus',`order_pickup_date` = '$scheduleDate',`order_pickup_time` = '$scheduleTime' WHERE `orders`.`order_id` = '$orderId'");
        return $stmt->execute();
    }











}