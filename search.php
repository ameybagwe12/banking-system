<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Search</title>
</head>

<body style="background-color: #00BFFF;">

    <?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/_navbar.php' ?>

    <!--Search Results-->
    <div class="container my-3">
        <h1>Search results for <em>"<?php echo $_GET['search'] ?>"</em></h1>
        <div class="container" style="padding: 20px;">
            <div class="row my-3">
                <div class="d-flex justify-content-evenly">

                    <?php
                    $noResults = true;
                    $query = $_GET["search"];
                    $sql = "SELECT * FROM `customer` WHERE match (`customer_name`, `customer_email`) against ('$query');";
                    $result = mysqli_query($conn, $sql);


                    while ($row = mysqli_fetch_assoc($result)) {

                        echo ' 
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
            ';
                        $noResults = false;
                    }

                    if ($noResults) {
                        echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p class="display-4">No Results Found</p>
                    <p class="lead">Suggestions:
                    <ul>
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li></p>
                    </ul>
                </div>
            </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <?php include 'partials/_footer.php' ?>









    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>