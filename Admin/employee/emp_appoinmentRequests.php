<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="./img/Logo03.png">

    <title>Sahana Medical|Employee Dashboard|Appointment View</title>

    <!-- Custom fonts for this template-->
    <link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper" >

        <?php include 'emp_appointmentHeader.php'; ?>
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content ">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto style=" >

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-900 small">Employee </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -------------------------->
                <div class="container-fluid " >

                    <!-------------- Page Heading and button    -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Appointment Manage</h1>
                        <a href="emp_addApoinment.php" class="btn btn-success float-end " > Add Appointment </a>
                    </div> 

                    <!-------------- Content Row 01 -------------->
                    <div class="row">

                        <!-- Content -->
                        <div class="col-md-12 col-lg-12">
                            <div class="card shadow">

                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">Appointment Details</h6>
                                </div>
                                <!-- Card Body -  -->
                                <div class="card-body" style="background-color: #ffffff;" >

                                <!--new-->
                                    <div class="container-fluid">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Patient Name</th>
                                                        <th scope="col">Symptom</th>
                                                        <th scope="col">Appointment Date</th>
                                                        <th scope="col">Appointment Time</th>
                                                        <th scope="col">Taking Medications</th>
                                                        <th scope="col">Medication Details</th>
                                                        <th scope="col">Contact No</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                include '../../Model/connection.php';
                                                $sql = "SELECT * FROM appointment WHERE isActive = 0";
                                                $stmt = $conn->prepare($sql);
                                                if ($stmt->execute()) {
                                                    $result = $stmt->get_result();
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['patient_name'] . "</td>";
                                                        echo "<td>" . $row['symptom'] . "</td>";
                                                        echo "<td>" . $row['appointment_date'] . "</td>";
                                                        echo "<td>" . $row['appointment_time'] . "</td>";
                                                        echo "<td>" . $row['taking_medications'] . "</td>";
                                                        echo "<td>" . $row['medication_details'] . "</td>";
                                                        echo "<td>" . $row['contact_no'] . "</td>";
                                                        echo "<td><button class='btn btn-success btn-sm' onclick='approveAppointment(" . $row['appointment_id'] . ")'>Approve</button> <button class='btn btn-danger btn-sm' onclick='removeAppointment(" . $row['appointment_id'] . ")'>Remove</button></td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "Error: " . $stmt->error;
                                                }
                                                
                                                $stmt->close();
                                                $conn->close();
                                                ?>
                                            </tbody>
                                            </table>
                                        </div>

                                    </div><!--end new-->
                                     
                            </div><!--End Card Body -  -->
                        </div>
                        
                    </div>
                    <!--------------END Content Row 01 -------------->


                </div>
                <!-- end of Begin Page container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-succes">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;Team - X</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
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


    <!-- Bootstrap core JavaScript-->
    <script src="./assets/jquery/jquery.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./assets/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./js/demo/chart-area-demo.js"></script>
    <script src="./js/demo/chart-pie-demo.js"></script>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.1/bootstrap-icons.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Button scripts for edit,save and delete -->
    <script>
    function approveAppointment(appointmentId) {
        $.ajax({
            type: "POST",
            url: "../../Controllers/approve_appoinment.php",
            data: { appointment_id: appointmentId },
            success: function(response) {
                if (response == "success") {
                    alert("Appointment approved successfully!");
                    location.reload();
                } else {
                    alert("Appointment approved successfully!");
                    location.reload();
                }
            }
        });
    }
    </script>
<script>
// JavaScript function to remove appointment
function removeAppointment(appointmentId) {
    if (confirm("Are you sure you want to remove this appointment?")) {
        window.location.href = "../../Controllers/delete_appoinmentRequests.php?appointment_id=" + appointmentId;
    }
}
</script>

</body>

</html>
