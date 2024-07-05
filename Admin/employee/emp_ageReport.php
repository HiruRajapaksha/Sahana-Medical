<?php
include '../../Model/connection.php';

$sql = "SELECT user_id, full_name, date_of_birth FROM user";
$result = $conn->query($sql);

$users = [];
$adultCount = 0;
$childCount = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dob = new DateTime($row['date_of_birth']);
        $now = new DateTime();
        $age = $now->diff($dob)->y;
        $category = ($age < 18) ? 'Child' : 'Adult';
        $users[] = [
            'user_id' => $row['user_id'],
            'full_name' => $row['full_name'],
            'age' => $age,
            'category' => $category
        ];
        if ($category == 'Adult') {
            $adultCount++;
        } else {
            $childCount++;
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
    <title>User Age Categories</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./img/Logo03.png">
    <link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Chart.js and jsPDF Library -->
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
                            <h6 class="m-0 font-weight-bold text-truncate">User Age Categories Chart</h6>
                        </div>
                        <div class="card-body" >
                            <canvas id="ageCategoryChart" width="200" height="200"></canvas>
                        </div>
                    </div>


                    <div class="col-6 mx-4 card shadow mb-2">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">User Age Categories Tabel</h6>
                                </div>
                        <div class="card-body" style="background-color: #ffffff;">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user) : ?>
                                            <tr>
                                                <td><?= htmlspecialchars($user['full_name']) ?></td>
                                                <td><?= $user['age'] ?></td>
                                                <td><?= $user['category'] ?></td>
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
    document.addEventListener('DOMContentLoaded', function () {
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

    function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    doc.text("Users Age Report", 14, 15);
    doc.autoTable({
        head: [['Name', 'Age', 'Category']],
        body: <?php echo json_encode(array_map(function($user) {
            return [$user['full_name'], $user['age'], $user['category']];
        }, $users)); ?>,
        startY: 30
    });

    const chartCanvas = document.getElementById('ageCategoryChart');
    const chartImgData = chartCanvas.toDataURL('image/png', 1.0);
    const imgProps = doc.getImageProperties(chartImgData);
    const pdfWidth = doc.internal.pageSize.getWidth();
    const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

    const verticalSpace = 20;

    const chartX = (pdfWidth - imgProps.width * 0.1) / 2; // Center horizontally
    const chartY = doc.autoTable.previous.finalY + verticalSpace;
    const chartWidth = imgProps.width * 0.1;
    const chartHeight = imgProps.height * 0.1;

    doc.addImage(chartImgData, 'PNG', chartX, chartY, chartWidth, chartHeight);

    doc.save('User_Age_Report.pdf');
}



</script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="./js/sb-admin-2.min.js"></script>
</body>
</html>
