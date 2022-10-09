<?php
session_start();

$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '';
global $conn;
require_once 'scripts\dbconnect.php';?>
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
              <?php
              $sql = "Select * from Users where user_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("s", $_SESSION['user_id']);
              $stmt->execute();
              $result = $stmt->get_result();
              echo "<h1>".$result['title']. " ". $result['preferred']. " ". $result['surname'] . " ("  .$result['user_id'].")</h1>";
              echo "<p>Joined in ". $result['created']->format('F Y')."</p>";
              $sql = "Select * from Items where marketplace_userid=?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("s", $_SESSION['user_id']);
              $stmt->execute();
              $result = $stmt->get_result();
              $num = mysqli_num_rows($result);
              if ($num > 0){
                  echo "<p>" . $num. " Items for Sale</p>";
              } else{
                  echo "<p>No Items for Sale</p>";
              }
              ?>
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

            <?php
            if($num > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $code = $row['item_code'];
                    $brand = $row['brand'];
                    $name = $row['item_name'];
                    $price = $row['price'];
                    $rating = $row['rating'];
                    $descr = $row['description'];
                    $bytes = $row['image_bytes'];
                    echo "<div class='col-4_margin'>";
                    echo "<img src='data:image/jpeg;base64,$bytes'>";
                    echo "<h4><b>" . $brand . "</b></h4";
                    echo "<h4>" . $name . "</h4";
                    echo "<p>$" . $price . "</p></div>";
                }
            } else {
                echo "<h2>No Items to display</h2>";
            }

            ?>


            </div>    
            </div>

    </section>

</body>
</html>
