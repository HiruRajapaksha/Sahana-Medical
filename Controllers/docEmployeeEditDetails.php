<?php
 include '../Model/connection.php';

 if (isset($_POST['employee_id']) && !empty($_POST['employee_id'])) {
     $employeeId = $_POST['employee_id'];
    $employeeName = $_POST['employee_name'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $joinedDate = $_POST['joined_date'];

     $sql = "UPDATE employee SET full_name=?, email=?, date_of_birth=?, address=?, join_date=? WHERE employee_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $employeeName, $email, $dateOfBirth, $address, $joinedDate, $employeeId);
    $stmt->execute();

     $stmt->close();
    $conn->close();

     echo "Employee details updated successfully.";
} else {
     echo "Error: Employee ID is not set or empty.";
}
?>
