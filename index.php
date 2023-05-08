<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" type="image/png" sizes="32x32" href="./img/mt1.jpeg">

  <title>Basic Banking System</title>

  <link rel="stylesheet" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">

      <?php
        //include'header.php';
        require_once("header.php");
      ?>

      <main>

      <!-- #HOME SECTION -->
    
        <section class="home" id="home">
  
          <div class="home-img-box">
            <img src="./img/image-mockups.png" alt="Image for GripBank Banner" class="home-img" width="100%">
          </div>
  
          <div class="wrapper">
            <h1 class="home-title">Money Transactions</h1>
  
            <p class="home-text">
              Take your financial life online. Easy way to transfer money from any where.
            </p>
  
            <a href="customers.php">
              <button class="btn-primary">Transfer Money</button>
            </a>
          </div>
  
        </section>
  
      </main>

  <!-- footer -->
  <?php
    include'footer.php';
  ?>
    
    