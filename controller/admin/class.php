<?php


include ('../../../controller/config.php');

date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }




    public function fetch_all_events() {
        $query = $this->conn->prepare("SELECT * FROM events ORDER BY event_id  DESC");

        if ($query->execute()) {
            $result = $query->get_result();
            $data = [];

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
        }
        return []; 
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
    $height, $dob, $contact_number, $facebook_name, $ig_name,
    $dog_image, $type, $facebook_link, $ig_link, $dog_banner,$gender,$registration
) {
    $dog_code = $this->generateDogCode();

    $query = "INSERT INTO dogs (
        dog_code, dog_name, dog_owner_name, dog_breeder_name, dog_image, dog_country,
        dog_color, dog_height, dog_date_of_birth, dog_contact_number,
        dog_facebook_name, dog_ig_name, dog_type_status, dog_registered_status,
        dog_facebook_link, dog_ig_link, dog_banner,dog_gender,dog_date_registration
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?, ?, ?,?,?)";

    $stmt = $this->conn->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $this->conn->error);
    }

    $stmt->bind_param(
        "ssssssssssssssssss",
        $dog_code,
        $dog_name,
        $owner_name,
        $breeder_name,
        $dog_image,
        $country,
        $color,
        $height,
        $dob,
        $contact_number,
        $facebook_name,
        $ig_name,
        $type,
        $facebook_link,
        $ig_link,
        $dog_banner,
        $gender,
        $registration
    );

    $result = $stmt->execute();

    if (!$result) {
        $stmt->close();
        return false;
    }

    $dog_id = $this->conn->insert_id;
    $stmt->close();

    // Insert into generation table
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
        // Define the starting point
        $startCode = 888000001;

        // Get the current highest dog code that starts with 888
        $query = "SELECT MAX(dog_code) AS max_code FROM dogs WHERE dog_code LIKE '888%'";
        $result = $this->conn->query($query);

        if ($result && $row = $result->fetch_assoc()) {
            $lastCode = (int)$row['max_code'];
            $newCode = $lastCode >= $startCode ? $lastCode + 1 : $startCode;
        } else {
            $newCode = $startCode;
        }

        return str_pad($newCode, 9, '0', STR_PAD_LEFT); // e.g., "888000001"
    }



    



public function UpdateDog(
    $dog_id, $dog_name, $owner_name, $breeder_name, $country, $color,
    $height, $dob, $contact_number, $facebook_name, $ig_name,
    $uniqueFileName = null, $dog_type_status,
    $facebook_link = null, $ig_link = null, $bannerImage = null, $gender, $date_registration
) {
    // Convert empty strings to null (except image fields)
    foreach ([
        'dog_name' => &$dog_name,
        'owner_name' => &$owner_name,
        'breeder_name' => &$breeder_name,
        'country' => &$country,
        'color' => &$color,
        'height' => &$height,
        'dob' => &$dob,
        'contact_number' => &$contact_number,
        'facebook_name' => &$facebook_name,
        'ig_name' => &$ig_name,
        'dog_type_status' => &$dog_type_status,
        'facebook_link' => &$facebook_link,
        'ig_link' => &$ig_link,
        'date_registration' => &$date_registration,
        'gender' => &$gender
    ] as &$value) {
        if (is_string($value) && trim($value) === '') {
            $value = null;
        }
    }

    // Remove old dog_image if new one is uploaded
    if ($uniqueFileName) {
        $selectQuery = "SELECT dog_image FROM dogs WHERE dog_id = ?";
        $selectStmt = $this->conn->prepare($selectQuery);
        $selectStmt->bind_param("s", $dog_id);
        $selectStmt->execute();
        $selectStmt->bind_result($oldImage);
        $selectStmt->fetch();
        $selectStmt->close();

        if (!empty($oldImage)) {
            $oldImagePath = "../../../static/upload/" . $oldImage;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    }

    // Remove old banner if new one is uploaded
    if ($bannerImage) {
        $selectQuery = "SELECT dog_banner FROM dogs WHERE dog_id = ?";
        $selectStmt = $this->conn->prepare($selectQuery);
        $selectStmt->bind_param("s", $dog_id);
        $selectStmt->execute();
        $selectStmt->bind_result($oldBanner);
        $selectStmt->fetch();
        $selectStmt->close();

        if (!empty($oldBanner)) {
            $oldBannerPath = "../../../static/upload/" . $oldBanner;
            if (file_exists($oldBannerPath)) {
                unlink($oldBannerPath);
            }
        }
    }

    // Dynamic query builder
    $fields = [
        "dog_name = ?",
        "dog_owner_name = ?",
        "dog_breeder_name = ?",
        "dog_country = ?",
        "dog_color = ?",
        "dog_height = ?",
        "dog_date_of_birth = ?",
        "dog_contact_number = ?",
        "dog_facebook_name = ?",
        "dog_ig_name = ?",
        "dog_type_status = ?",
        "dog_facebook_link = ?",
        "dog_ig_link = ?",
        "dog_date_registration = ?",
        "dog_gender = ?"
    ];
    $params = [
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
        $dog_type_status,
        $facebook_link,
        $ig_link,
        $date_registration,
        $gender
    ];
    $types = str_repeat("s", count($params));

    if ($uniqueFileName) {
        $fields[] = "dog_image = ?";
        $params[] = $uniqueFileName;
        $types .= "s";
    }

    if ($bannerImage) {
        $fields[] = "dog_banner = ?";
        $params[] = $bannerImage;
        $types .= "s";
    }

    $fields[] = "dog_id = ?";
    $params[] = $dog_id;
    $types .= "s";

    $query = "UPDATE dogs SET " . implode(", ", array_slice($fields, 0, -1)) . " WHERE dog_id = ?";
    $stmt = $this->conn->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $this->conn->error);
    }

    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $stmt->close();

    return true;
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
    $query = $this->conn->prepare("SELECT * FROM dogs WHERE dog_registered_status = '1' ORDER BY dog_id DESC");

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





    public function fetch_search_registered_dogs($search = '') {
            if (!empty($search)) {
                $search = "%{$search}%";
                $query = $this->conn->prepare("
                    SELECT * FROM dogs 
                    WHERE dog_registered_status = '1'
                    AND (
                        dog_name LIKE ? OR
                        dog_code LIKE ? OR
                        dog_owner_name LIKE ? OR
                        dog_breeder_name LIKE ?
                    )
                    ORDER BY dog_id DESC
                ");
                $query->bind_param('ssss', $search, $search, $search, $search);
            } else {
                $query = $this->conn->prepare("
                    SELECT * FROM dogs 
                    WHERE dog_registered_status = '1'
                    ORDER BY dog_id DESC
                ");
            }

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





public function fetch_all_pageant() {
    $query = $this->conn->prepare("SELECT * FROM pageant where pad_status='1' ORDER BY pag_id DESC");

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


public function fetch_pageant_category($pagId) {
    $status=1;
    $query = $this->conn->prepare("SELECT * FROM pageant_category WHERE pc_pageant_id = ? AND pc_status = ? ORDER BY pc_id DESC");
    $query->bind_param("ii", $pagId,$status);

    if ($query->execute()) {
        $result = $query->get_result();
        $pageants = [];

        while ($row = $result->fetch_assoc()) {
            $contestants = json_decode($row['pc_contestant'], true); // e.g., [{id: 27, points: 60}, ...]

            $fullContestants = [];

            foreach ($contestants as $contestant) {
                $dog_id = $contestant['id'];
                $dogQuery = $this->conn->prepare("SELECT dog_country, dog_id, dog_code, dog_name FROM dogs WHERE dog_id = ?");
                $dogQuery->bind_param("i", $dog_id);
                $dogQuery->execute();
                $dogResult = $dogQuery->get_result();

                if ($dogRow = $dogResult->fetch_assoc()) {
                    // Merge dog data with contestant info (id + points)
                    $fullContestants[] = array_merge($contestant, $dogRow);
                } else {
                    // Still include contestant with dog data missing
                    $fullContestants[] = $contestant;
                }
            }

            $row['contestants'] = $fullContestants;
            unset($row['pc_contestant']); // optional: remove raw JSON string if no longer needed
            $pageants[] = $row;
        }

        return $pageants;
    }

    return [];
}




public function fetch_category_contestants($pc_id) {
    $query = $this->conn->prepare("SELECT * FROM pageant_category WHERE pc_id = ? ORDER BY pc_id DESC");
    $query->bind_param("i", $pc_id);

    if ($query->execute()) {
        $result = $query->get_result();
        $pageants = [];

        while ($row = $result->fetch_assoc()) {
            $contestants = json_decode($row['pc_contestant'], true); // e.g., [{id: 27, points: 60}, ...]

            $fullContestants = [];

            foreach ($contestants as $contestant) {
                $dog_id = $contestant['id'];
                $dogQuery = $this->conn->prepare("SELECT dog_country, dog_id, dog_code, dog_name FROM dogs WHERE dog_id = ?");
                $dogQuery->bind_param("i", $dog_id);
                $dogQuery->execute();
                $dogResult = $dogQuery->get_result();

                if ($dogRow = $dogResult->fetch_assoc()) {
                    // Merge dog data with contestant info (id + points)
                    $fullContestants[] = array_merge($contestant, $dogRow);
                } else {
                    // Still include contestant with dog data missing
                    $fullContestants[] = $contestant;
                }
            }

            $row['contestants'] = $fullContestants;
            unset($row['pc_contestant']); // optional: remove raw JSON string if no longer needed
            $pageants[] = $row;
        }

        return $pageants;
    }

    return [];
}



public function fetch_top_10_exclusive() {
    $query = $this->conn->prepare("
        SELECT * FROM dogs 
        WHERE dog_registered_status = 1 AND dog_type_status = 'exclusive' 
        ORDER BY dog_id DESC 
        LIMIT 10
    ");

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




public function fetch_all_registered_dogs_once($dogId) {
    // Step 1: Get dog IDs used in gen_dog_id row (excluding gen_dog_id itself)
    $subQuery = $this->conn->prepare("
        SELECT * FROM generation WHERE gen_dog_id = ?
    ");
    
    if ($subQuery === false) return [];

    $subQuery->bind_param("i", $dogId);
    $subQuery->execute();
    $result = $subQuery->get_result();

    $excludeIds = [];
    if ($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
            if (
                $key !== "gen_id" && $key !== "gen_dog_id" && 
                !is_null($value) && $value != $dogId
            ) {
                $excludeIds[] = (int)$value;
            }
        }
    }

    // Convert array to comma-separated placeholders
    $placeholders = implode(',', array_fill(0, count($excludeIds), '?'));

    // Step 2: Build query
    $sql = "SELECT * FROM dogs WHERE dog_registered_status = '1' AND dog_id != ?";

    if (!empty($excludeIds)) {
        $sql .= " AND dog_id NOT IN ($placeholders)";
    }

    $query = $this->conn->prepare($sql);
    if ($query === false) return [];

    // Merge bind parameters: first $dogId, then the list
    $types = str_repeat('i', count($excludeIds) + 1); // all integers
    $params = array_merge([$dogId], $excludeIds);

    // Use argument unpacking to bind params dynamically
    $query->bind_param($types, ...$params);

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
            d.dog_banner AS main_dog_banner,
            d.dog_gender AS dog_gender,
            d.dog_registered_status, 
            d.dog_code, 
            d.dog_owner_name, 
            d.dog_breeder_name, 
            d.dog_country, 
            d.dog_color, 
            d.dog_height, 
            d.dog_contact_number, 
            d.dog_facebook_name, 
            d.dog_facebook_link, 
            d.dog_ig_name, 
            d.dog_ig_link, 
            d.dog_date_of_birth, 

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





public function updateGenForm_registered($dogRole, $parent_dog_id, $main_dog_id) {
    $allowedRoles = [
        'father', 'mother',
        'grandfather1', 'grandmother1',
        'grandfather2', 'grandmother2',
        'ggfather1', 'ggmother1',
        'ggfather2', 'ggmother2',
        'ggfather3', 'ggmother3',
        'ggfather4', 'ggmother4'
    ];

    // Validate that the role is one of the allowed generation columns
    if (!in_array($dogRole, $allowedRoles)) {
        return false; // Invalid column name
    }

    // Safely build the SQL query with dynamic column name
    $query = "UPDATE `generation` SET `{$dogRole}_dog_id` = ? WHERE `gen_dog_id` = ?";

    $stmt = $this->conn->prepare($query);

    if (!$stmt) {
        return false; // Query failed to prepare
    }

    $stmt->bind_param("ii", $parent_dog_id, $main_dog_id);

    return $stmt->execute();
}




   public function updateGenForm_not_registered($main_dog_id, $dogRole, $dogName, $uniqueFileName) {
        // Generate a unique dog code
        $dog_code = $this->generateDogCode();

        // Step 1: Insert into dogs table
        $query = "INSERT INTO dogs (
            dog_code, dog_name, dog_image, dog_registered_status
        ) VALUES (?, ?, ?, 0)";
        
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("sss", $dog_code, $dogName, $uniqueFileName);
        $result = $stmt->execute();
        if (!$result) {
            $stmt->close();
            return false;
        }

        // Get the inserted dog_id
        $newDogId = $this->conn->insert_id;
        $stmt->close();

        // Validate dogRole
        $allowedRoles = [
            'father', 'mother',
            'grandfather1', 'grandmother1',
            'grandfather2', 'grandmother2',
            'ggfather1', 'ggmother1',
            'ggfather2', 'ggmother2',
            'ggfather3', 'ggmother3',
            'ggfather4', 'ggmother4'
        ];

        if (!in_array($dogRole, $allowedRoles)) {
            return false; // Invalid role
        }

        // Step 2: Check if gen_dog_id already exists
        $check_query = "SELECT COUNT(*) FROM generation WHERE gen_dog_id = ?";
        $check_stmt = $this->conn->prepare($check_query);
        $check_stmt->bind_param("i", $main_dog_id);
        $check_stmt->execute();
        $check_stmt->bind_result($count);
        $check_stmt->fetch();
        $check_stmt->close();

        if ($count > 0) {
            // Exists: do UPDATE
            $update_query = "UPDATE generation SET `{$dogRole}_dog_id` = ? WHERE gen_dog_id = ?";
            $update_stmt = $this->conn->prepare($update_query);
            if (!$update_stmt) {
                die("Prepare failed (update): " . $this->conn->error);
            }
            $update_stmt->bind_param("ii", $newDogId, $main_dog_id);
            $update_result = $update_stmt->execute();
            $update_stmt->close();

            return $update_result;
        } else {
            // Does not exist: do INSERT
            $insert_query = "INSERT INTO generation (gen_dog_id, `{$dogRole}_dog_id`) VALUES (?, ?)";
            $insert_stmt = $this->conn->prepare($insert_query);
            if (!$insert_stmt) {
                die("Prepare failed (insert): " . $this->conn->error);
            }
            $insert_stmt->bind_param("ii", $main_dog_id, $newDogId);
            $insert_result = $insert_stmt->execute();
            $insert_stmt->close();

            return $insert_result;
        }
    }













    public function CreatePageant($name, $description) {
        $query = "INSERT INTO pageant (
            pag_name, pag_description
        ) VALUES (?, ?)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("ss", $name, $description);
        $result = $stmt->execute();

        if (!$result) {
            $stmt->close();
            return false;
        }

        $stmt->close();
        return true;
    }


    
       public function AddCategoryShow($showname, $contestants_json, $pagId) {
            $query = "INSERT INTO pageant_category (pc_pageant_id, pc_category_name, pc_contestant)
                    VALUES (?, ?, ?)";

            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sss", $pagId, $showname, $contestants_json);

            $result = $stmt->execute();
            $stmt->close();

            return $result;
        }



    public function UpdateCategoryContestants($pc_id, $contestants_json) {
            $query = "UPDATE pageant_category SET pc_contestant = ? WHERE pc_id = ?";

            $stmt = $this->conn->prepare($query);
            if (!$stmt) {
                return false;
            }

            $stmt->bind_param("ss", $contestants_json, $pc_id);

            $result = $stmt->execute();
            $stmt->close();

            return $result;
    }




    public function removeEvents($event_id) {
        // Step 1: Get the banner filename from the database
        $selectQuery = "SELECT event_banner FROM events WHERE event_id = ?";
        $stmt = $this->conn->prepare($selectQuery);
        if (!$stmt) {
            return 'Prepare failed (select): ' . $this->conn->error;
        }

        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $stmt->bind_result($bannerFile);
        $stmt->fetch();
        $stmt->close();

        // Step 2: Delete the record from the database
        $deleteQuery = "DELETE FROM events WHERE event_id = ?";
        $stmt = $this->conn->prepare($deleteQuery);
        if (!$stmt) {
            return 'Prepare failed (delete): ' . $this->conn->error;
        }

        $stmt->bind_param("i", $event_id);
        $result = $stmt->execute();
        $stmt->close();

        // Step 3: Delete the file from the filesystem
        if ($result && $bannerFile) {
            $filePath = __DIR__ . "../../../static/upload/" . $bannerFile;
            if (file_exists($filePath)) {
                unlink($filePath); // deletes the image file
            }
        }

        return $result ? 'success' : 'Error deleting event';
    }



     public function removePageant($pag_id) {
            $query = "UPDATE `pageant` 
                    SET `pad_status` = 0
                    WHERE `pag_id` = $pag_id";

                // Execute the query
                if ($this->conn->query($query)) {
                    return 'success';
                } else {
                    return 'Error: ' . $this->conn->error;
                }
        }





      public function removeDog($dog_id) {
            $query = "UPDATE `dogs` 
                    SET `dog_registered_status` = 2
                    WHERE `dog_id` = $dog_id";

                // Execute the query
                if ($this->conn->query($query)) {
                    return 'success';
                } else {
                    return 'Error: ' . $this->conn->error;
                }
        }


        public function removeShow($pc_id) {
            $query = "UPDATE `pageant_category` 
                    SET `pc_status` = 0
                    WHERE `pc_id` = $pc_id";

                // Execute the query
                if ($this->conn->query($query)) {
                    return 'success';
                } else {
                    return 'Error: ' . $this->conn->error;
                }
        }


        public function AddEvent($event_name, $description, $event_date, $event_time, $dogBannerFileName) {
            $query = "INSERT INTO `events` (`event_name`, `event_description`, `event_banner`, `event_date`, `event_time`) 
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->conn->prepare($query);
            if (!$stmt) {
                die("Prepare failed: " . $this->conn->error);
            }

            $stmt->bind_param("sssss", $event_name, $description, $dogBannerFileName, $event_date, $event_time);

            $result = $stmt->execute();

            if (!$result) {
                $stmt->close();
                return false;
            }

            $inserted_id = $this->conn->insert_id; 
            $stmt->close();

            return $inserted_id; 
        }















public function UpdateEvent(
    $eventId,
    $eventName_update,
    $eventDescription_update,
    $eventDate_update,
    $eventTime_update,
    $bannerImage = null // assuming bannerImage is the new file name if uploaded
) {
    foreach ([
        'event_name' => &$eventName_update,
        'event_description' => &$eventDescription_update,
        'event_date' => &$eventDate_update,
        'event_time' => &$eventTime_update
    ] as &$value) {
        if (is_string($value) && trim($value) === '') {
            $value = null;
        }
    }

    // Remove old banner image if a new one is uploaded
    if ($bannerImage) {
        $selectQuery = "SELECT event_banner FROM events WHERE event_id = ?";
        $selectStmt = $this->conn->prepare($selectQuery);
        $selectStmt->bind_param("s", $eventId);
        $selectStmt->execute();
        $selectStmt->bind_result($oldBanner);
        $selectStmt->fetch();
        $selectStmt->close();

        if (!empty($oldBanner)) {
            $oldBannerPath = "../../../static/upload/" . $oldBanner;
            if (file_exists($oldBannerPath)) {
                unlink($oldBannerPath);
            }
        }
    }

    // Build the update query
    $fields = [
        "event_name = ?",
        "event_description = ?",
        "event_date = ?",
        "event_time = ?"
    ];
    $params = [
        $eventName_update,
        $eventDescription_update,
        $eventDate_update,
        $eventTime_update
    ];
    $types = str_repeat("s", count($params));

    if ($bannerImage) {
        $fields[] = "event_banner = ?";
        $params[] = $bannerImage;
        $types .= "s";
    }

    $params[] = $eventId;
    $types .= "s";

    $query = "UPDATE events SET " . implode(", ", $fields) . " WHERE event_id = ?";
    $stmt = $this->conn->prepare($query);

    if (!$stmt) {
        return ['status' => false, 'message' => 'Prepare failed: ' . $this->conn->error];
    }

    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $stmt->close();

    return ['status' => true, 'message' => 'Event updated successfully.'];
}




}