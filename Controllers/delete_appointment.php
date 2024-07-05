<?php
session_start();
include '../Model/connection.php';


if(isset($_GET['appointment_id'])){
    $appointment_id = $_GET['appointment_id'];

    $sql = "DELETE FROM appointment WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql);
    if($stmt){
        $stmt->bind_param("i", $appointment_id);
        if($stmt->execute()){
            echo '<script>alert("Appointment deleted successfully")</script>';
            echo '<script>window.history.back()</script>';

        }else{
            echo "Error deleting appointment: " . $stmt->error;
        }
        $stmt->close();
    }else{
        echo "Error preparing statement: " . $conn->error;
    }
}
$conn->close();
?>
