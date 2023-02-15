<?php
session_start();
require 'connection.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Customer Edit</title>
</head>
<body>
        <script type="text/javascript">
			function getSimple_interest(){
				var loan = document.getElementById('loan').value;
				var simple_interest = (loan * 0.05 * 0.01);
				document.getElementById('simple_interest').value=simple_interest;
			}
		</script>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Edit 
                            <a href="customerlist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $customer_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM customers WHERE id='$customer_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $customers = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="customer_id" value="<?= $customers['id']; ?>">

                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" value="<?=$customers['firstname'];?>" class="form-control" required="true" autocomplete="off" >
                                    </div>

                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" value="<?=$customers['lastname'];?>" class="form-control" required="true" autocomplete="off" >
                                    </div>

                                    <div class="mb-3">
                                        <label>Marital Status</label>
                                        <input type="text" name="marital_status" value="<?=$customers['marital_status'];?>" class="form-control" required="true" autocomplete="off" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Empolyment Status</label>
                                        <input type="text" name="emp_status" value="<?=$customers['emp_status'];?>" class="form-control" required="true" autocomplete="off" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Employer Name</label>
                                        <input type="text" name="emp_name" value="<?=$customers['emp_name'];?>" class="form-control" required="true" autocomplete="off" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" value="<?=$customers['dob'];?>" class="form-control date-picker" required="true" autocomplete="off" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>ID Card Type</label>
                                        <input type="text" name="id_type" value="<?=$customers['id_type'];?>" class="form-control" required="true" autocomplete="off" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <input type="text" name="address" value="<?=$customers['address'];?>" class="form-control" required="true" autocomplete="off" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Phone Number</label>
                                        <input type="number" name="phonenumber" value="<?=$customers['phonenumber'];?>" class="form-control" required="true" autocomplete="off" >
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>Loan</label>
                                        <input id="loan" type="number" name="loan" onblur="getSimple_interest();" value="<?=$customers['loan'];?>" class="form-control" required="true" autocomplete="off" >
                                    </div>
                                    <div class="mb-3">
                                        <label>Simple Interest</label>
                                        <input id="simple_interest" type="number" name="simple_interest" value="<?=$customers['Simple_interest'];?>" class="form-control" required="true" autocomplete="off" readonly>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <button type="submit" name="update_customer" class="btn btn-primary">
                                            Update Customer
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
