<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="./img/Logo03.png">

    <title>Sahana Medical|Employee Dashboard|Add Appointment</title>
    <link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" >

    <div id="wrapper" >

        <?php include 'emp_appointmentHeader.php'; ?>
        
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content ">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn" style="background-color: #565E57;" type="button">
                                    <i class="fas fa-search fa-sm" style="color:white;"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav ml-auto style=" >

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-900 small">Employee </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Controllers/logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid " >

\                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Appointment Manage</h1>
                        <a href="emp_apoinment.php" class="btn btn-success float-end " >Appointment View </a>
                    </div> 

                    <div class="row">

                        <div class="col-md-12 col-lg-12">
                            <div class="card shadow">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">Add Appointment</h6>
                                </div>
                                <div class="card-body" style="background-color: #ffffff;" >


                                    <div class="container-fluid ">
                                        <form action="../../Controllers/employeeAddAppoinment.php" method="POST">
                                            <div class="form-group">
                                                <label for="patientName">Patient Name</label>
                                                <input type="text" class="form-control" id="patientName" name="patientName" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="symptom">Symptom</label>
                                                <input type="text" class="form-control" id="symptom" name="symptom" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="appointmentDate">Appointment Date</label>
                                                <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="appointmentTime">Appointment Time</label>
                                                <input type="time" class="form-control" id="appointmentTime" name="appointmentTime" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="takingMedications">Taking Medications</label>
                                                <select class="form-control" id="takingMedications" name="takingMedications" required>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="medicationDetails">Medication Details</label>
                                                <textarea class="form-control" id="medicationDetails" name="medicationDetails"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="contactNo">Contact No</label>
                                                <input type="text" class="form-control" id="contactNo" name="contactNo" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>

                                    </div>
                                     
                            </div>
                        </div>
                        
                    </div>
</div>


                </div>

            

            <!-- Footer -->
            <footer class="sticky-footer bg-succes">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;Team - X</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../index.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="./assets/jquery/jquery.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="./assets/jquery-easing/jquery.easing.min.js"></script>

    <script src="./js/sb-admin-2.min.js"></script>

    <script src="./assets/chart.js/Chart.min.js"></script>

    <script src="./js/demo/chart-area-demo.js"></script>
    <script src="./js/demo/chart-pie-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.1/bootstrap-icons.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>
