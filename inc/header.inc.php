<!--Top navigation menu (header)

I have also added a hidden class as certain features need to be hidden for the login/registration page.

-->



<div class="topnav">
    <a href="home.php"><img src="img/logo.svg" alt="Logo" class="logo"></a>
    <a href="home.php"><b class="active">Home</b></a>
    <div class="">
    <a href="home.php"><b>Shop</b></a>
    <a href="home.php"><b>Marketplace</b></a>
    <a href="contact.php"><b>Support</b></a>
    <form action="results.php" method="get">
        <input  name="search" type="text" placeholder="Search for products.." required>
        <input type="submit" value="Search">
    </form>
    <div>
    <a id = "myCart" href="cart.php"><b>My Cart</b></a>
    </div>
    <div id = signin></div>
</div>
</div>
