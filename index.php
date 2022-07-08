<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Basic Banking System</title>
</head>

<body style="background-color: #00BFFF;">
    <?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/_navbar.php' ?>

    <div class="container my-3" style="padding: 20px;">
        <h2 class="text-center my-3">All Customers</h2>
        <div class="row my-3">
            <!-- Fetch all the categories using a while loop -->
            <?php
            session_start();
            session_unset();
            session_destroy();

            $sql =  "SELECT * FROM `customer`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                echo '<div class="col-md-4">
                <div class="card mb-3" style="width: 18rem;">
                    <img src="images/profile.jpg" alt="...">
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title">' . $row['customer_name'] . '</h5>
                        <p class="card-text">Email - <b>' . $row['customer_email'] . '</b></p>
                        <p class="card-text">Contact - <b>' . $row['customer_contact'] . '</b></p>
                        <hr>
                        <a href="user.php?user_id=' . $row['customer_id'] . '&view=' . true . '" class="btn btn-primary">View All Details</a>
                    </div>
                </div>
            </div>';
            }

            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php include 'partials/_footer.php' ?>
</body>

</html>