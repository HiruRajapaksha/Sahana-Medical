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
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include 'emp_appointmentHeader.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
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
                                <button class="btn" style="background-color: #565E57;" type="button" onclick="searchByName()">
                                    <i class="fas fa-search fa-sm" style="color:white;"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                            <button class="btn" style="background-color: #565E57;" type="button" onclick="searchByName()">
                                                <i class="fas fa-search fa-sm" style="color:white;"></i>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-900 small">Employee</span>
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
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading and button -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Appointment Manage</h1>
                        <a href="emp_addApoinment.php" class="btn btn-success float-end">Add Appointment</a>
                    </div>
                    <!-- Content Row 01 -->
                    <div class="row">
                        <!-- Content -->
                        <div class="col-md-12 col-lg-12">
                            <div class="card shadow">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">Appointment Details</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" style="background-color: #ffffff;">
                                    <div class="container-fluid">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="appointmentTable">
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

                                                    if (!isset($_SESSION['employee_id'])) {
                                                        header("Location: emp_login.php");
                                                        exit();
                                                    }

                                                    $sql = "SELECT * FROM appointment WHERE isActive = '1'";
                                                    $stmt = $conn->prepare($sql);
                                                    if ($stmt) {
                                                        $stmt->execute();
                                                        $result = $stmt->get_result();
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr id='row-" . $row['appointment_id'] . "'>";
                                                            echo "<td><span id='patient-name-" . $row['appointment_id'] . "'>" . $row['patient_name'] . "</span></td>";
                                                            echo "<td><span id='symptom-" . $row['appointment_id'] . "'>" . $row['symptom'] . "</span></td>";
                                                            echo "<td><span id='appointment-date-" . $row['appointment_id'] . "'>" . $row['appointment_date'] . "</span></td>";
                                                            echo "<td><span id='appointment-time-" . $row['appointment_id'] . "'>" . $row['appointment_time'] . "</span></td>";
                                                            echo "<td><span id='taking-medications-" . $row['appointment_id'] . "'>" . $row['taking_medications'] . "</span></td>";
                                                            echo "<td><span id='medication-details-" . $row['appointment_id'] . "'>" . $row['medication_details'] . "</span></td>";
                                                            echo "<td><span id='contact-no-" . $row['appointment_id'] . "'>" . $row['contact_no'] . "</span></td>";
                                                            echo "<td>";
                                                            echo "<button class='btn btn-primary btn-sm mr-1' onclick='editAppointment(" . $row['appointment_id'] . ")'>Edit</button>";
                                                            echo "<button class='btn btn-danger btn-sm' onclick='deleteAppointment(" . $row['appointment_id'] . ")'>Delete</button>";
                                                            echo "</td>";
                                                            echo "</tr>";
                                                        }
                                                        $stmt->close();
                                                    } else {
                                                        echo "Error preparing statement: " . $conn->error;
                                                    }

                                                    $conn->close();
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of Begin Page container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Team - X</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
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
    <!-- Button scripts for edit, save, and delete -->
    <script>
        function editAppointment(appointmentId) {
            var patientName = document.getElementById('patient-name-' + appointmentId).innerText;
            var symptom = document.getElementById('symptom-' + appointmentId).innerText;
            var appointmentDate = document.getElementById('appointment-date-' + appointmentId).innerText;
            var appointmentTime = document.getElementById('appointment-time-' + appointmentId).innerText;
            var takingMedications = document.getElementById('taking-medications-' + appointmentId).innerText;
            var medicationDetails = document.getElementById('medication-details-' + appointmentId).innerText;
            var contactNo = document.getElementById('contact-no-' + appointmentId).innerText;
            var selectHtml = "<select id='edit-taking-medications-" + appointmentId + "'>" +
                "<option value='yes'" + (takingMedications === 'yes' ? ' selected' : '') + ">Yes</option>" +
                "<option value='no'" + (takingMedications === 'no' ? ' selected' : '') + ">No</option>" +
                "</select>";

            document.getElementById('patient-name-' + appointmentId).innerHTML = "<input type='text' id='edit-patient-name-" + appointmentId + "' value='" + patientName + "'>";
            document.getElementById('symptom-' + appointmentId).innerHTML = "<input type='text' id='edit-symptom-" + appointmentId + "' value='" + symptom + "'>";
            document.getElementById('appointment-date-' + appointmentId).innerHTML = "<input type='date' id='edit-appointment-date-" + appointmentId + "' value='" + appointmentDate + "'>";
            document.getElementById('appointment-time-' + appointmentId).innerHTML = "<input type='time' id='edit-appointment-time-" + appointmentId + "' value='" + appointmentTime + "'>";
            document.getElementById('taking-medications-' + appointmentId).innerHTML = selectHtml;
            document.getElementById('medication-details-' + appointmentId).innerHTML = "<input type='text' id='edit-medication-details-" + appointmentId + "' value='" + medicationDetails + "'>";
            document.getElementById('contact-no-' + appointmentId).innerHTML = "<input type='text' id='edit-contact-no-" + appointmentId + "' value='" + contactNo + "'>";

            var editButton = document.querySelector("#row-" + appointmentId + " .btn-primary");
            editButton.innerHTML = "Save";
            editButton.setAttribute("onclick", "saveAppointment(" + appointmentId + ")");
        }

        function saveAppointment(appointmentId) {
            var patientName = document.getElementById('edit-patient-name-' + appointmentId).value;
            var symptom = document.getElementById('edit-symptom-' + appointmentId).value;
            var appointmentDate = document.getElementById('edit-appointment-date-' + appointmentId).value;
            var appointmentTime = document.getElementById('edit-appointment-time-' + appointmentId).value;
            var takingMedications = document.getElementById('edit-taking-medications-' + appointmentId).value;
            var medicationDetails = document.getElementById('edit-medication-details-' + appointmentId).value;
            var contactNo = document.getElementById('edit-contact-no-' + appointmentId).value;

            $.ajax({
                type: "POST",
                url: "../../Controllers/update_appointment.php",
                data: {
                    appointment_id: appointmentId,
                    patient_name: patientName,
                    symptom: symptom,
                    appointment_date: appointmentDate,
                    appointment_time: appointmentTime,
                    taking_medications: takingMedications,
                    medication_details: medicationDetails,
                    contact_no: contactNo
                },
                success: function(response) {
                    document.getElementById('patient-name-' + appointmentId).innerText = patientName;
                    document.getElementById('symptom-' + appointmentId).innerText = symptom;
                    document.getElementById('appointment-date-' + appointmentId).innerText = appointmentDate;
                    document.getElementById('appointment-time-' + appointmentId).innerText = appointmentTime;
                    document.getElementById('taking-medications-' + appointmentId).innerText = takingMedications;
                    document.getElementById('medication-details-' + appointmentId).innerText = medicationDetails;
                    document.getElementById('contact-no-' + appointmentId).innerText = contactNo;

                    var editButton = document.querySelector("#row-" + appointmentId + " .btn-primary");
                    editButton.innerHTML = "Edit";
                    editButton.setAttribute("onclick", "editAppointment(" + appointmentId + ")");
                }
            });
        }

        function deleteAppointment(appointmentId) {
            window.location.href = "../../Controllers/delete_appointment.php?appointment_id=" + appointmentId;
        }

        function searchByName() {
            var input = document.querySelector('.navbar-search input[type="text"]');
            var filter = input.value.toUpperCase();
            var table = document.getElementById("appointmentTable");
            var trs = table.getElementsByTagName("tr");

            for (var i = 1; i < trs.length; i++) {
                var tds = trs[i].getElementsByTagName("td")[0]; // Assuming the name is in the first column
                if (tds) {
                    var txtValue = tds.textContent || tds.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        trs[i].style.display = "";
                    } else {
                        trs[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
