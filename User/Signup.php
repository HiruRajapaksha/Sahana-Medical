<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap-grid.rtl.min.css">
    <link rel="stylesheet" href="./css/form_style.css">

    <link rel="icon" type="image/x-icon" href="./Assets/Logo03.png">

    <title>Admin Login</title>

</head>

<body>

    <form method="post" action="../Controllers/patientsignuphandler.php">

        <div class="container-fluid d-flex align-items-center justify-content-center" style="height:100vh;" id="log-page">
            <div class="container col-11 col-md-8  " id="container-center">
                <div class="row  mt-4 ">
                    <div class="container col-12 d-flex align-items-center justify-content-center">
                        <h1 class="text-h col-12 col-sm-8">Sign Up</h1>
                    </div>
                </div>

                <div class="row mt-4 ">
                    <div class="container col-12 d-flex align-items-center justify-content-center">
                        <input class=" col-12 col-sm-10" type="text" name="login-fullname" id="InputName" placeholder="Full Name" required>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="container col-12 d-flex align-items-center justify-content-center">
                        <input class=" col-12 col-sm-10" type="email" name="login-email" id="InputEmail1" placeholder="Email" required>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="container d-flex align-items-center justify-content-center">
                        <input class=" col-3 col-sm-3" type="date" name="login-birthdate" id="Bd" placeholder="Birth Date" required>
                        <input class=" col-3 col-sm-3" type="text" name="login-weight" id="Weight" placeholder="Weight (add Kg)" required>

                        <div class="row mt-1">
                            <div class="container d-flex align-items-center justify-content-center">
                                <select class="form-select col-sm-3" name="login-gender" id="Gender" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="container d-flex align-items-center justify-content-center">
                        <input class=" col-5 col-sm-4" type="textarea" name="login-address" id="InputAddress" placeholder="Address" required>
                        <input class=" col-5 col-sm-4" type="textarea" name="login-allergies" id="InputAllegi" placeholder="Allergies" required>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="container d-flex align-items-center justify-content-center">
                        <input class=" col-12 col-sm-7" type="password" name="login-password" id="InputPwd" placeholder="Password" required>
                    </div>
                </div>
                <div class="row mt-3 ">
                    <div class="container d-flex align-items-center justify-content-center">
                        <input class=" col-12 col-sm-7" type="password" name="login-password" id="InputCPwd" placeholder="Conform Password" required>
                    </div>
                </div>
                <div class="row mt-4 mb-1">
                    <div class="container d-flex align-items-center justify-content-center ">
                        <button class="text-white text-button col-12 col-sm-10 btn" type="submit" id="buttonSign">
                            <h4 class="text-a">Sign Up</h4>
                        </button>
                    </div>
                </div>
                <div class="row mt-1 mb-2">
                    <div class="container d-flex align-items-center justify-content-center ">
                        or
                    </div>
                </div>
                <div class="row  mb-5">
                    <div class="container d-flex align-items-center justify-content-center">
                        <a href="Login.php" class="text-white text-button col-12 col-sm-10 btn" style="text-decoration: none;">
                            <h4 class="text-a">Login</h4>
                        </a>
                    </div>
                </div>
            </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>