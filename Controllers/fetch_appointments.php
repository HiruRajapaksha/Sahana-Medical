<?php
include '../Model/connection.php'; // Ensure this path is correct

$sql = "SELECT `appointment_id`, `patient_name`, `symptom`, `appointment_date`, `appointment_time` FROM `appointment`";
$result = $conn->query($sql);
$events = [];

while($row = mysqli_fetch_assoc($result)) {
    $events[] = [
        'id' => $row['appointment_id'],
        'title' => $row['patient_name'],
        'symptom' => $row['symptom'], // Ensure symptom is included here
        'start' => $row['appointment_date'] . 'T' . $row['appointment_time']
    ];
}

$conn->close();
echo json_encode($events);
?>
