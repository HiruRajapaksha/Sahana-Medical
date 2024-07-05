<?php
session_start(); 

include '../Model/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login-email'];
    $password = $_POST['login-pw'];
    
     $stmt = $conn->prepare("SELECT * FROM doctor WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['doctor_id'] = $row['doctor_id'];
        $_SESSION['full_name'] = $row['full_name'];
        
        header("Location: ../Admin/doc/doc_dashboard01.php");
        // echo "Login successful";
        exit();
    } else {
        echo "Invalid email or password";
    }
}

$stmt->close();
$conn->close();
?>
