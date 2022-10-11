<!-- CSS HTML, Javascript Created by Aziah Miller, User Profile Data Ported over from Jack Turner's contribution to profile page  -->

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
    <script src="scripts/update-details.js" defer></script>
    <meta charset="UTF-8" />
    <meta name="author" content="Aziah Miller" />
    <!-- <script src="scripts/script.js" defer></script> -->
</head>

<!--Top navigation menu-->

<?php require_once "inc/header.inc.php"; ?>
<?php require_once "inc/cart.inc.php"; ?>
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
          <div class="details vline">
              <h1>Update Account Information</h1>
              <p>Only fill in the details you want to change.</p>
          </div>

        </div>
      </div>
    </section>
<body class="body_grey">


    <section id="user-profile">
    
    <div class="details_form">
      <div class="row">
        <div class="column1">
                        <form action="scripts/update-details.php" onsubmit="submitForm(event);" method="post">
                            <input name="phnumber" type="number" placeholder="Phone number" class="detail_element">
                            <span class="sideBySide" class="detail_element">
                                <input name="preferred" class="left detail_element" type="text" placeholder="First name">
                                <input name="surname" class="right detail_element" type="text" placeholder="Last name">
                            </span>
                            <input id="email" name="email" type="email" placeholder="New Email address" class="detail_element">
                            <input id="cemail" name="cemail" type="email" placeholder="Confirm Email address" class="detail_element">
                            <input name="password" type="password" placeholder="Password" class="detail_element" required>
                            
            </div>
            <div class="column2">
            <div class="tooltip">Tips for a secure password?
                                <span class="tooltiptext">
                                <ul>
                                    <li>Include numbers, symbols, and both uppercase and lowercase.</li>
                                    <li>No personal details.</li>
                                    <li>Use a unique password for every site.</li>
                                </ul>    
                                </span>
                            </div>
            <input id="pass" name="npass" type="password" placeholder="New Password" autocomplete="new-password" class="detail_element">
                            <input id="cpass" name="cpassword" type="password" placeholder="Confirm Password" autocomplete="new-password" class="detail_element">
                            <input name="street" type="text" placeholder="Street address" class="detail_element">
                            <span class="sideBySide" class="detail_element">
                                <input name="suburb" class="left detail_element" type="text" placeholder="Suburb">
                                <input name="postcode" class="right detail_element" type="number" placeholder="Postcode">
                            </span>
                            
            
            </div>
            <div>
            </div>
                            <button type="submit" id="submit" class="BTN update_center">Update Details</button>
                        </form>
                        
                        </div>
                        <div id="pass_error" class="update_center form_error detail_element">
                        <p>Confirmation password does not match</p>                         
                        </div>
                        <div id="email_error" class="update_center form_error detail_element">
                        <p>Confirmation email does not match</p>                         
                        </div>
                        <br>
                    </div>
                    
            </div>
            </div>

    </section>

</body>
</html>
