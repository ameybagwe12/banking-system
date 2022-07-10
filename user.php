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

  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Lato", sans-serif
    }

    .w3-bar,
    h1,
    button {
      font-family: "Montserrat", sans-serif
    }

    .fa-anchor,
    .fa-coffee {
      font-size: 200px
    }
  </style>
</head>

<body style="background-color: #FEF9A7;">
  <?php include 'partials/_dbconnect.php' ?>
  <?php include 'partials/_navbar.php'; ?>

  <?php
  $user_id = $_GET['user_id'];

  session_start();
  $_SESSION['send_id'] = $user_id;

  $sql =  "SELECT * FROM `customer` WHERE `customer_id`= '$user_id';";
  $result = mysqli_query($conn, $sql);

  $num = mysqli_num_rows(($result));

  if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '
            <div class="container mt-4" style="padding: 50px;">
            <div style="justify-content: center;" class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="images/profile.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title">' . $row['customer_name'] . '</h3>
                  <hr>
                  <p class="card-text">Email - <b>' . $row['customer_email'] . '</b></p>
                  <p class="card-text">Contact - <b>' . $row['customer_contact'] . '</b></p>
                  <p class="card-text">Residance - <b>' . $row['customer_city'] . '</b></p>
                  <p class="card-text">' . $row['customer_name'] . '\'s Balance - <b>₹' . $row['current_balance'] . '</b></p>
                  <hr>';


      if ($row['current_balance'] < 10000) {
        echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Transfer Money
                  </button>
                  <hr>
                  <div class="alert alert-warning" role="alert">
                    Your current balance should be more than ₹10000 to avoid penalties.
                  </div>
                </div>
              </div>
            </div>
       </div>
          </div>';
      }
    }
  }
  include 'partials/_transferModal.php';
  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <?php include 'partials/_footer.php' ?>
</body>

</html>