<?php
session_start();

include '../Model/connection.php';

// Fetch user details from the database
$userSql = "SELECT * FROM user WHERE user_id = ?";
$userStmt = $conn->prepare($userSql);
$userStmt->bind_param("i", $_SESSION['user_id']); // Assuming you store user_id in session
$userStmt->execute();
$userResult = $userStmt->get_result();

if ($userResult->num_rows > 0) {
    $user = $userResult->fetch_assoc();
    $fullName = $user["full_name"];
    $email = $user["email"];
    $date_of_birth = $user["date_of_birth"];
    $weight = $user["weight"];
    $gender = $user["gender"];
    $address = $user["address"];
    $allergies = $user["allergies"];
} else {
    echo "No user data found";
}

// Fetch appointments from the database
$appSql = "SELECT appointment_id, patient_name, appointment_date, isActive FROM appointment WHERE user_id = ?";
$appStmt = $conn->prepare($appSql);
$appStmt->bind_param("i", $_SESSION['user_id']);
$appStmt->execute();
$appResult = $appStmt->get_result();

$appointments = [];
if ($appResult->num_rows > 0) {
    while ($row = $appResult->fetch_assoc()) {
        $appointments[] = $row;
    }
}


$editing = false;

if (isset($_GET['edit'])) {
    $editing = true;
}

// Fetch user details
$sql = "SELECT * FROM user WHERE user_id = ?";
$userStmt = $conn->prepare($sql);
$userStmt->bind_param("i", $_SESSION['user_id']);
$userStmt->execute();
$userResult = $userStmt->get_result();

$user = $userResult->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];    
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $updateSql = "UPDATE user SET full_name = ?, email = ?, date_of_birth = ?, weight = ?, gender = ?, address = ? WHERE user_id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssissii", $fullName, $email, $dateOfBirth, $weight, $gender, $address, $_SESSION['user_id']);
    $updateStmt->execute();

    header('Location: userProfile.php');
    exit;
}



$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

    <link rel="icon" type="image/x-icon" href="./Assets/Logo03.png">

    <title>index</title>
</head>

<body>
    <div class="container-fluid  home">
        <!--Nav-->
        <div class="col-12 ">
        <div class="row" >
            <nav class="navbar navbar-expand-md -tertiary cnav " style="padding-top:20px;padding-bottom:20px">
                <div class="container-fluid " >
                  <a class="navbar-brand" href="#"><h4 style="font-weight: bolder;"></h4>
                    <img  src="../Assets/Logo02.png" alt="" style=" height:3vw;margin-left:40px" >
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class=" navbar-collapse justify-content-center " id="navbarTogglerDemo02" >
                    <ul class="nav justify-content-center sm_navi">
                        <li class="nav-item">
                          <a class="nav-link " href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="aboutUs.php" >About Us</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="blog.php">Blogs</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="reviews.php">Reviews</a>
                        </li>
 
                      </ul>
                  </div>
                  <div>                   
</div>

                  <!--<button  type="submit" style="margin-right:10px"><a class="btn02" href="../Controllers/userLogout.php" >Logout</a></button> -->
                  <a  href="../Controllers/userLogout.php" ><button class="btn02 active"  type="submit" style="margin-right:40px" >Log Out</button>  </a> 
                  
                  
                </div>
            </nav>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.1/font/bootstrap-icons.css" rel="stylesheet">

        </div>

        <!--Page Contents-->
        <div class="row ">
            <div class="col-12 col-md-12 pro d-flex ">


                <div class="col-12 col-md-3 set_mini justify-content-center align-iteam-center">
                    <div class="card cardpro" style="width: 17rem;">
                        <img class="card-img-top p-4" src="./Assets/Logo01.png" alt="Card image cap" style="height:300px; ">
                        <div class="card-body">
                        <form action="" method="post">
            <h3 class="card-title">
                <?php if ($editing): ?>
                    <input type="text" name="fullName" value="<?= htmlspecialchars($fullName); ?>" class="form-control">
                <?php else: ?>
                    <?= htmlspecialchars($fullName); ?>
                <?php endif; ?>
            </h3>                        </div>
                        <form action="" method="post">
            <ul class="list-group">
                <li class="list-group-item">
                    <b>Email:</b> 
                    <?php if ($editing): ?>
                        <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>">
                    <?php else: ?>
                        <?= htmlspecialchars($user['email']); ?>
                    <?php endif; ?>
                </li>
                <!-- <li class="list-group-item">
                    <b>Birth Day:</b>
                    <?php if ($editing): ?>
                        <input type="date" name="dateOfBirth" value="<?= isset($user['date_of_birth']) ? $user['date_of_birth'] : ''; ?>">
                    <?php else: ?>
                        <?= $user['date_of_birth']; ?>
                    <?php endif; ?>
                </li> -->
                <li class="list-group-item">
                    <b>Weight:</b>
                    <?php if ($editing): ?>
                        <input type="number" name="weight" value="<?= $user['weight']; ?>"> KG
                    <?php else: ?>
                        <?= $user['weight']; ?> KG
                    <?php endif; ?>
                </li>
                <li class="list-group-item">
                    <b>Gender:</b>
                    <?php if ($editing): ?>
                        <select name="gender">
                            <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                        </select>
                    <?php else: ?>
                        <?= $user['gender']; ?>
                    <?php endif; ?>
                </li>
                <!-- <li class="list-group-item">
                    <b>Address:</b>
                    <?php if ($editing): ?>
                        <input type="text" name="address" value="<?= isset($user['address']) ? $user['address'] : ''; ?>">
                    <?php else: ?>
                        <?= $user['address']; ?>
                    <?php endif; ?>
                </li> -->
            </ul>
            <?php if ($editing): ?>
                <button type="submit" name="save" class="btn02 mb-2" style="display: block; margin: 0 auto;width:180px;">Save Changes</button>
            <?php else: ?>
            <?php endif; ?>
        </form>
                        <div class="card-body">
                            <a href="?edit=true"><button class="btn02 m-3" style="width:180px;" data-bs-toggle="modal" data-bs-target="#appointmentModal" type="submit">Edit Profile</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-9  justify-content-center align-iteam-center d-flex">

                    <div class="col-12 col-md-12  justify-content-center align-iteam-center">

                        <div class="row justify-content-center ">
                            <!-- <a href="Signup.php"></a><button class="btn_ap m-1" type="submit">Add Appoinments</button>
                            <a href="Signup.php"></a> <button class="btn_ap m-2" type="submit">Add Review</button> -->
                        </div>
                        <div class="row mt-2">
                            <div class="container-fluid apoinment-cover">
                                <div class="container-fluid ">

                                    <h5 class="pro_topic">| Allegies</h5>
                                    <div class="container mt-4">
                                        <div class="col-2 card_c mb-1">
                                            <?php echo $allergies; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="col-12 col-md-12 mt-3  justify-content-center align-iteam-center">
                            <div class="row ">
                                <div class="container-fluid apoinment-cover">
                                    <div class="container ">
                                        <h5 class="pro_topic">| My Appoinments</h5>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-md-12 mt-3 justify-content-center align-items-center">
                                                    <div class="container">
                                                        <div class="row">
                                                            <?php foreach ($appointments as $appointment) : ?>
                                                                <div class="col-2 card_a">
                                                                    <p><?= htmlspecialchars($appointment['patient_name']); ?></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <p><?= htmlspecialchars($appointment['appointment_date']); ?></p></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <p>Status:
                                                                        <?php if ($appointment['isActive'] == 0) : ?>
                                                                            <span class="text-danger">Pending <i class="fas fa-hourglass-half"></i></span>
                                                                        <?php else : ?>
                                                                            <span class="text-success">Approved <i class="fas fa-check"></i></span>
                                                                        <?php endif; ?>
                                                                    </p>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>





                    </div>
                </div>

            </div>





            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>