<!--Top navigation menu (header)

I have also added a hidden class as certain features need to be hidden for the login/registration page.

-->



<div class="topnav">
    <a href="home.php"><img src="img/logo.svg" alt="Logo" class="logo"></a>
    <a href="home.php"><b class="active">Home</b></a>
    <div class="">
    <a href="Catalog.php"><b>Shop</b></a>
    <a href="marketplace.php"><b>Marketplace</b></a>
    <a href="contact.php"><b>Support</b></a>
    <form action="results.php" method="get">
        <input  id="searchProd" name="search" type="text" placeholder="Search for products.." required>
        <input id="headerSub" type="submit" value="Search">
    </form>

    <a id = "myCart" href="cart.php"><b>My Cart</b></a>

    <div id = signin></div>
</div>
</div>
