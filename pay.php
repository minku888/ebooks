<?php
  
   // Retrieve the eBook index from the query parameter
   $ebookIndex = isset($_GET['ebookIndex']) ? $_GET['ebookIndex'] : '';
   
   // Output the eBook index in the disabled input field
   
   
require("glassnav.php")
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bubbles b1"></div>
    <div class="bubbles b2"></div>
    <div class="bubbles b3"></div>
    <div class="bubbles b4"></div>
    <div class="bubbles b5"></div>
    <div class="bubbles b6"></div>
    <div class="bubbles b7"></div>
    <div class="bubbles b8"></div>
    <div class="bubbles b9"></div>
    <div class="content">

    <div class="sections-container">
    <section class="payment-section glassmorphism" >
        <h2>PAY_LOGIN FORM</h2>
        <form action="" method="post" id="payment-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="input-field" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="input-field" required>
            
            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="mobile" class="input-field" required>
            
            <input type="hidden" id="amount" name="amount" value="100" class="input-field"> <!-- Amount in paise (19900 paise = 199 INR) -->
         
            <button type="button" id="rzp-button" class="pay-button">Pay 199 INR</button>
        </form>
        </section>
    </div>


    
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('rzp-button').onclick = function(e) {
            var options = {
                key: 'rzp_test_fUnss8MtPJAvwC', // Your Razorpay Key ID
                amount: document.getElementById('amount').value,
                name: 'Payment',
                description: 'Payment for service',
                image: 'https://your-logo-url.com/logo.png', // Your logo URL
                handler: function(response) {
                    // This function will be executed after successful payment
                    // You can redirect to the success page with transaction details
                    
                    // Assuming your success page is named "success.html"
                    document.cookie = "payment=done; expires=Thu, 18 Dec 2024 12:00:00 UTC; path=/";

                    window.location.href = 'success.php?txn_id=' + response.razorpay_payment_id + "&ebookIndex="+<?php echo $ebookIndex ?>;
                },
                
                prefill: {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    contact: document.getElementById('mobile').value
                },
                notes: {
                    // Additional notes to be sent to Razorpay
                    // You can include any custom data here
                }
            };
            
            var rzp = new Razorpay(options);
            rzp.on('payment.failed', function (response){
                // This function will be called if payment fails
                // You can redirect to the payment failed page with error details
                window.location.href = 'payment_failed.html?error_code=' + response.error.code + '&error_description=' + response.error.description;
            });
            
            rzp.open();
            e.preventDefault();
        };
    </script>
    </div>

</body>
</html>
