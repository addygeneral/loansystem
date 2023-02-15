<?php
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

    <title>Customer View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer View Details 
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
                                
                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['firstname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['lastname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Marital Status</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['marital_status'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Empolyment Status</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['emp_status'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Employer Name</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['emp_name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date of Birth</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['dob'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ID Card Type</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['id_type'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['address'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone Number</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['phonenumber'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Loan</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['loan'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Simple Interest</label>
                                        <p class="form-control" readonly>
                                            <?=$customers['Simple_interest'];?>
                                        </p>
                                    </div>
                                    <br>
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