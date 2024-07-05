<?php
include '../Model/connection.php'; 

$sql = "SELECT user_id, full_name, date_of_birth FROM user";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $dob = new DateTime($row['date_of_birth']);
        $now = new DateTime();
        $age = $now->diff($dob)->y;
        $users[] = [
            'user_id' => $row['user_id'],
            'full_name' => $row['full_name'],
            'age' => $age,
            'category' => ($age < 18) ? 'Child' : 'Adult'
        ];
    }
}
$conn->close();
?>
