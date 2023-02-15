<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #3c6e59;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #3c6e59;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
    }
    </style>
</head>
<body>
        <script type="text/javascript">
			function getSimple_interest(){
				var loan = document.getElementById('loan').value;
				var simple_interest = (loan * 0.05 * 0.01);
				document.getElementById('simple_interest').value=simple_interest;
			}
		</script>
		
    <nav class="navbar">

    <a class="navbar-brand" href="#">Welcome <?php echo $fetch_info['name'] ?></a>
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>
    
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Customer
                            <a href="customerlist.php" class="btn btn-primary float-end">View Customer List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" required="true" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" required="true" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label>Marital Status</label>
                                <input type="text" name="marital_status" class="form-control" required="true" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label>Empolyment Status</label>
                                <input type="text" name="emp_status" class="form-control" required="true" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label>Employer Name</label>
                                <input type="text" name="emp_name" class="form-control" required="true" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label>Date of Birth</label>
                                <input type="date" id="date" name="dob" class="form-control date-picker" required="true" autocomplete="off">                       
                            </div>
                            <div class="mb-3">
                                <label>ID Card Type</label>
                                <input type="text" name="id_type" class="form-control" required="true" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required="true" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label>Phone Number</label>
                                <input type="number" name="phonenumber" class="form-control" required="true" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label>Loan</label>
                                <input id="loan" onblur="getSimple_interest();" type="number" name="loan" class="form-control" required="true" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label>Simple Interest</label>
                                <input id="simple_interest" type="number" name="simple_interest" class="form-control" required="true" autocomplete="off" readonly>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_customer" class="btn btn-primary">Save Customer</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>