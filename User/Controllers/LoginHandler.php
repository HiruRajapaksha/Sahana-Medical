<?php
include('./UserConfig.php');

if (isset($_POST['login'])) {
    $email = $_POST['InputEmail1'];
    $password = $_POST['InputPwd'];
    
    $sql = "SELECT * FROM `user` WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);

    // Execute query
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $row['id'];
        header("location: ../User/userdashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
} else {
    echo "Invalid Access Method";
}
?>
