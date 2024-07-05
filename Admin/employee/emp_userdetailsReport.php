<?php
include '../../Model/connection.php';

$sql = "SELECT * FROM appointment";
$result = $conn->query($sql);

$appointments = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;   
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sahana Medical|Employee Dashboard|Appointment View</title>

     <link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./img/Logo03.png">
    
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script>
        window.jsPDF = window.jspdf.jsPDF;
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
</head>

<body id="page-top">
     <div id="wrapper">
        <?php include 'emp_reportHeader.php'; ?>

         <div id="content-wrapper" class="d-flex flex-column">

             <div id="content">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading and button -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Employee Manage</h1>
                        <a href="#" class="btn btn-success float-end" onclick="generatePDF(); return false;">Generate Report</a>
                    </div>
                    <!-- Content Row 01 -->
                    <div class="row">
                        <!-- Content -->
                        <div class="col-md-12 col-lg-12">
                            <div class="card shadow">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">Employee Details</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" style="background-color: #ffffff;">
                                    <div class="">
                                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Symptom</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                        <th>Taking Medications</th>
                                        <th>Medication Details</th>
                                        <th>Contact No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($appointments as $appointment): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($appointment['patient_name']) ?></td>
                                        <td><?= htmlspecialchars($appointment['symptom']) ?></td>
                                        <td><?= htmlspecialchars($appointment['appointment_date']) ?></td>
                                        <td><?= htmlspecialchars($appointment['appointment_time']) ?></td>
                                        <td><?= htmlspecialchars($appointment['taking_medications']) ?></td>
                                        <td><?= htmlspecialchars($appointment['medication_details']) ?></td>
                                        <td><?= htmlspecialchars($appointment['contact_no']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
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

                
 
             <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright">
                        <span>Copyright &amp; Team - X</span>
                    </div>
                </div>
            </footer>
         </div>
     </div>
     
     <script>
    function generatePDF() {
        const doc = new jsPDF();  
        const tableColumnNames = ['Patient Name', 'Symptom', 'Appointment Date', 'Appointment Time', 'Taking Medications', 'Medication Details', 'Contact No'];
         const tableRows = <?php echo json_encode(array_map(function($appointment) {
            return [
                htmlspecialchars($appointment['patient_name']),
                htmlspecialchars($appointment['symptom']),
                htmlspecialchars($appointment['appointment_date']),
                htmlspecialchars($appointment['appointment_time']),
                htmlspecialchars($appointment['taking_medications']),
                htmlspecialchars($appointment['medication_details']),
                htmlspecialchars($appointment['contact_no'])
            ];
        }, $appointments), JSON_NUMERIC_CHECK); ?>;

        doc.autoTable({
            head: [tableColumnNames],
            body: tableRows,
            theme: 'grid',
            styles: { fontSize: 8 },
            columnStyles: {
                0: {cellWidth: 40}, 
                1: {cellWidth: 'auto'},
                2: {cellWidth: 'auto'},
                3: {cellWidth: 'auto'},
                4: {cellWidth: 'auto'},
                5: {cellWidth: 'auto'},
                6: {cellWidth: 'auto'}
            },
            didDrawCell: (data) => {
                console.log(data.column.index + ':' + data.cell.section);
            }
        });

        doc.save('Appointment_Details_Report.pdf');
    }
</script>
     <script src="./assets/jquery/jquery.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="./assets/jquery-easing/jquery.easing.min.js"></script>
     <script src="./js/sb-admin-2.min.js"></script>
</body>
</html>
