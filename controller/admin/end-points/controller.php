<?php
include('../class.php');

$db = new global_class();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['requestType'])) {
         if ($_POST['requestType'] == 'LoginAdmin') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $db->LoginAdmin($email, $password);
            if ($result['success']) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'data' => $result['data']
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => $result['message']
                ]);
            }

        }else if ($_POST['requestType'] == 'DogRegister') {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
                $dog_name = $_POST['dog_name'];
                $owner_name = $_POST['owner_name'];
                $breeder_name = $_POST['breeder_name'];

                $country = $_POST['country'];
                $color = $_POST['color'];
                $height = $_POST['height'];
                $dob = $_POST['dob'];
                $contact_number = $_POST['contact_number'];
                $facebook_name = $_POST['facebook_name'];
                $ig_name = $_POST['ig_name'];
                $type = $_POST['type'];


                // FILES
                $dog_image = $_FILES['dog_image'];
                

                if ($dog_image['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = '../../../static/upload/';
                    $fileExtension = pathinfo($dog_image['name'], PATHINFO_EXTENSION);
                    $uniqueFileName = uniqid('dog_', true) . '.' . $fileExtension;
                    $uploadFilePath = $uploadDir . $uniqueFileName;

                    if (move_uploaded_file($dog_image['tmp_name'], $uploadFilePath)) {
                        $result = $db->DogRegister(
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
                            $uniqueFileName,
                            $type
                        );


                       if ($result) {
                            echo json_encode([
                                'status' => 200,
                                'message' => 'Dog successfully registered.'
                            ]);
                        } else {
                            echo json_encode([
                                'status' => 500,
                                'message' => 'Error saving data.'
                            ]);
                        }


                    } else {
                        echo "Error uploading image. Please try again.";
                    }
                } else {
                    echo "No image uploaded or there was an error with the image.";
                }






        } else if ($_POST['requestType'] == 'update_dog_details') {

            $dog_type_status = $_POST['dog_type_status'];
            $dog_id = $_POST['dog_id'];
            $dog_name = $_POST['dog_name'];
            $owner_name = $_POST['dog_owner_name'];
            $breeder_name = $_POST['dog_breeder_name'];
            $country = $_POST['dog_country'];
            $color = $_POST['dog_color'];
            $height = $_POST['dog_height'];
            $dob = $_POST['dog_date_of_birth'];
            $contact_number = $_POST['dog_contact_number'];
            $facebook_name = $_POST['dog_facebook_name'];
            $ig_name = $_POST['dog_ig_name'];

            // Check if a file was uploaded
            $dog_image = $_FILES['dog_image'];
            $uniqueFileName =null;
            if (isset($_FILES['dog_image']) && $_FILES['dog_image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../../../static/upload/';
                $fileExtension = pathinfo($dog_image['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid('dog_', true) . '.' . $fileExtension;
                $uploadFilePath = $uploadDir . $uniqueFileName;
                move_uploaded_file($dog_image['tmp_name'], '../../../static/upload/' . $uniqueFileName);
            }

           $result = $db->UpdateDog(
                $dog_id,
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
                $uniqueFileName,
                $dog_type_status
            );

            if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Dog updated successfully.'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'No changes made or error updating data.'
                    ]);
                }


            exit;

        }else if ($_POST['requestType'] == 'updateGenForm') {

            $dogRole=$_POST['dogRole'];
           
            $main_dog_id=$_POST['main_dog_id'];


            $dogType=$_POST['dogType'];

        if($dogType=="registered"){
                $parent_dog_id=$_POST['dog_id'];
                $result = $db->updateGenForm_registered($dogRole,$parent_dog_id,$main_dog_id);

        }else if($dogType=="not_registered"){

               $dogName=$_POST['dogName'];
               

                $dog_image = $_FILES['dog_image'];
                

                if ($dog_image['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = '../../../static/upload/';
                    $fileExtension = pathinfo($dog_image['name'], PATHINFO_EXTENSION);
                    $uniqueFileName = uniqid('dog_', true) . '.' . $fileExtension;
                    $uploadFilePath = $uploadDir . $uniqueFileName;

                    if (move_uploaded_file($dog_image['tmp_name'], $uploadFilePath)) {
                        $result = $db->updateGenForm_not_registered($main_dog_id,$dogRole,$dogName,$uniqueFileName);
                    }
                }
            }

            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else {
            echo 'Else';
        }
    } else {
        echo 'Access Denied! No Request Type.';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

   if (isset($_GET['requestType'])) {
        if ($_GET['requestType'] == 'fetch_all_registered_dogs') {
            $result = $db->fetch_all_registered_dogs();
            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else if ($_GET['requestType'] == 'fetch_all_registered_dogs_once') {

            $dogId=$_GET['dogId'];            
            $result = $db->fetch_all_registered_dogs_once($dogId);
            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else if ($_GET['requestType'] == 'fetch_dogs_generation') {

            $dog_id=$_GET['dog_id'];

            $result = $db->fetch_dogs_generation($dog_id);
            

            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else{
            echo "404";
        }
    }else {
        echo 'No GET REQUEST';
    }

}
?>