<?php
$userId = 1; 

// Fetch user details from MongoDB
$profile = $mongo->user_system->profiles->findOne(["userId" => $userId]);

// Display user details
echo json_encode($profile);
?>
