<?php
session_start();
require 'db_conn.php';

if(isset($_POST['delete_emp']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['delete_emp']);

    $query = "DELETE FROM employee WHERE employee_id='$employee_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Deleted Successfully";
        header("Location: emp_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Deleted";
        header("Location: emp_index.php");
        exit(0);
    }
}

if(isset($_POST['update_emp']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $full_name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "UPDATE employee SET full_name='$full_name', email='$email', password='$password', address='$address' WHERE employee_id='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Updated Successfully";
        header("Location: emp_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Updated";
        header("Location: emp_index.php");
        exit(0);
    }

}


if(isset($_POST['save_emp']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $bday = mysqli_real_escape_string($con, $_POST['bday']);

    $query = "INSERT INTO employee (full_name,email,password,address,date_of_birth) VALUES ('$name','$email','$password','$address','$bday')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Employee Created Successfully";
        header("Location: emp-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Created";
        header("Location: emp-create.php");
        exit(0);
    }
}

?>