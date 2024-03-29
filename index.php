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
    <title>Home Page</title>

</head>

<body style="background-color: #FEF9A7;">
    <?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/_navbar.php' ?>

    <!-- Header -->
    <header class="w3-container w3-red w3-center" style="padding:128px 16px">
        <h1 class="w3-margin w3-jumbo">Welcome To TSF Online Banking System</h1>
        <p class="w3-xlarge">Make payments easier and quicker.</p>
    </header>

    <div class="text-center">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="images/transfer_logo1.png" class="rounded" alt="..." width="900px">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="images/transfer_logo2.png" class="rounded" alt="..." width="900px">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="images/transfer_logo3.png" class="rounded" alt="..." width="900px">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
        <div class="w3-content">
            <div class="container my-3" style="padding: 20px;">
                <h2 class="text-center my-3">Customers List</h2>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Details</th>
                        </tr>
                    </thead>
                    <!-- Fetch all the categories using a while loop -->
                    <?php

                    $sql =  "SELECT * FROM `customer`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '
                        <tbody>
                            <tr>
                                <td><img width="40px" src="images/profile.jpg" alt="..."></th>
                                <td>' . $row['customer_name'] . '</td>
                                <td>' . $row['customer_email'] . '</td>
                                <td>' . $row['customer_contact'] . '</td>
                                <td><a href="user.php?user_id=' . $row['customer_id'] . '&view=' . true . '" class="btn btn-primary">View Full Details</a></td>
                            </tr>
                        </tbody>';
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>
    </div>

    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
    <script>
        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php include 'partials/_footer.php' ?>
</body>

</html>