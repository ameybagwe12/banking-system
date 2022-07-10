<!DOCTYPE html>
<html lang="en">

<head>
    <title>Basic Banking System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">

</head>

<body style="background-color: #FEF9A7;">
    <?php include 'partials/_dbconnect.php' ?>
    <?php include 'partials/_navbar.php' ?>

    <table class="table table-dark table-striped" style="margin-top: 50px;">
        <thead>
            <tr>
                <th scope=" col">No.</th>
                <th scope="col">Sender's Name</th>
                <th scope="col">Reciever's Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
            </tr>
        </thead>

        <?php
        $sql = "SELECT * FROM `transfers`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

            $transfer_from = $row['transfer_from'];
            $transfer_to = $row['transfer_to'];

            $sql2 = "SELECT `customer_name` FROM `customer` WHERE `customer_id`='$transfer_from';";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            $sql3 = "SELECT `customer_name` FROM `customer` WHERE `customer_id`='$transfer_to';";
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);

            echo '<tbody>
            <tr>
                <td>' . $row['transfer_id'] . '</td>
                <td>' . $row2['customer_name'] . '</td>
                <td>' . $row3['customer_name'] . '</td>
                <td>' . $row['transfer_amount'] . '</td>
                <td>' . $row['transfer_message'] . '</td>
                <td>' . $row['datetime'] . '</td>
            </tr>
        </tbody>';
        }

        ?>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php include 'partials/_footer.php' ?>
</body>

</html>