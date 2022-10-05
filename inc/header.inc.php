<!--Top navigation menu (header)

I have also added a hidden class as certain features need to be hidden for the login/registration page.

-->

<!-- 
(likely can be deleted if no issues while commented)    
<link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/newHeader.css"> -->

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
    <div id = signin></div>
</div>
</div>
