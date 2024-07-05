<?php
session_start(); 

include '../Model/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login-email'];
    $password = $_POST['login-pw'];
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM employee WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['employee_id'] = $row['employee_id'];
        $_SESSION['full_name'] = $row['full_name'];
        
        header("Location: ../Admin/employee/emp_dashboard.php");
        // echo "Login successful";
        exit();
    } else {
        echo "Invalid email or password";
    }
}

$stmt->close();
$conn->close();
?>
