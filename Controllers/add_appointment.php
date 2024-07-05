<?php
session_start();
include '../Model/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientName = $_POST['patientName'];
    $symptom = $_POST['Symptom'];
    $appointmentDate = $_POST['appoinmentDate'];
    $appointmentTime = $_POST['appoinmentTime'];
    $takingMedications = $_POST['takingMedications'];
    $medicationDetails = isset($_POST['medicationDetails']) ? $_POST['medicationDetails'] : null;
    $contactNo = $_POST['contactNo'];

    // Adjust the time range to accurately reflect your needs
    $timeBefore = date('H:i:s', strtotime($appointmentTime) - 10 * 60);
    $timeAfter = date('H:i:s', strtotime($appointmentTime) + 10 * 60);

    // Improved SQL query to check for overlapping appointments
    $checkQuery = "SELECT * FROM appointment WHERE appointment_date = ? AND (
                    (appointment_time >= ? AND appointment_time <= ?) OR 
                    (ADDTIME(appointment_time, '00:10:00') > ? AND appointment_time < ?)
                   ) AND user_id = ?";
    $checkStmt = $conn->prepare($checkQuery);
    if ($checkStmt) {
        $checkStmt->bind_param("sssssi", $appointmentDate, $timeBefore, $timeAfter, $appointmentTime, $appointmentTime, $user_id);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                $_SESSION['feedback'] = "This time slot is already booked. Please choose a different time.";
                header("Location: index.php");  // Assuming this script redirects back to a page where SweetAlert can be triggered
                exit();
            }
                        exit();
        }
        $checkStmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    // Insert the new appointment if the time slot is available
    $sql = "INSERT INTO appointment (user_id, patient_name, symptom, appointment_date, appointment_time, taking_medications, medication_details, contact_no) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("isssssss", $user_id, $patientName, $symptom, $appointmentDate, $appointmentTime, $takingMedications, $medicationDetails, $contactNo);
        if ($stmt->execute()) {
            header("Location: ../User/index.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
