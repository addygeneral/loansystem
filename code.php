<?php
session_start();
require 'connection.php';

if(isset($_POST['delete_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query = "DELETE FROM customers WHERE id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: customerlist.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: customerlist.php");
        exit(0);
    }
}

if(isset($_POST['update_customer']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['customer_id']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $marital_status = mysqli_real_escape_string($con, $_POST['marital_status']);
    $emp_status = mysqli_real_escape_string($con, $_POST['emp_status']);
    $emp_name = mysqli_real_escape_string($con, $_POST['emp_name']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $id_type = mysqli_real_escape_string($con, $_POST['id_type']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $loan = mysqli_real_escape_string($con, $_POST['loan']);
    $Simple_interest = mysqli_real_escape_string($con, $_POST['simple_interest']);


    $query = "UPDATE customers SET firstname='$firstname', lastname='$lastname', marital_status='$marital_status', emp_status='$emp_status',emp_name='$emp_name',dob='$dob',id_type='$id_type',address='$address',phonenumber='$phonenumber',loan='$loan', simple_interest='$Simple_interest' WHERE id='$customer_id' ";
    
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "customer Updated Successfully";
        header("Location: customerlist.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "customer Not Updated";
        header("Location: customerlist.php");
        exit(0);
    }

}


if(isset($_POST['save_customer']))
{
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $marital_status = mysqli_real_escape_string($con, $_POST['marital_status']);
    $emp_status = mysqli_real_escape_string($con, $_POST['emp_status']);
    $emp_name = mysqli_real_escape_string($con, $_POST['emp_name']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $id_type = mysqli_real_escape_string($con, $_POST['id_type']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $loan = mysqli_real_escape_string($con, $_POST['loan']);
    $Simple_interest = mysqli_real_escape_string($con, $_POST['simple_interest']);


    $query = "INSERT INTO customers (firstname,lastname,marital_status,emp_status,emp_name,dob,id_type,address,phonenumber,loan,simple_interest) VALUES ('$firstname','$lastname','$marital_status','$emp_status','$emp_name','$dob','$id_type','$address','$phonenumber','$loan','$Simple_interest')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Customer Created Successfully";
        header("Location: home.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Created";
        header("Location: home.php");
        exit(0);
    }
}

?>
