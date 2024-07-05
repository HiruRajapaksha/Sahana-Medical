
<?php
include '../Model/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['appointment_id'])) {
    $appointmentId = intval($_POST['appointment_id']);
    $sql = "UPDATE appointment SET isActive = 1 WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $appointmentId);
        if ($stmt->execute()) {
            $sqll = "select * from appointment  WHERE appointment_id ='".$appointmentId."'";
            $resultss=mysqli_query($conn,$sqll);
            $roww=mysqli_fetch_assoc($resultss);

            $sql = "select * from user  WHERE user_id ='".$roww['user_id']."'";
            $results=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($results);

            $userMail = $row['email'];
                $sub = "Your Appointment Approved";
                $body = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Project Ready for Purchase</title>
                    <style>
                        
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f5f5f5;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #ffffff;
                            border-radius: 10px;
                            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
                        }
                        .header {
                            text-align: center;
                            padding: 20px 0;
                        }
                        .content {
                            padding: 20px 0;
                            text-align: left;
                        }
                        .project-info {
                            font-size: 20px;
                            font-weight: bold;
                            color: #007bff;
                            margin-top: 10px;
                        }
                        .footer {
                            text-align: center;
                            padding: 20px 0;
                            color: #777777;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="header">
                            <h1>Shana Medical Center</h1>
                        </div>
                        <div class="content">
                            <p>Hello Sir,</p>
                            <p>Your Appointment being Approved!</p>
                            <p>Thank You For Choose us.</p>
                        </div>
                        <div class="footer">
                            <p>Contact us via WhatsApp for further details.</p>
                        </div>
                    </div>
                </body>
                </html>';

include ('../Admin/function/emailsend.php');
            echo "";
        } else {
            echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
} else {
    echo "Invalid request or missing parameters";
}
?>
