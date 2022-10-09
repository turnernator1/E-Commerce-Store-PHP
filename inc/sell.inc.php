<?php
@session_start();

$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '';

if ($session_value != ''){
    echo "<h2>Welcome to S.E.N.I.O.R Marketplace, " .$_SESSION['name']. "!</h2>\n";
    echo "<h2>Click below to create a listing and sell your items!</h2>";
    echo "<form action='upload_product.php'><input type='submit'></form>";
} else {
    echo "<h2>Welcome to S.E.N.I.O.R Marketplace!</h2>\n";
    echo "<h2>If you wish to sell your items, please Sign In or Register!</h2>";
}?>