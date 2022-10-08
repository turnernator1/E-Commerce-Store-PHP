<!--New option for Header include file 
Author: Aziah Miller 

-->
<link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/newHeader.css">

<section id="profileheader">
      <div class="GContainer">
        <div class="headerconfig">
          <div id="logo">
          <a href="home.php">
          <img src="img/logo.svg" class="profile-image headerItem">
          </a>  
          <a href="home.php"><h1 class="home">Home</h1></a>
            
          </div>
          <div class="reviews vline headerItem p_top">
            <div >
            <form action="results.php" method="get">
            <input class="search item grey_item" name="search" type="text" placeholder="SEARCH" required>
            </div>
           
            <select class="item grey_item" name="Categories" id="categories">
            <option value="All Categories">All Categories</option>
            <option value="Camping Accessories">Camping Accessories</option>
            <option value="Outdoor Recreation">Outdoor Recreation</option>
            <option value="Camper Van">Camper Van</option>
            <option value="Safety & Survival Gear">Safety & Survival Gear</option>
            <option value="Sleeping Gear">Navigation & GPS</option>
            <option value="Tableware & Cooking Utensils ">Tableware & Cooking Utensils</option>
            <option value="Sports & Leisure">Sports & Leisure</option>
          </select>
          <button type="submit" class="BTN search_button item">SEARCH</button>
          
        </form>
              
            

            
            <br>
            
          </div>
          <div class="logout vline headerItem p_top">
          <form action="cart.php">
          <button type="submit" class="BTN search_button item">MY CART</button>
          <div class="header_login" id="display_login">
            
          <img class="profile_header" src="img/profileImage.png" class="profile-image">
          <a href="profile.php"><h1>Account</h1></a>
          </div>  
        </form> 
        </div>
        </div>
      </div>
    </section>
    
