<?php
session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST["reviewName"];
  $message = $_POST["reviewMessage"];
  $rating = $_POST["rating"];

include '../Model/connection.php';

  $stmt = $conn->prepare("INSERT INTO reviews (name, message, rating) VALUES (?, ?, ?)");
  $stmt->bind_param("ssi", $name, $message, $rating);

  if ($stmt->execute()) {
    echo "Review submitted successfully.";
    header("Location: ../User/reviews.php");
} else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
