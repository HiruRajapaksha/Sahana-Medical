<?php
        session_start();
            include '../../Model/connection.php';

            if (!isset($_SESSION['doctor_id'])) {
                header("Location:doc_login.php");
            exit();
}

$sql = "SELECT * FROM employee";
$result = $conn->query($sql);

                            
$conn->close();
?>
                                
                                <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion pt-4" style="background-color: #004013;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center my-4" href="index.php">
                <h2 style="font-size: 24px; font-weight:900;"> <img src="./img/Logo04white.png" alt="" style="width:110px"> </h2>
        </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active mt-1">
                <a class="nav-link" href="doc_dashboard01.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <div class="sidebar-heading">
                Interface
            </div>

            
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>Appoinments </span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="doc_appointmentVeiw.php">View </a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseadmin"
                    aria-expanded="true" aria-controls="collapseadmin">
                    <i class="fas fa-fw fa-user-shield"></i>
                    <span>Employee Managment</span>
                </a>
                <div id="collapseadmin" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="doc_empview.php">View Employee</a>
                        <a class="collapse-item" href="doc_empadd.php">Add Employee</a>
                    </div>
                </div>
            </li>


                        
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                        <a class="collapse-item" href="doc_reviewReport.php">Reviews Report</a>
                        <a class="collapse-item" href="doc_disease_Report.php">Disease Report</a>
                    </div>
                </div>
            </li>

                                    
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseadmi"
                    aria-expanded="true" aria-controls="collapseadmin">
                    <i class="fas fa-star"></i>
                    <span>Rating</span>
                </a>
                <div id="collapseadmi" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="doc_ratingveiw.php">All Rating</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRevenue"
                    aria-expanded="true" aria-controls="collapseRevenue">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Manage Payment</span>
                </a>
                <div id="collapseRevenue" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="#">Add Payment</a>
                        <a class="collapse-item" href="#">View Payments</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div>
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block"> 

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->