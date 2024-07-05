<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="./css/login_style.css">

    <link rel="icon" type="image/x-icon" href="./Assets/Logo03.png">

    <title>User Login</title>

</head>

<body>

    <form method="post" action="../Controllers/patientLoginHandler.php">

    <div class="container-fluid d-flex align-items-center justify-content-center" style="height:100vh; background-image: linear-gradient(to right, #1270B0 , #17A1FA);" id="log-page">
        <div class="container col-11 col-md-6  " id="container-center" >
            <div class="row mt-4 ">
                <div class="container col-12 d-flex align-items-center justify-content-center">
                    <h1 class="text-h col-12 col-sm-8 text-primary">LOG IN</h1>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="container col-12 d-flex align-items-center justify-content-center">
                    <input class="form-control col-12 col-sm-8" type="email" name="login-email" id="InputEmail1" placeholder="Enter Your Email" >
                </div>
            </div>
            <div class="row mt-4 ">
                <div class="container d-flex align-items-center justify-content-center">
                    <input class="form-control col-12 col-sm-8" type="password" name="login-pw" id="InputPwd" placeholder="Enter Your Password" >
                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="container d-flex align-items-center justify-content-center ">
                    <!-- New login button -->
                    <button class="btn btn-primary col-12 col-sm-8" type="submit" id="button">Login</button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="container d-flex align-items-center justify-content-center ">
                    <p class="text-primary">Don't have an account? <a href="signup.php" class="text-danger">Sign up here</a></p>
                </div>
            </div>
    </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
