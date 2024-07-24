<?php
session_start();

header('Content-Type: application/json');

// Example: Setting session variables for testing purposes
// $_SESSION['user_id'] = '123';
// $_SESSION['user_email'] = 'user@example.com';
// $_SESSION['user_profile_picture'] = 'profile.jpg';

$response = array(
    'user_id' => '',
    'user_email' => '',
    'user_profile_picture' => ''
);

if (isset($_SESSION['user_id'])) {
    $response['user_id'] = $_SESSION['user_id'];
}

if (isset($_SESSION['user_email'])) {
    $response['user_email'] = $_SESSION['user_email'];
}

if (isset($_SESSION['user_profile_picture'])) {
    // Provide the full URL or relative path to the image
    $response['user_profile_picture'] = 'upload/' . $_SESSION['user_profile_picture'];
}

echo json_encode($response);
?>
