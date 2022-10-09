<!-- Keeps track of user's cart and updates their cart value in the header
Author Aziah Miller -->

<?php require_once "inc/session.inc.php"; ?>

<?php




//when user presses add to cart button, additonal safety check to make sure quantity is always greater than 0

if(isset($_POST['btn-atc']) and $_POST['quantity'] > 0){

    

    //extracting the product ID and quantity, then placing in an array

    $prodID = $_SESSION['currentProduct'];
    $count = $_POST['quantity'];
    
    $_SESSION['total_prd_cnt'] = 0;
    $PRODUCT = [
        'id' => $prodID,
        'count' => $count
    ];

    //checking if the user has a cart with any items, if not, then create a new cart array
    if(isset($_SESSION['cart']))
    {
        // echo $_SESSION['currentProduct'];

    //create array of current IDS
    $ids = array();
    foreach($_SESSION['cart'] as $items){
        array_push($ids, $items['id']);
    }

    //check if the ID is new, if so add to end of the cart array. Otherwise, increment the count of the item.

    if(!in_array($PRODUCT['id'], $ids)){

        array_push($_SESSION['cart'], $PRODUCT);
    }else{
        
        foreach($_SESSION['cart'] as $key => $items){
            if($items['id'] === $PRODUCT['id']){
                $_SESSION['cart'][$key]['count'] =  $items['count'] + $count;
            }
        }
    }
    //If there is no cart, create a new one and add the user's selected item
    }else{
        $_SESSION['cart'] = array();
        array_push($_SESSION['cart'], $PRODUCT);
    }
}

if(isset($_POST['btn-atc'])){

}

if(isset($_SESSION['cart'])){
    $total_count =0;
    foreach($_SESSION['cart'] as $key => $items){
        $total_count = $total_count + $items['count'];
}

    echo '<script defer>
    cartHTML = document.getElementById("myCart");
    cartHTML.innerHTML = "<b>My Cart(' .$total_count .')"
    </script>';
    $_SESSION['total_prd_cnt'] = $total_count;
}

?>