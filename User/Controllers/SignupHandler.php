<?php session_start();

    if(isset($_POST["buttonSign"]))
    {
        
        $fullname = $_POST["InputName"];
	    $email = $_POST["InputEmail1"];
	    $BirthDay = $_POST["Bd"];
	    $Weight = $_POST["Weight"];
	    $Gender = $_POST["Gender"];
        $Address = $_POST["InputAddress"];
	    $Allegi = $_POST["InputAllegi"];
	    $password = $_POST["InputPwd"];

        $con = mysqli_connect("localhost","root","","sahana_medic");


        if(!$con)
        {
            die("Sorry! we are facing a technical issue");
        }

        $sql ="INSERT INTO `user`(`name`, `email`, `bday`, `weight`, `gender`, `address`, `allegis`, `password`) VALUES 
        ('".$fullname."','".$email."','".$BirthDay."','".$Weight."','".$Gender."','".$Address."','".$Allegi."','".$password."');";

        $result = mysqli_query($con,$sql);
		header('location: userDashboard.php');
    }
