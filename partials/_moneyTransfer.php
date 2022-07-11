<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styles.css">

    <title>Payment Bill</title>
</head>

<body style="background-color: #FEF9A7;">

    <?php

    session_start();

    $sender_id = $_SESSION['send_id'];
    global $reciever_id;
    global $reciever_name;

    $email_check = false;
    $contact_check = false;
    $code_check = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        include '_dbconnect.php';

        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $amount = (float)$_POST['amount'];
        $note = $_POST['note'];
        $code = (int)$_POST['code'];
        $verCode = $_SESSION['verCode'];

        $sql = "SELECT * FROM `customer` WHERE `customer_email`='$email'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['customer_id'];
            $reciever_name = $row['customer_name'];
            $reciever_id = $id;
            if ($row['customer_email'] == $email) {
                $email_check = true;
            }
            if ($row['customer_contact'] == $contact) {
                $contact_check = true;
            }
            if ($verCode == $code) {
                $code_check = true;
            }
        }


        if (!$email_check || !$code_check || !$contact_check) {
            echo '<div class="container mt-3">
            <div class="alert alert-danger" role="alert">
                <h2 class="alert-heading">TRANSFER UNSUCESSFULL</h2>
                <h4 class="alert-heading">INVALID CREDENTIALS</h4>
                <p><b>Make Sure You Have Filled The Required Fields Correctly.</b></p>
                <p>Date - <b>' . date('l jS \of F Y h:i:s A') . '</b></p>
                <hr>
                <p class="mb-0"><a href="/bankingsystem/user.php?user_id=' . $sender_id . '&view=' . true . '">Retry Payment</a></p>
            </div>
        </div>';
        }

        if ($email_check && $code_check && $contact_check) {

            $sql2 = "UPDATE `customer` SET `current_balance` = `current_balance` - '$amount' WHERE `customer_id` = '$sender_id';";
            $sql3 = "UPDATE `customer` SET `current_balance` = `current_balance` + '$amount' WHERE `customer_id` = '$reciever_id';";

            $result2 = mysqli_query($conn, $sql2);
            $result3 = mysqli_query($conn, $sql3);

            if ($result2 && $result3) {

                $sql5 = "SELECT * FROM `customer` WHERE `customer_id` = '$sender_id';";
                $result5 = mysqli_query($conn, $sql5);

                while ($row = mysqli_fetch_assoc($result5)) {
                    echo '
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="container mt-3">
                <div class="alert alert-success" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="100" height="100" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <h2 class="alert-heading">MONEY TRANSFERRED</h2>
                    <h4 class="alert-heading">YOUR PAYMENT IS SUCCESSFULL</h4>
                    <p>Amount - <b style="color:red">₹' . $amount . '</b></p>
                    <p>Date - <b>' . date('l jS \of F Y h:i:s A') . '</b></p>
                    <hr>
                    <h5>From - <b>' . $row['customer_name'] . '</b></h5>
                    <p>Email - <b>' . $row['customer_email']  . '</b></p>
                    <p>Contact - <b>' . $row['customer_contact'] . '</b></p>
                    <hr>
                    <h5>To - <b>' . $reciever_name . '</b></h5>
                    <p>Email - <b>' . $email . '</b></p>
                    <p>Contact - <b>' . $contact . '</b></p>
                    <hr>
                    <p class="mb-0"><a href="/bankingsystem/index.php">Home Page</a></p>
                </div>
            </div>';
                }


                $sql4 = "INSERT INTO `transfers` (`transfer_from`, `transfer_to`, `transfer_amount`, `datetime`, `transfer_message`) VALUES ('$sender_id', '$reciever_id', '$amount', current_timestamp(), '$note');";
                $result4 = mysqli_query($conn, $sql4);
            } else {
                echo '<div class="container mt-3">
            <div class="alert alert-danger" role="alert">
                <h2 class="alert-heading">TRANSFER UNSUCESSFULL</h2>
                <h4 class="alert-heading">INTERNAL SERVER ERROR</h4>
                <p><b>Please Wait For Some Time.</b></p>
                <p>Date - <b>' . date('l jS \of F Y h:i:s A') . '</b></p>
                <hr>
                <p class="mb-0"><a href="/bankingsystem/user.php?user_id=' . $sender_id . '&view=' . true . '">Retry Payment</a></p>
            </div>
        </div>';
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>