<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="./img/Logo03.png">

    <title>Sahana Medical|Employee Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include 'emp_dashboardHeader.php';
        ?>

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
                    <ul class="navbar-nav ml-auto style=">

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
                <div class="container-fluid ">

                    <!-------------- Page Heading and button    -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h1 class="h3 mb-0 text-gray-800">Employee Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #0075423c; color:black;"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-------------- Content Row 01 -------------->
                    <div class="row">

                        <!--  Total Users -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Total Patients</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas  fa-2x text-success">
                                                <?php
                                                include '../../Model/connection.php';

                                                $sql = "SELECT * FROM user";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows) {
                                                    echo $result->num_rows; // Display the number of rows returned
                                                } else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }
                                                ?>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Employees -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Total Employees</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas  fa-2x text-success">
                                                <?php
                                                include '../../Model/connection.php';

                                                $sql = "SELECT * FROM employee";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows) {
                                                    echo $result->num_rows; // Display the number of rows returned
                                                } else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }
                                                ?>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Appoinments -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> </div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Total Appoinments</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas  fa-2x text-success">
                                                <?php
                                                include '../../Model/connection.php';

                                                $sql = "SELECT * FROM appointment";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows) {
                                                    echo $result->num_rows; // Display the number of rows returned
                                                } else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }
                                                ?>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Total Reviews</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas  fa-2x text-success">
                                                <?php
                                                include '../../Model/connection.php';

                                                $sql = "SELECT * FROM reviews";
                                                $result = $conn->query($sql);

                                                if ($result->num_rows) {
                                                    echo $result->num_rows; // Display the number of rows returned
                                                } else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }
                                                ?>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-------------- Content Row 02 -------------->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-9">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">Today Appoinments </h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>

                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="container-fluid">
                                    <div class="container-fluid ml-1 mb-2">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <!--    <div class="card shadow mb-4">
                                Card Header - Dropdown 
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">Revenue Contribution</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>-->

                            <!--<div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                    <canvas id="ageCategoryChart" width="200" height="200"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Digree Level
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>-->

                        </div>

                        <!-------------- Content Row 03 (didnt use this page) -------------->

                        <div class="row">

                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">
                            </div>

                            <div class="col-lg-6 mb-4">

                            </div>
                        </div>

                    </div>
                    <!-- end of Begin Page container-fluid -->


                </div>
                <!-- End of Main Content -->


                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->
            <!-- Footer -->
            <footer class="sticky-footer bg-succes">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;Team - X</span>
                    </div>
                </div>
            </footer>

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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="./assets/jquery/jquery.min.js"></script>
        <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        <script>
            // PHP code to fetch data for the chart
            <?php
            include '../../Model/connection.php';
            $today = date('Y-m-d');
            $sql = "SELECT * FROM appointment WHERE appointment_date = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $today);
            $stmt->execute();
            $result = $stmt->get_result();
            $appointments = [];
            while ($row = $result->fetch_assoc()) {
                $appointments[] = $row;
            }
            $hourlyCounts = array_fill(0, 24, 0);
            foreach ($appointments as $appointment) {
                $hour = date('H', strtotime($appointment['appointment_time']));
                $hourlyCounts[(int)$hour]++;
            }
            ?>
            // JavaScript to render the chart using Chart.js
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(range(0, 23)); ?>,
                    datasets: [{
                        label: 'Appointments',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: <?php echo json_encode($hourlyCounts); ?>
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        <script>
            // PHP code to fetch data for the chart
            <?php
            include '../../Model/connection.php';
            $sql = "SELECT MONTH(date) as month, COUNT(*) as patient_count FROM user GROUP BY MONTH(date)";
            $result = $conn->query($sql);
            $monthlyPatientCount = [];
            while ($row = $result->fetch_assoc()) {
                $monthlyPatientCount[$row['month']] = $row['patient_count'];
            }
            ?>

            var ctx = document.getElementById('monthlyPatientCountChart').getContext('2d');
            var monthlyPatientCountChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode(array_keys($monthlyPatientCount)); ?>,
                    datasets: [{
                        label: 'Monthly Patient Count',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: <?php echo json_encode(array_values($monthlyPatientCount)); ?>
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });



            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('ageCategoryChart').getContext('2d');
                const ageCategoryChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Adults', 'Children'],
                        datasets: [{
                            label: 'Age Categories',
                            data: [<?= $adultCount ?>, <?= $childCount ?>],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)'
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        }
                    }
                });
            });
        </script>


</body>

</html>