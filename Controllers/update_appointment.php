<?php
session_start();
include '../Model/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $appointment_id = $_POST['appointment_id'];
    $patient_name = htmlspecialchars($_POST['patient_name']);
    $symptom = htmlspecialchars($_POST['symptom']);
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $taking_medications = htmlspecialchars($_POST['taking_medications']);
    $medication_details = htmlspecialchars($_POST['medication_details']);
    $contact_no = htmlspecialchars($_POST['contact_no']);

    // Update the appointment in the database
    $sql = "UPDATE appointment SET patient_name=?, symptom=?, appointment_date=?, appointment_time=?, taking_medications=?, medication_details=?, contact_no=? WHERE appointment_id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssii", $patient_name, $symptom, $appointment_date, $appointment_time, $taking_medications, $medication_details, $contact_no, $appointment_id);
        if ($stmt->execute()) {
            echo "Appointment updated successfully";
        } else {
            echo "Error updating appointment: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
