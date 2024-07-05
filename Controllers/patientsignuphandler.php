<?php
// Include the database connection file
include '../Model/connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['login-fullname'];
    $email = $_POST['login-email'];
    $birthdate = $_POST['login-birthdate'];
    $weight = $_POST['login-weight'];
    $gender = $_POST['login-gender'];
    $address = $_POST['login-address'];
    $allergies = $_POST['login-allergies'];
    $password = $_POST['login-password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute SQL query to insert patient data into the database
    $sql = "INSERT INTO user (user_id, full_name, email, date_of_birth, weight, gender, address, allergies, password) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("ssssssss", $name, $email, $birthdate, $weight, $gender, $address, $allergies, $hashed_password);
        
        // Execute the query
        if ($stmt->execute()) {
            // Signup successful, redirect to login page
            header("Location: ../User/login.php");
            exit();
        } else {
            // Error occurred during execution
            echo "Error executing query: " . $stmt->error;
        }
    
        // Close the prepared statement
        $stmt->close();
    } else {
        // Error in preparing the statement
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
