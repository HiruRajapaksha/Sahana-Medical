<?php

include '../Model/connection.php';

// Fetch reviews from the database
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

if(!isset($_SESSION['user_id'])) {
  $profileButtonStyle = "display: none;";  
} else {
  $profileButtonStyle = "";  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  

  <link rel="icon" type="image/x-icon" href="./Assets/Logo03.png">

  <link rel="stylesheet" href="./css/style.css">

  <style>
    .card {
      border-radius: 25px;
      border:none;
      padding-bottom: 30px;
      margin-bottom: 20px;
    border-width: 3px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.227);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    }
    .card-body {
      border-radius: 25px;

    }
    .card-body:hover {
      transform:  scale(1.1); 
      transition: transform 0.4s ease-in-out;
    }
    .card-title {
      text-align:right;
      color: #01351b; 
      padding-top: 5px;
      text-transform: uppercase;
    }
    .card-text {
      padding: 8px 8px 0 8px;
      color: #01351b; 
      font-size:15px;
    }
    .card-sub-text{
      padding: 8px;
      color: #01351b; 
      font-size:13px;
    }
  </style>
</head>
<body>

<div class="container-fluid  abouthome">

  
  <!--Page Contents-->      
    <div class="row  ">
    <div class="container-fluid">
            <div class="row " >
                <div class="row col-12 p-4 justify-content-center align-items-center " style=" height:max-content;">
                <div class="col-12">
                        <h1 class="mb-3 topic">CUSTOMER REVIEWS</h1>
                        <p class="para">At Sahana Medical Center, we are dedicated to providing comprehensive and compassionate healthcare services to our community. With a team of highly skilled healthcare .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid " style="padding: 0 70px 70px 70px;" >
  <div class="row">
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-md-4">
          <div class="card mt-1">
            <div class="card-body mt-3">
              <h4 class="card-title text-center"><?php echo $row["name"]; ?>  </h4>
              <h4 class="card-text  text-center"> <?php echo $row["rating"]; ?>.0 <i class="fas fa-star"></i></h4>
              <p class="card-text text-center">"<?php echo $row["message"]; ?>"</p>
              <p class="card-sub-text text-center"><small class="text-muted">Created at: <?php echo $row["created_at"]; ?></small></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="col">
        <div class="alert alert-info" role="alert">
          No reviews yet.
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>
