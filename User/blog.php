<?php
    session_start();

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css"> 

    <link rel="icon" type="image/x-icon" href="./Assets/Logo03.png">

    <title>About Us</title>
</head>
<body>

<div class="container-fluid  abouthome">

  <!--Nav--> 
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
                          <a class="nav-link active" href="#">Blogs</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="reviews.php">Reviews</a>
                        </li>
 
                      </ul>
                  </div>
                   <a href="./userProfile.php" style="<?php echo $profileButtonStyle; ?>">
        <button class="btn02" type="submit" style="margin-right:40px">Profile</button>
    </a>                </div>
            </nav>
  </div>

  <!--Page Contents-->      
    <div class="row  ">
    <div class="container settopicb">
            <div class="row " >
                <div class="row col-12 p-4 justify-content-center align-items-center " style=" height:max-content;">
                <div class="col-12 text-center">
                        <h1 class="mb-3 topic3">BLOGS</h1>
                        <p class="para">At Sahana Medical Center, we are dedicated to providing comprehensive and compassionate healthcare services to our community. With a team of highly skilled healthcare .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


   
  <!--footer--> 
  <div class="col-12 mt-3 " style="background-color:#011a0e">
        <?php
        include "footer.php";
        ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>