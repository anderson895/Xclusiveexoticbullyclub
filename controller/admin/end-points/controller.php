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

        } else {
            echo 'Else';
        }
    } else {
        echo 'Access Denied! No Request Type.';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
}
?>