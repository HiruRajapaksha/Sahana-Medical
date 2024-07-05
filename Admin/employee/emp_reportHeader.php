<?php
session_start();
include '../../Model/connection.php';

if (!isset($_SESSION['employee_id'])) {
    header("Location:emp_login.php");
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
    <li class="nav-item  mt-1">
        <a class="nav-link" href="emp_dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <div class="sidebar-heading">
        Interface
    </div>


    <li class="nav-item ">
        <a class="nav-link collapsed" href="emp_apoinment" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clock"></i>
            <span>Appoinments </span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="emp_appoinmentRequests.php">Appoinment Requests</a>
                <a class="collapse-item" href="emp_apoinment.php">View </a>
                <a class="collapse-item" href="emp_addApoinment.php">Add </a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="true" aria-controls="collapseStudent">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Calendar</span>
        </a>
        <div id="collapseStudent" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                <a class="collapse-item" href="emp_calendar.php">View Calendar</a>
            </div>
        </div>
    </li>


    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Reports</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                <a class="collapse-item" href="emp_ageReport.php">Age Report</a>
                <a class="collapse-item" href="emp_genderReport.php">Gender Report</a>
                <a class="collapse-item" href="emp_userdetailsReport.php">User Details Report</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->