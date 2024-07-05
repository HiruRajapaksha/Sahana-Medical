<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="./img/Logo03.png">

    <title>Reveiws</title>

    <!-- Custom fonts for this template-->
    <link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

    <style>
    .card-bod {
      border:1px solid #00401348;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }
    .card-bod:hover {
      transition: transform 0.4s ease-in-out;
    }
    .card-title {
      text-align:right;
      color: #01351b; 
      padding-top: 25px;
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

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper" >

        <?php include 'doc_ratingHeader.php'; ?>
        
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
                                <span class="mr-2 d-none d-lg-inline text-gray-900 small">Doctor </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
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
                        <h1 class="h3 mb-0 text-gray-800">Reveiws</h1>
                    </div> 

                    <!-------------- Content Row 01 -------------->
                    <div class="row">

                        <!-- Content -->
                        <div class="col-md-12 col-lg-12">
                            <div class="card shadow">

                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
                                    <h6 class="m-0 font-weight-bold text-truncate">Employee Details</h6>
                                </div>
                                <!-- Card Body -  -->
                                <div class="card-body" style="background-color: #ffffff;" >

                                <!--new-->
                                    <div class="contaner-fluid">

                                    <div class="row">
                                        <?php if ($result->num_rows > 0): ?>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                            <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-bod">
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
    <!-- End of Page Wrapper -->

<!---------------------------------------------------------------------------------------->
    <!-- Scroll to Top Button-->
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
        function editEmployee(employeeId) {
            var employeeName = document.getElementById('employee-name-' + employeeId).innerText;
            var email = document.getElementById('symptom-' + employeeId).innerText;
            var dateOfBirth = document.getElementById('appointment-date-' + employeeId).innerText;
            var address = document.getElementById('taking-medications-' + employeeId).innerText;
            var joinedDate = document.getElementById('medication-details-' + employeeId).innerText;

            document.getElementById('employee-name-' + employeeId).innerHTML = "<input type='text' id='edit-employee-name-" + employeeId + "' value='" + employeeName + "'>";
            document.getElementById('symptom-' + employeeId).innerHTML = "<input type='text' id='edit-email-" + employeeId + "' value='" + email + "'>";
            document.getElementById('appointment-date-' + employeeId).innerHTML = "<input type='date' id='edit-date-of-birth-" + employeeId + "' value='" + dateOfBirth + "'>";
            document.getElementById('taking-medications-' + employeeId).innerHTML = "<input type='text' id='edit-address-" + employeeId + "' value='" + address + "'>";
            document.getElementById('medication-details-' + employeeId).innerHTML = "<input type='date' id='edit-joined-date-" + employeeId + "' value='" + joinedDate + "'>";

            var editButton = document.querySelector("#row-" + employeeId + " .btn-primary");
            editButton.innerHTML = "Save";
            editButton.setAttribute("onclick", "saveEmployee(" + employeeId + ")");
        }

        function saveEmployee(employeeId) {
            var employeeName = document.getElementById('edit-employee-name-' + employeeId).value;
            var email = document.getElementById('edit-email-' + employeeId).value;
            var dateOfBirth = document.getElementById('edit-date-of-birth-' + employeeId).value;
            var address = document.getElementById('edit-address-' + employeeId).value;
            var joinedDate = document.getElementById('edit-joined-date-' + employeeId).value;

            $.ajax({
                type: "POST",
                url: "../../Controllers/docEmployeeEditDetails.php",
                data: {
                    employee_id: employeeId,
                    employee_name: employeeName,
                    email: email,
                    date_of_birth: dateOfBirth,
                    address: address,
                    joined_date: joinedDate
                },
                success: function(response) {
                    document.getElementById('employee-name-' + employeeId).innerText = employeeName;
                    document.getElementById('symptom-' + employeeId).innerText = email;
                    document.getElementById('appointment-date-' + employeeId).innerText = dateOfBirth;
                    document.getElementById('taking-medications-' + employeeId).innerText = address;
                    document.getElementById('medication-details-' + employeeId).innerText = joinedDate;

                    var editButton = document.querySelector("#row-" + employeeId + " .btn-primary");
                    editButton.innerHTML = "Edit";
                    editButton.setAttribute("onclick", "editEmployee(" + employeeId + ")");
                }
            });
        }

        function deleteEmployee(employeeId) {
            $.ajax({
                type: "POST",
                url: "../../Controllers/docEmployeeDelete.php",
                data: {
                    employee_id: employeeId
                },
                success: function(response) {
                    var row = document.getElementById('row-' + employeeId);
                    row.parentNode.removeChild(row);
                }
            });
        }
    </script>
</body>

</html>
