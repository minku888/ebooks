<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="style.css">
  <title>Download E-BOOK</title>
</head>
<body>
  <div class="gradient-background">
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
      <section class="payment-section glassmorphism">
       <center> <h2>Payment Successful</h2></center>
        <div class="success-animation"></div>
        <p>Transaction successful! Your order details:</p>
        <p>Transaction ID: <font id="transactionId">#123456</font></p>
      </section>
      <section class="ebook-section glassmorphism">
        <h2>Ebook Section</h2>
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_OcUKy64rEuSWo5TIDgrLaspymZMw12dAjeF2lCxMnf_hgVLAAccJBxIaf003e1glwUN4mLxY0NIGiGoQXs6SWjFQMtEgsw1YMomDWYmqXlp9eDqnrfEBh7pRSvmYyCWD5hE7jr7Bddk4ao0Kw1QY3jKMPNk6UzsY52IAtmxfqbdx20rC2DDrKx7onPg/s500/learn-to-code-html-and-css.jpg" alt="Ebook Cover" class="ebook-cover">
      <center>  <a href="#" class="download-button">Download Ebook</a></center>
      </section>
      </div>
    </div>
  </div>
 
  
    <script>
        // Function to get cookie by name
        function getCookie(name) {
            var value = "; " + document.cookie;
            var parts = value.split("; " + name + "=");
            if (parts.length === 2) {
                return parts.pop().split(";").shift();
            }
        }

          var paymentCookie = getCookie("payment");
        
        if (paymentCookie === "done") {
            console.log("Payment cookie is set to 'done'.");
        } else {
            window.location.href="pay.php";
            
        }
        
        

        
        // Extract transaction ID from the URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const transactionId = urlParams.get('txn_id');
        
        // Display transaction ID on the page
        const transactionIdElement = document.getElementById('transactionId');
        transactionIdElement.textContent = transactionId;

        
    </script>
</body>
</html>
