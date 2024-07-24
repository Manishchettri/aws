<?php
// Check if the file was uploaded without errors
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    // Define the upload directory
    $uploadDir = 'upload/';

    // Get the uploaded file's name
    $fileName = $_FILES['profile_picture']['name'];

    // Generate a unique filename to prevent overwriting existing files
    $uniqueFileName = uniqid() . '_' . $fileName;

    // Path to store the uploaded file
    $uploadPath = $uploadDir . $uniqueFileName;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadPath)) {
        // Return the filename so it can be displayed in the dashboard
        echo json_encode(['success' => true, 'file_name' => $uniqueFileName]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to move the uploaded file.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No file uploaded or an error occurred during upload.']);
}
?>
