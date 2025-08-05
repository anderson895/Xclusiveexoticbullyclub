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

                $dog_name        = $_POST['dog_name'];
                $owner_name      = $_POST['owner_name'];
                $breeder_name    = $_POST['breeder_name'];
                $country         = $_POST['country'];
                $color           = $_POST['color'];
                $height          = $_POST['height'];
                $dob             = $_POST['dob'];
                $contact_number  = $_POST['contact_number'];
                $facebook_name   = $_POST['facebook_name'];
                $facebook_link   = $_POST['facebook_link'];
                $ig_name         = $_POST['ig_name'];
                $ig_link         = $_POST['ig_link'];
                $type            = $_POST['type'];
                $registration    = $_POST['registration'];
                $gender    = $_POST['gender'];

                // FILES
                $dog_image = $_FILES['dog_image'];
                $imgBanner = $_FILES['imgBanner'];

                $uploadDir = '../../../static/upload/';
                $dogImageFileName = '';
                $dogBannerFileName = '';

                if ($dog_image['error'] === UPLOAD_ERR_OK && $imgBanner['error'] === UPLOAD_ERR_OK) {
                    // Upload Dog Image
                    $dogImageExtension = pathinfo($dog_image['name'], PATHINFO_EXTENSION);
                    $dogImageFileName = uniqid('dog_', true) . '.' . $dogImageExtension;
                    $dogImagePath = $uploadDir . $dogImageFileName;

                    // Upload Banner Image
                    $bannerExtension = pathinfo($imgBanner['name'], PATHINFO_EXTENSION);
                    $dogBannerFileName = uniqid('dog_banner_', true) . '.' . $bannerExtension;
                    $bannerPath = $uploadDir . $dogBannerFileName;

                    // Move both files
                    $dogImageUploaded = move_uploaded_file($dog_image['tmp_name'], $dogImagePath);
                    $bannerUploaded = move_uploaded_file($imgBanner['tmp_name'], $bannerPath);

                    if ($dogImageUploaded && $bannerUploaded) {
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
                            $dogImageFileName,
                            $type,
                            $facebook_link,
                            $ig_link,
                            $dogBannerFileName,
                            $gender,
                            $registration
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
                        echo json_encode([
                            'status' => 500,
                            'message' => 'Error uploading one or both images.'
                        ]);
                    }
                } else {
                    echo json_encode([
                        'status' => 400,
                        'message' => 'Missing or invalid image upload.'
                    ]);
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
            $facebook_link = $_POST['dog_facebook_link'];
            $ig_link = $_POST['dog_ig_link'];

            $date_registration = $_POST['dog_date_registration'];
            $gender = $_POST['dog_gender'];

            // Profile Image
            $dog_image = $_FILES['dog_image'];
            $uniqueFileName = null;
            if (isset($_FILES['dog_image']) && $_FILES['dog_image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../../../static/upload/';
                $fileExtension = pathinfo($dog_image['name'], PATHINFO_EXTENSION);
                $uniqueFileName = uniqid('dog_', true) . '.' . $fileExtension;
                move_uploaded_file($dog_image['tmp_name'], $uploadDir . $uniqueFileName);
            }

            // Banner Image
            $dog_banner = $_FILES['dog_banner'];
            $uniqueBannerFileName = null;
            if (isset($_FILES['dog_banner']) && $_FILES['dog_banner']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../../../static/upload/';
                $fileExtension = pathinfo($dog_banner['name'], PATHINFO_EXTENSION);
                $uniqueBannerFileName = uniqid('banner_', true) . '.' . $fileExtension;
                move_uploaded_file($dog_banner['tmp_name'], $uploadDir . $uniqueBannerFileName);
            }

            // Update
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
                $dog_type_status,
                $facebook_link,
                $ig_link,
                $uniqueBannerFileName,
                $gender,
                $date_registration
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

        }else if ($_POST['requestType'] == 'UpdateEvent') {

           $eventId = $_POST['eventId'];
            $eventName_update = $_POST['event_name'];
            $eventDescription_update = $_POST['description'];
            $eventDate_update = $_POST['event_date'];
            $eventTime_update = $_POST['event_time'];

            // Handle Banner Image Upload
            $uniqueBannerFileName = null;
            if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../../../static/upload/';
                $fileExtension = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
                $uniqueBannerFileName = uniqid('event_banner_', true) . '.' . $fileExtension;

                move_uploaded_file($_FILES['banner']['tmp_name'], $uploadDir . $uniqueBannerFileName);
            }

            // Update
            $result = $db->UpdateEvent(
                $eventId,
                $eventName_update,
                $eventDescription_update,
                $eventDate_update,
                $eventTime_update,
                $uniqueBannerFileName // pass banner image if uploaded
            );

            if ($result['status']) {
                echo json_encode([
                    'status' => 200,
                    'message' => $result['message']
                ]);
            } else {
                echo json_encode([
                    'status' => 500,
                    'message' => $result['message']
                ]);
            }

            exit;


        }else if ($_POST['requestType'] == 'UpdateGettable') {

            $gt_id = $_POST['gt_id'];
            $gt_name = $_POST['gt_name'];
            $gt_description = $_POST['gt_description'];
            $gt_link = $_POST['gt_link'];

            // Handle Banner Image Upload
            $uniqueBannerFileName = null;
            if (isset($_FILES['gt_image']) && $_FILES['gt_image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '../../../static/upload/';
                $fileExtension = pathinfo($_FILES['gt_image']['name'], PATHINFO_EXTENSION);
                $uniqueBannerFileName = uniqid('gettable_', true) . '.' . $fileExtension;

                move_uploaded_file($_FILES['gt_image']['tmp_name'], $uploadDir . $uniqueBannerFileName);
            }

            // Update
            $result = $db->UpdateGettable(
                $gt_id,
                $gt_name,
                $gt_description,
                $gt_link,
                $uniqueBannerFileName 
            );

            if ($result['status']) {
                echo json_encode([
                    'status' => 200,
                    'message' => $result['message']
                ]);
            } else {
                echo json_encode([
                    'status' => 500,
                    'message' => $result['message']
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
        }else if ($_POST['requestType'] == 'CreatePageant') {

            $name=$_POST['name'];
            $description=$_POST['description'];

            $result = $db->CreatePageant($name,$description);
            
            if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Added successfully.'
                    ]);
            } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'No changes made or error updating data.'
                    ]);
            }

        }else if ($_POST['requestType'] == 'removeEvents') {

            $event_id=$_POST['event_id'];
            $result = $db->removeEvents($event_id);
            if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Remove successfully.'
                    ]);
            } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'No changes made or error updating data.'
                    ]);
            }
        }else if ($_POST['requestType'] == 'removeGettable') {

            $gt_id=$_POST['gt_id'];
            $result = $db->removeGettable($gt_id);
            if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Remove successfully.'
                    ]);
            } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'No changes made or error updating data.'
                    ]);
            }
        }else if ($_POST['requestType'] == 'removeDog') {

            $dog_id=$_POST['dog_id'];
            $result = $db->removeDog($dog_id);
            if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Remove successfully.'
                    ]);
            } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'No changes made or error updating data.'
                    ]);
            }

        }else if ($_POST['requestType'] == 'AddCategoryShow') {

            $showname=$_POST['name'];
            $contestants=$_POST['contestants'];
            $pagId=$_POST['pagId'];

            $contestants_json = json_encode($contestants);
            
            $result = $db->AddCategoryShow($showname,$contestants_json,$pagId);
            if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'successfully Added.'
                    ]);
            } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'No changes made or error updating data.'
                    ]);
            }

        }else if ($_POST['requestType'] == 'UpdateCategoryContestants') {
            $pc_id=$_POST['pc_id'];
            $contestants=$_POST['contestants'];
            $contestants_json = json_encode($contestants);
            $result = $db->UpdateCategoryContestants($pc_id,$contestants_json);
            if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Update successfully.'
                    ]);
            } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'No changes made or error updating data.'
                    ]);
            }

        }else if ($_POST['requestType'] == 'removeShow') {

            $pc_id=$_POST['pc_id'];
            $result = $db->removeShow($pc_id);
            if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Remove successfully.'
                    ]);
            } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'No changes made or error updating data.'
                    ]);
            }

        }else if ($_POST['requestType'] == 'removePageant') {

            $pag_id=$_POST['pag_id'];
            $result = $db->removePageant($pag_id);
            if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Remove successfully.'
                    ]);
            } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'No changes made or error updating data.'
                    ]);
            }
        }else if ($_POST['requestType'] == 'AddEvent') {

                $event_name  = $_POST['event_name'];
                $description = $_POST['description'];
                $event_date  = $_POST['event_date'];
                $event_time  = $_POST['event_time'];

                // FILES
                $banner = $_FILES['banner'];

                $uploadDir = '../../../static/upload/';
                $dogBannerFileName = ''; // default to empty if no banner

                // Check if a file was uploaded
                if (isset($banner) && $banner['error'] === UPLOAD_ERR_OK) {
                    // Upload Banner Image
                    $bannerExtension = pathinfo($banner['name'], PATHINFO_EXTENSION);
                    $dogBannerFileName = uniqid('event_banner_', true) . '.' . $bannerExtension;
                    $bannerPath = $uploadDir . $dogBannerFileName;

                    $bannerUploaded = move_uploaded_file($banner['tmp_name'], $bannerPath);

                    if (!$bannerUploaded) {
                        echo json_encode([
                            'status' => 500,
                            'message' => 'Error uploading banner image.'
                        ]);
                        exit;
                    }
                } elseif ($banner['error'] !== UPLOAD_ERR_NO_FILE && $banner['error'] !== 0) {
                    echo json_encode([
                        'status' => 400,
                        'message' => 'Invalid image upload.'
                    ]);
                    exit;
                }

                // Save to DB regardless if banner is uploaded or not
                $result = $db->AddEvent(
                    $event_name,
                    $description,
                    $event_date,
                    $event_time,
                    $dogBannerFileName // will be empty string if no image
                );

                if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Posted Successfully.'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'Error saving data.'
                    ]);
                }


        }else if ($_POST['requestType'] == 'AddGettable') {

                $gettableName  = $_POST['gettableName'];
                $gettableDescription = $_POST['gettableDescription'];
                $gettableLink  = $_POST['gettableLink'];

                // FILES
                $banner = $_FILES['gettableImage'];

                $uploadDir = '../../../static/upload/';
                $dogBannerFileName = ''; // default to empty if no banner

                // Check if a file was uploaded
                if (isset($banner) && $banner['error'] === UPLOAD_ERR_OK) {
                    // Upload Banner Image
                    $bannerExtension = pathinfo($banner['name'], PATHINFO_EXTENSION);
                    $dogBannerFileName = uniqid('gettable_', true) . '.' . $bannerExtension;
                    $bannerPath = $uploadDir . $dogBannerFileName;

                    $bannerUploaded = move_uploaded_file($banner['tmp_name'], $bannerPath);

                    if (!$bannerUploaded) {
                        echo json_encode([
                            'status' => 500,
                            'message' => 'Error uploading banner image.'
                        ]);
                        exit;
                    }
                } elseif ($banner['error'] !== UPLOAD_ERR_NO_FILE && $banner['error'] !== 0) {
                    echo json_encode([
                        'status' => 400,
                        'message' => 'Invalid image upload.'
                    ]);
                    exit;
                }

                // Save to DB regardless if banner is uploaded or not
                $result = $db->AddGettable(
                    $gettableName,
                    $gettableDescription,
                    $gettableLink,
                    $dogBannerFileName 
                );

                if ($result) {
                    echo json_encode([
                        'status' => 200,
                        'message' => 'Posted Successfully.'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 500,
                        'message' => 'Error saving data.'
                    ]);
                }


        }else {
            echo '404';
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
        }else if ($_GET['requestType'] == 'fetch_all_gettable') {
            $result = $db->fetch_all_gettable();
            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else if ($_GET['requestType'] == 'fetch_all_events') {
            $result = $db->fetch_all_events();
            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else if ($_GET['requestType'] == 'fetch_search_registered_dogs') {
            $search = $_GET['search'] ?? '';
            
            $dogs = $db->fetch_search_registered_dogs($search); 
                echo json_encode([
                    'status' => 200,
                    'data' => $dogs
                ]);
                exit;

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
        }else if ($_GET['requestType'] == 'fetch_top_10_exclusive') {

            $result = $db->fetch_top_10_exclusive();
            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else if ($_GET['requestType'] == 'fetch_all_pageant') {
            $result = $db->fetch_all_pageant();
            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else if ($_GET['requestType'] == 'fetch_pageant_category') {

            $pagId=$_GET['pagId'];
            $result = $db->fetch_pageant_category($pagId);
            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else if ($_GET['requestType'] == 'fetch_category_contestants') {

            $pc_id=$_GET['pc_id'];
            $result = $db->fetch_category_contestants($pc_id);
            echo json_encode([
                'status' => 200,
                'data' => $result
            ]);
        }else if ($_GET['requestType'] == 'fetch_all_pageant_and_category') {

            $result = $db->fetch_all_pageant_and_category();
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