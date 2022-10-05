<!-- this is the general page users will use to login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/newHeader.css">
    <meta charset="UTF-8" />
    <meta name="author" content="Aziah Miller" />
    <!-- <script src="scripts/script.js" defer></script> -->
</head>

<!--Top navigation menu-->

<!-- <?php require_once "inc/header.inc.php"; ?> -->


<section id="profile-header">
      <div class="GContainer">
        <div class="profileHeader">
          <div id="logo">
          <img src="img/logo.svg" class="profile-image headerItem">
            <h1 class="home">Home</h1>
            </div>
          <div class="reviews vline headerItem p_top">
            
            <input class="search item grey_item" name="search" type="text" placeholder="SEARCH" required>
            <form action="#">
          <select class="item grey_item" name="Categories" id="categories">
            <option value="All Categories">All Categories</option>
            <option value="#1">PHP</option>
            <option value="#2">Java</option>
            <option value="#3">Golang</option>
            <option value="#4">Python</option>
            <option value="#5">C#</option>
          </select>
    </form>
              <button type="submit" class="BTN search_button item">SEARCH</button>
            

            
            <br>
            
          </div>
          <div class="logout vline headerItem p_top">
          <button type="submit" class="BTN search_button item">MY CART</button>
          </div>
        </div>
      </div>
    </section>
    
    <body>
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
