<!-- CSS HTML Created by Aziah Miller, Dynamically update elements (PHP to udpate profile name, user's listing etc created by Jack Turner) -->

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
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <link rel="stylesheet" type="text/css" href="styles/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/page_init.js" user_id="<?php echo $session_value; ?>" async></script>

    <meta charset="UTF-8" />
    <meta name="author" content="Aziah Miller" />
    <!-- <script src="scripts/script.js" defer></script> -->
</head>

<!--Top navigation menu-->

<?php require_once "inc/header.inc.php"; ?>
<?php require_once "inc/cart.inc.php"; ?>

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
              $row = mysqli_fetch_assoc($result);
              echo "<h1>".$row['title']. " ". $row['preferred']. " ". $row['surname'] . " ("  .$row['username'].")</h1>";
              echo "<p>Joined in ". date('F Y',strtotime($row['created']))."</p>";
              $sql = "Select * from Items where in_stock = 1 and marketplace_userid=?";
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
          <a href="account-details.php"><h1>Update Account Details</h1></a>
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
