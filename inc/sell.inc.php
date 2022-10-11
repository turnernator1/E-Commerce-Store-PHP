<?php
@session_start();

$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '';

if ($session_value != ''){
    echo "<h2>Welcome to S.E.N.I.O.R Marketplace, " .$_SESSION['name']. "!<br>\n";
    echo "Click below to create a listing and sell your items!</h2>";
    echo "<form id='sellForm' action='upload_product.php'><input id='sellButton' type='submit' value='SELL'></form>";
} else {
    echo "<h2>Welcome to S.E.N.I.O.R Marketplace!<br>\n";
    echo "<br>If you wish to sell your items, please Sign In or Register!</h2>";
}?>