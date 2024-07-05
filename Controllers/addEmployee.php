<?php
 include '../Model/connection.php';

 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['employeeName']) && isset($_POST['email']) && isset($_POST['dateOfBirth']) && isset($_POST['address'])) {
     $employeeName = $_POST['employeeName'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $address = $_POST['address'];

     $sql = "INSERT INTO employee (full_name, email, date_of_birth, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $employeeName, $email, $dateOfBirth, $address);
    $stmt->execute();

     $stmt->close();
    $conn->close();

    header("Location: ../Admin/doc/doc_dashboard.php");
} else {
     echo "Error: Required fields are missing.";
}
?>
