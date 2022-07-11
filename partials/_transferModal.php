<!-- Modal -->
<?php
echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter the Reciever\'s Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form action="partials/_moneyTransfer.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Add a Note</label>
                        <input type="text" class="form-control" id="note" name="note" required>
                    </div>
                    <?php
                    $_SESSION["verCode"] = rand(100000, 999999)';
echo '<h1>' . $_SESSION["verCode"] . '</h1>

<div class="mb-3">
    <label for="code" class="form-label">Verification Code</label>
    <input type="password" class="form-control" id="code" name="code" required>
    <div id="emailHelp" class="form-text">Please enter the verification code given below for confirmation of payment.</div>
</div>

<button type="submit" class="btn btn-primary">Pay</button>
</div>
<div class="modal-footer">
    </form>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>';
?>