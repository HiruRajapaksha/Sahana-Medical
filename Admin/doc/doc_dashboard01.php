<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="./img/Logo03.png">

    <title>Sahana Medical|Doctor Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="./assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Full Calander CSS -->
    <link rel="stylesheet" href="./assets/plugins/fullcalendar/fullcalendar.min.css">

    <!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="./css/bo.min.css">

    <link rel="stylesheet" href="./css/doc_Style.css">
		

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper" >

        <?php 
            include 'doc_dashboardHeader.php';
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-3">
                        <h1 class="h3 mb-0 text-gray-800">Doctor Dashboard</h1>
                       
                    </div>

                    <!-------------- Content Row 01 -------------->
                    <div class="row">

                        <!--  Total Users -->
                        <div class="col-xl-3 col-md-6 mb-3" >
                            <div class="card border-left-success shadow h-100 py-2" >
                                <div class="card-body" >
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
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-truncate">Today Appoinments </h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Add</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Close</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    			<!-- Breadcrumb -->
			<!--<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Calendar</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Calendar</h2>
						</div>
						<div class="col-auto text-right float-right ml-auto">
							<a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_event">Create Event</a>
						</div>
					</div>
				</div>
			</div>-->
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Calendar Events -->
						<!--<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Drag & Drop Event</h4>
								</div>
								<div class="card-body">
									<div id="calendar-events" class="mb-3">
										<div class="calendar-events" data-class="bg-info"><i class="fas fa-circle text-info"></i> My Event One</div>
										<div class="calendar-events" data-class="bg-success"><i class="fas fa-circle text-success"></i> My Event Two</div>
										<div class="calendar-events" data-class="bg-danger"><i class="fas fa-circle text-danger"></i> My Event Three</div>
										<div class="calendar-events" data-class="bg-warning"><i class="fas fa-circle text-warning"></i> My Event Four</div>
									</div>
									<div class="checkbox mb-3">
										<input id="drop-remove" type="checkbox">
										<label for="drop-remove">
											Remove after drop
										</label>
									</div>
									<a href="#" data-toggle="modal" data-target="#add_new_event" class="btn btn-primary btn-block">
										<i class="fas fa-plus"></i> Add Category
									</a>
								</div>
							</div>
						</div>-->
						<!-- /Calendar Events -->
						
						<!-- Calendar -->
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
                            <div class="card-body">
									<div id="calendar" class="fc fc-unthemed fc-ltr">
                                        <div class="fc-toolbar fc-header-toolbar">
                                            <div class="fc-left"
                                            ><div class="fc-button-group">
                                                <button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left">
                                                    <span class="fc-icon fc-icon-left-single-arrow"></span></button>
                                                <button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right">
                                                    <span class="fc-icon fc-icon-right-single-arrow"></span></button></div>
                                                    <button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="">today</button>
                                                </div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">mounth</button>
                                                <button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button></div></div><div class="fc-center"><h2>May 2024</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header" style="border-right-width: 1px; margin-right: 18px;"><table><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden scroll; height: 273.666px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content fc-rigid" style=""><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2024-04-28"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2024-04-29"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2024-04-30"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2024-05-01"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2024-05-02"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2024-05-03"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2024-05-04"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2024-04-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2024-04-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2024-04-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-wed fc-past" data-date="2024-05-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-thu fc-past" data-date="2024-05-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-fri fc-past" data-date="2024-05-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-sat fc-past" data-date="2024-05-04"><span class="fc-day-number">4</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style=""><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2024-05-05"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2024-05-06"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2024-05-07"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2024-05-08"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2024-05-09"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2024-05-10"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2024-05-11"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2024-05-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-mon fc-past" data-date="2024-05-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-tue fc-past" data-date="2024-05-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-wed fc-past" data-date="2024-05-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-thu fc-past" data-date="2024-05-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-fri fc-past" data-date="2024-05-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-sat fc-past" data-date="2024-05-11"><span class="fc-day-number">11</span></td></tr></thead><tbody><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-danger  fc-draggable fc-resizable"><div class="fc-content"> <span class="fc-title">My Event Three</span></div><div class="fc-resizer fc-end-resizer"></div></a></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" ><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2024-05-12"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2024-05-13"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2024-05-14"></td><td class="fc-day fc-widget-content fc-wed fc-today fc-state-highlight" data-date="2024-05-15"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-05-16"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-05-17"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-05-18"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2024-05-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-mon fc-past" data-date="2024-05-13"><span class="fc-day-number">13</span></td><td class="fc-day-top fc-tue fc-past" data-date="2024-05-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-wed fc-today fc-state-highlight" data-date="2024-05-15"><span class="fc-day-number">15</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-05-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-05-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-05-18"><span class="fc-day-number">18</span></td></tr></thead><tbody><tr><td rowspan="2"></td><td rowspan="2"></td><td rowspan="2"></td><td class="fc-event-container" rowspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-success fc-draggable"><div class="fc-content"><span class="fc-time">2:18p</span> <span class="fc-title">Test Event 1</span></div></a></td><td rowspan="2"></td><td class="fc-event-container fc-limited"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-purple fc-draggable"><div class="fc-content"><span class="fc-time">7:25a</span> <span class="fc-title">Event Name 4</span></div></a></td><td class="fc-more-cell" rowspan="1"><div><a class="fc-more">+2 more</a></div></td><td rowspan="2"></td></tr><tr class="fc-limited"><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-info fc-draggable"><div class="fc-content"><span class="fc-time">12:58p</span> <span class="fc-title">Test Event 2</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" ><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-05-19"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-05-20"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-05-21"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-05-22"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-05-23"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-05-24"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2024-05-25"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-05-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-05-20"><span class="fc-day-number">20</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-05-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-05-22"><span class="fc-day-number">22</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-05-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-05-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-sat fc-future" data-date="2024-05-25"><span class="fc-day-number">25</span></td></tr></thead><tbody><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end bg-primary fc-draggable"><div class="fc-content"><span class="fc-time">12:11p</span> <span class="fc-title">Test Event 3</span></div></a></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" ><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2024-05-26"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2024-05-27"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2024-05-28"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2024-05-29"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2024-05-30"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2024-05-31"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2024-06-01"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2024-05-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-mon fc-future" data-date="2024-05-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-tue fc-future" data-date="2024-05-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-wed fc-future" data-date="2024-05-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-thu fc-future" data-date="2024-05-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-fri fc-future" data-date="2024-05-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2024-06-01"><span class="fc-day-number">1</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content fc-rigid" style=""><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2024-06-02"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2024-06-03"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2024-06-04"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2024-06-05"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2024-06-06"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2024-06-07"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2024-06-08"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2024-06-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2024-06-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2024-06-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2024-06-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2024-06-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2024-06-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2024-06-08"><span class="fc-day-number">8</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
								</div>
							</div>
						</div>
						<!-- /Calendar -->
						
					</div>

				</div>

			</div>		
			<!-- /Page Cont
                       
                    </div>

                    ------------ Content Row 03 (didnt use this page) -------------->

                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <!--<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-truncate">Employee manage</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Trailblazer Trek<span class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Ranger's Route<span class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Mud-Slinger Circuit<span class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Mudfest Quest<span class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                     <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> 
                                </div>
                            </div> -->

                        </div>

                        <div class="col-lg-6 mb-4">


                        </div>
                    </div>

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


		<!-- Add Event Modal -->
		<div id="add_event" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Event</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Event Name <span class="text-danger">*</span></label>
								<input class="form-control" type="text">
							</div>
							<div class="form-group">
								<label>Event Date <span class="text-danger">*</span></label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" type="text">
								</div>
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Event Modal -->
		
		<!-- Add Event Modal -->
		<div class="modal custom-modal fade none-border" id="my_event">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Event</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer justify-content-center">
						<button type="button" class="btn btn-success save-event submit-btn">Create event</button>
						<button type="button" class="btn btn-danger delete-event submit-btn" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Event Modal -->
		
		<!-- Add Category Modal -->
		<div class="modal custom-modal fade" id="add_new_event">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Category</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Category Name</label>
								<input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
							</div>
							<div class="form-group">
								<label>Choose Category Color</label>
								<select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
									<option value="success">Success</option>
									<option value="danger">Danger</option>
									<option value="info">Info</option>
									<option value="primary">Primary</option>
									<option value="warning">Warning</option>
									<option value="inverse">Inverse</option>
								</select>
							</div>
							<div class="submit-section text-center">
								<button type="button" class="btn btn-primary save-category submit-btn" data-dismiss="modal">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Category Modal -->
	  
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


    		<!-- Bootstrap Core JS -->
		<script src="./js/bootstrap.min.js"></script>
		<script src="./js/popper.min.js"></script>

    		<!-- Full Calendar JS -->
            <script src="./assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="./assets/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="./assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>

        		<!-- Datetimepicker JS -->
		<script src="./js/moment.min.js"></script>
		<script src="./js/bootstrap-datetimepicker.min.js"></script>

        <!-- Custom JS -->
		<script src="./js/script.js"></script>

        		<!-- Sticky Sidebar JS -->
                <script src="./assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="./assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
</body>

</html>
