<?php
include '../../Model/connection.php';

// Fetch reviews from the database
$sql = "SELECT `id`, `name`, `message`, `rating`, `created_at` FROM `reviews`";
$result = $conn->query($sql);

$reviews = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;   
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
        <?php include 'doc_reportHeader.php'; ?>

         <div id="content-wrapper" class="d-flex flex-column">

             <div id="content">
                 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                 </nav>

                 <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin Reviews</h1>
                        <a href="#" class="btn btn-success float-end" onclick="generatePDF(); return false;">Review Report</a>
                    </div>

                    <!-- Reviews Section -->
                    <!-------------- Content Row 01 -------------->
                    <div class="row">

                        <!-- Content -->
                        <div class="col-md-12 col-lg-12">
                            <div class="card shadow">

                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">Review Details</h6>
                                </div>
                                <!-- Card Body -  -->
                                <div class="card-body" style="background-color: #ffffff;" >

                                <!--new-->
                                    <div class="container-fluid">

                                    <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Message</th>
                                        <th>Rating</th>
                                        <th>Created Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reviews as $review): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($review['name']) ?></td>
                                        <td><?= htmlspecialchars($review['message']) ?></td>
                                        <td><?= htmlspecialchars($review['rating']) ?></td>
                                        <td><?= htmlspecialchars($review['created_at']) ?></td>
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

                    
                    <!-- End Reviews Section -->
 
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
        const tableColumnNames = ['Name', 'Message', 'Rating', 'Created At'];
        const tableRows = <?php echo json_encode($reviews, JSON_NUMERIC_CHECK); ?>;

        doc.autoTable({
            head: [tableColumnNames],
            body: tableRows.map(row => Object.values(row)),
            theme: 'grid',
            styles: { fontSize: 8 },
            columnStyles: {
                0: {cellWidth: 40}, 
                1: {cellWidth: 'auto'},
                2: {cellWidth: 'auto'},
                3: {cellWidth: 'auto'}
            },
            didDrawCell: (data) => {
                console.log(data.column.index + ':' + data.cell.section);
            }
        });

        doc.save('Review_Report.pdf');
    }
</script>
     <script src="./assets/jquery/jquery.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="./assets/jquery-easing/jquery.easing.min.js"></script>
     <script src="./js/sb-admin-2.min.js"></script>
</body>
</html>
