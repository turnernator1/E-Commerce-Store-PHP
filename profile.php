<?php
session_start();

$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : ''; ?>
<!-- this is the general page users will use to login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <link rel="stylesheet" type="text/css" href="styles/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="UTF-8" />
    <meta name="author" content="Aziah Miller" />
    <!-- <script src="scripts/script.js" defer></script> -->
</head>

<!--Top navigation menu-->

<?php require_once "inc/header.inc.php"; ?>

<body>
<section id="profile-header">
      <div class="Container">
        <div class="profileHeader">
          <img src="img/profileImage.png" class="profile-image">
          <div class="about">
            <h1>User Name</h1>
            <p>Joined in 2022</p>
            <p>4 Items for sale</p>
          </div>
          <div class="reviews vline">
            <span class="star_revs">
              <span class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                </h3>
              </span>
              <p>10 Reviews</p>
            </span>
            <br>
            <p>20 Transactions</p>
          </div>
          <div class="logout vline">
            <h1>Logout</h1>
            <p>Update account details</p>
          </div>
        </div>
      </div>
    </section>

    <section id="user-listings">
    <div class="Container">
            <div class="profileHeader">
            <div class="SContainer">
    <h2 class="title">Current Listings</h2>
    
    <div class="row">
        <div class="col-4_margin">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

        <div class="col-4_margin">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

        <div class="col-4_margin">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

        <div class="col-4_margin">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>
            </div>    
            </div>

    </section>

</body>
</html>
