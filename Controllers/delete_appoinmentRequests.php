<!--?php
session_start();
include '../Model/connection.php';

if(isset($_GET['appointment_id'])){
    $appointment_id = $_GET['appointment_id'];

    // Prepare SQL statement to delete the appointment with the specified appointment_id
    $sql = "DELETE FROM appointment WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql);
    
    if($stmt){
        // Bind the parameter
        $stmt->bind_param("i", $appointment_id);
        
        // Execute the statement
        if($stmt->execute()){
            // Appointment deleted successfully
            echo '<script>alert("Appointment deleted successfully")</script>';
            echo '<script>window.history.back()</script>';
        }else{
            // Error occurred while deleting appointment
            echo "Error deleting appointment: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    }else{
        // Error preparing statement
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>-->
<?php
session_start();
include '../Model/connection.php';

if(isset($_GET['appointment_id'])){
    $appointment_id = $_GET['appointment_id'];

    $sqll = "select * from appointment  WHERE appointment_id ='".$appointment_id."'";
            $resultss=mysqli_query($conn,$sqll);
            $roww=mysqli_fetch_assoc($resultss);

            $sql = "select * from user  WHERE user_id ='".$roww['user_id']."'";
            $results=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($results);

           
            $userMail = $row['email'];
            echo $userMail;
            echo "hi";
                $sub = "Your Appointment Reject";
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
                            <p>Your Appointment being Reject because not full fill the requirement!</p>
                            <p>Please Try Again.</p>
                            <p>Thank You For Choose us.</p>
                        </div>
                        <div class="footer">
                            <p>Contact us via WhatsApp for further details.</p>
                        </div>
                    </div>
                </body>
                </html>';




              

    // Prepare SQL statement to delete the appointment with the specified appointment_id
    $sql = "DELETE FROM appointment WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql);
    echo $appointment_id;
    if($stmt){
        // Bind the parameter
        $stmt->bind_param("i", $appointment_id);
        
        // Execute the statement
        if($stmt->execute()){
            // Appointment deleted successfully

           


               //$back="../Admin/employee/emp_apoinment.php";

               include ('../Admin/function/emailsend.php');

            echo '<script>alert("Appointment deleted successfully")</script>';
            echo '<script>window.history.back()</script>';
        }else{
            // Error occurred while deleting appointment
            echo "Error deleting appointment: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    }else{
        // Error preparing statement
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
