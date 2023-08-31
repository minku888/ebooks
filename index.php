<?php
require('glassnav.php');
$ebooks = [
  ['src' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhMeKMHN1IPc-P9yfL9xoKMuRFEZngFYaHCxzz4Ivw0qudCvSTyCLTIqwORTLR4XCdetgohcbxD3BhWhqEqN-VsH8DN2fq4zfDargpny2NiTwuAMJesA-I2X4BNZ0xrHt8n9JOYh0GRphth8U72anRYDBr2R7n9niEQKgzcDU8il8T3L1ITeBnp3QiKM_s/s300/210901099.jpg', 'title' => 'eBook 2', 'spec' => 'Specification for eBook 2'],
  ['src' => 'pvw/ebook1.jpg', 'title' => 'eBook 1', 'spec' => 'Specification for eBook 1'],
  ['src' => 'pvw/ebook1.jpg', 'title' => 'eBook 2', 'spec' => 'Specification for eBook 2'],
  ['src' => 'pvw/ebook1.jpg', 'title' => 'eBook 1', 'spec' => 'Specification for eBook 1'],
  ['src' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhMeKMHN1IPc-P9yfL9xoKMuRFEZngFYaHCxzz4Ivw0qudCvSTyCLTIqwORTLR4XCdetgohcbxD3BhWhqEqN-VsH8DN2fq4zfDargpny2NiTwuAMJesA-I2X4BNZ0xrHt8n9JOYh0GRphth8U72anRYDBr2R7n9niEQKgzcDU8il8T3L1ITeBnp3QiKM_s/s300/210901099.jpg', 'title' => 'eBook 2', 'spec' => 'Specification for eBook 2'],
  // Add more ebooks here...
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ebook.css">
    <title>eBook Store</title>
    <style>
      body{
        font-family:'PT Serif';
      }
    </style>
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

    <div class="ebook-container">
        <?php foreach ($ebooks as $index => $ebook) { ?>
            <div class="ebook">
                <img src="<?php echo $ebook['src']; ?>" alt="<?php echo $ebook['title']; ?>">
                <h2><?php echo $ebook['title']; ?></h2>
                <button class="view-more-btn" data-ebook-index="<?php echo $index; ?>" data-ebook-spec="<?php echo $ebook['spec']; ?>">View More</button>
            </div>
        <?php } ?>
    </div>
    

    <div class="modal" id="ebookModal">
    
        <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <center><h4 style="color:#fff;">PREVIEW OF BOOKS </h4></center>
    </br>
        <hr>
    </br>
            <div class="preview-images"></div>
         <center>   <p id="modalSpecifications"></p></center>
    </br>
           <center> <button class="buy-btn" id="buyModalBtn">Buy Now</button></center>
        </div>
       
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
    const viewMoreButtons = document.querySelectorAll(".view-more-btn");
    const modal = document.getElementById("ebookModal");
    const closeModal = document.getElementById("closeModal");
    const modalSpecifications = document.getElementById("modalSpecifications");
    const modalImages = document.querySelector(".preview-images");
    const buyModalBtn = document.getElementById("buyModalBtn");

    viewMoreButtons.forEach((button, index) => {
        button.addEventListener("click", function () {
            modalImages.innerHTML = "";

            const ebookIndex = button.getAttribute("data-ebook-index");

            selectedEbookIndex = ebookIndex; // storing value of ebook index gloably

            const ebookSpec = button.getAttribute("data-ebook-spec");

            for (let i = 1; i <= 4; i++) {
                const img = document.createElement("img");
                img.src = `/pvw/ebook${ebookIndex}-preview${i}.jpeg`;
                img.alt = `Preview ${i}`;
                modalImages.appendChild(img);
            }

            modalSpecifications.textContent = `Spec of ebbok${ebookIndex} is : ${ebookSpec}`;
            modal.style.display = "block";
        });
    });

    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
    });

    buyModalBtn.addEventListener("click", function () {
      window.location.href = "pay.php?ebookIndex="+selectedEbookIndex;
    
    });
});

    </script>
</body>
</html>
