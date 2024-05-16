<?php 
include('../includes/db.inc.php');
session_start(); // Ensure session is started if it's needed elsewhere
if (isset($_GET['source']) and $_GET['source'] == "checkoutpage") {
    $invoice_number = $_SESSION['invoice_number'];
}
if (isset($_GET['source']) and $_GET['source'] == 'myaccount') {
   $invoice_number= $_GET['inv'];
}

if(isset($_GET['source'])){
    if($_GET['source'] == "checkoutpage"or  $_GET['source']== 'myaccount'){
    $select_order = "SELECT * FROM orders WHERE invoice_no = '$invoice_number'";
    $send_order_req = mysqli_query($dbConnection, $select_order);
    if($send_order_req && mysqli_num_rows($send_order_req) > 0){
        $data = mysqli_fetch_assoc($send_order_req);
        $amount = $data['total_amount'];
    } else {
        echo "<script>alert('Invalid invoice number'); window.location.href = '../index.php';</script>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce Practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <div class="container-fluid p-0">
        <h3 class="text-center mt-5 mb-5">Pay-Offline</h3>
        
        <form class="m-auto mb-3 mt-3 w-50" action="../pay/pay.php" method="get">
        <input type="hidden" value="<?php echo$invoice_number ?>" name="inv">
            <div class="border m-auto mb-3 w-50">
                <h4>Amount Due: <?php echo number_format($amount) ?></h4> 
            </div>
            <select id="bankSelect" name="payment_type" class="form-select w-50 m-auto text-center mb-3" aria-label="Default select example">
                <option selected>Select From our Available banks</option>
                <option value="opay">Opay</option>
                <option value="kuda">Kuda</option>
                <option value="moniepoint">Moniepoint</option>
                <option value="cash_on_delivery">cash on Delivery</option>
            </select>
            <div id="accountNumberBox" class="accountNumber-bx text-center m-auto">
                <p id="accountNumber">Select a bank to see the account number</p>
            </div>
            <input disabled class="bg-info m-auto text-center form-control w-50" type="submit" name="confirm-pay" id="confirm-pay" value="Payment made">
        </form>
        <div class="text-center bg-info p-3">
            <p class="m-0">@2024 All Rights Reserved Diamond</p>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const bankSelect = document.getElementById('bankSelect');
            const accountNumber = document.getElementById('accountNumber');
            const paybtn  =document.getElementById("confirm-pay");


            const accountNumbers = {
                opay: '7043530060',
                kuda: '2016772102',
                moniepoint: '9876543210',
                cash_on_delivery: 'cash on delivery'
            };

            bankSelect.addEventListener('change', (event) => {
                const selectedBank = event.target.value;
                if (accountNumbers[selectedBank]) {
                    accountNumber.textContent = accountNumbers[selectedBank];
                    paybtn.removeAttribute('disabled');
                } else {
                    accountNumber.textContent = 'Select a bank to see the account number';
                    paybtn.setAttribute("disabled","disabled");
                }
            });
        });
    </script>
</body>
</html>
 

<?php
}
}

?>
