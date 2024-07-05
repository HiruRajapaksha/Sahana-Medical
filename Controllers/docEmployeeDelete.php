<?php
 include '../Model/connection.php';

 if (isset($_POST['employee_id']) && !empty($_POST['employee_id'])) {
     $employeeId = $_POST['employee_id'];

     $sql = "DELETE FROM employee WHERE employee_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employeeId);
    $stmt->execute();

     $stmt->close();
    $conn->close();

     echo "Employee deleted successfully.";
} else {
     echo "Error: Employee ID is not set or empty.";
}
?>
