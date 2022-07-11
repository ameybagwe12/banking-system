<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/styles.css">

    <title>Customers</title>
</head>

<body style="background-color: #FEF9A7;">
    <?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/_navbar.php'; ?>

    <div class="container my-3">
        <h2 class="text-center my-3" style="padding: 70px;">Browse All Customers</h2>
        <div class="row my-3">
            <!-- Fetch all the categories using a while loop -->
            <?php
            $sql =  "SELECT * FROM `customer`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                // echo $row['category_id'];
                // echo $row['category_name'];

                $customer_name = $row['customer_name'];
                $id = $row['customer_id'];
                $customer_email = $row['customer_email'];
                $customer_contact = $row['customer_contact'];
                echo '<div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="images/profile.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $customer_name . '</a></h5>
                        <hr>
                        <p class="card-text"><b>Email</b> - ' . $customer_email . '...</p>
                        <p class="card-text"><b>Contact</b> - ' . $customer_contact . '...</p>
                        <hr>
                        <a href="user.php?user_id=' . $id . '&view=' . true . '" class="btn btn-primary">View Full Details</a>
                    </div>
                </div>
            </div>';
            }

            ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php include 'partials/_footer.php' ?>
</body>

</html>