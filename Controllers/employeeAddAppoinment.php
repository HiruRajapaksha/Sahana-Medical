<?php
session_start();
include '../Model/connection.php';

$patientName = $_POST['patientName'];
$symptom = $_POST['symptom'];
$appointmentDate = $_POST['appointmentDate'];
$appointmentTime = $_POST['appointmentTime'];
$takingMedications = $_POST['takingMedications'];
$medicationDetails = $_POST['medicationDetails'];
$contactNo = $_POST['contactNo'];
$isActive = 1; 

$sql = "INSERT INTO appointment (patient_name, symptom, appointment_date, appointment_time, taking_medications, medication_details, contact_no, isActive)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; 
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("sssssssi", $patientName, $symptom, $appointmentDate, $appointmentTime, $takingMedications, $medicationDetails, $contactNo, $isActive);
    if ($stmt->execute()) {
        header("Location: ../Admin/employee/emp_apoinment.php");
        exit();
    } else {
        echo "Error executing statement: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$conn->close();
?>
