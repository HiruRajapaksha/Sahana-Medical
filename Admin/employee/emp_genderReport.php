<?php
include '../../Model/connection.php';

$sql = "SELECT user_id, full_name, gender FROM user";
$result = $conn->query($sql);

$users = [];
$maleCount = 0;
$femaleCount = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'user_id' => $row['user_id'],
            'full_name' => $row['full_name'],
            'gender' => $row['gender']
        ];
        if ($row['gender'] == 'Male') {
            $maleCount++;
        } elseif ($row['gender'] == 'Female') {
            $femaleCount++;
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Gender Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./img/Logo03.png">
    <link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include 'emp_reportHeader.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
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

                <div class="container-fluid d-flex row">

                    <div class="col-5 mx-4 shadow mb-2 card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-truncate">User Gender Categories Chart</h6>
                        </div>
                        <!--chart-->
                        <div class="card-body" >
                            <canvas id="genderChart" width="200" height="200"></canvas>
                        </div>
                    </div>


                    <div class="col-6 mx-4 card shadow mb-2">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">User Gender Categories Tabel</h6>
                                </div>
                        <div class="card-body" style="background-color: #ffffff;">
                            <div class="table-responsive"> 
                                <!--table-->
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user) : ?>
                                            <tr>
                                                <td><?= htmlspecialchars($user['full_name']) ?></td>
                                                <td><?= $user['gender'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <canvas id="ageCategoryChart" width="200" height="200"></canvas>
                            <button onclick="generatePDF()" class="btn btn-primary">Generate Report</button>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="text-center my-auto">
                        <span>Copyright &amp; Team - X</span>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('genderChart').getContext('2d');
            const genderChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        label: 'Gender Distribution',
                        data: [<?= $maleCount ?>, <?= $femaleCount ?>],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        });

        function generatePDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Count the number of male and female users
            const maleCount = <?php echo $maleCount; ?>;
            const femaleCount = <?php echo $femaleCount; ?>;

            // Generate the report title and user counts
            const reportTitle = "User Gender Report";
            const userCounts = `Male Users: ${maleCount}, Female Users: ${femaleCount}`;

            // Add the report title and user counts to the PDF
            doc.text(reportTitle, 14, 15);
            doc.text(userCounts, 14, 25);

            // Add the table with user data to the PDF
            doc.autoTable({
                head: [
                    ['Name', 'Gender']
                ],
                body: <?php echo json_encode(array_map(function ($user) {
                            return [$user['full_name'], $user['gender']];
                        }, $users)); ?>,
                startY: 35
            });

            const chartCanvas = document.getElementById('genderChart');
            const chartImgData = chartCanvas.toDataURL('image/png', 1.0);
            const imgProps = doc.getImageProperties(chartImgData);
            const pdfWidth = doc.internal.pageSize.getWidth();

            // Scale down the image size to 70px by 70px
            const chartWidth = 70;
            const chartHeight = 70;

            // Center the chart horizontally on the PDF page
            const chartX = (pdfWidth - chartWidth) / 2;

            // Position the chart below the table
            const chartY = doc.autoTable.previous.finalY + 20;

            doc.addImage(chartImgData, 'PNG', chartX, chartY, chartWidth, chartHeight);

            doc.save('User_Gender_Report.pdf');
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="./js/sb-admin-2.min.js"></script>
</body>

</html>