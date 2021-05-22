<?php include('config_front/constants.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title> ADD TO CART</title>
        <meta name="description" content="This is the description">
        <link rel="stylesheet" href="css/styles.css" />
        <script src="store.js" async></script>
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">
    
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    </head>
    <body>
        <nav id="navbar">
            <div id="logo">
                <img src="images\our logo.png" alt="MyOnlineMeal.com">
            </div>
            <ul>
                <li class="item"><a href="<?php echo SITEURL;?>index.php">Home</a></li>
                <li class="item"><a href="<?php echo SITEURL;?>categories.php">Categories</a></li>
                <li class="item"><a href="<?php echo SITEURL;?>food.php">Food</a></li>
                <li class="item"><a href="<?php echo SITEURL;?>contact.php">Contact </a></li>
            </ul>
        </nav>
       
        
        <section class="container content-section">
            <h2 class="section-header">PIZZA</h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">Chicken Hawain Pizza</span>
                    <img class="shop-item-image" src="images/menu-pizza.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$12.0</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Red Peprika Pizza</span>
                    <img class="shop-item-image" src="images/foad-pizza.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$15.5</span>
                        <button class="btn btn-primary shop-item-button"type="button">ADD TO CART</button>
                    </div>
                </div>
            </section>
               
                   
         
        <section class="container content-section">
            <h2 class="section-header">BURGER</h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">Maharaja Chicken Burger</span>
                    <img class="shop-item-image" src="images/123 burger.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$10.5</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Masala Paneer Burger</span>
                    <img class="shop-item-image" src="images/menu-burger.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$8.0</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="container content-section">
            <h2 class="section-header">MOMOS</h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">Cheese Momos</span>
                    <img class="shop-item-image" src="images/menu-momo.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$8.0</span>
                        
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Chicken Momos</span>
                    <img class="shop-item-image" src="images/momos.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$10.0</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <img class="cart-item-image" src="images/menu-pizza.jpg" width="100" height="100">
                        <span class="cart-item-title">Chicken Hawain Pizza</span>
                    </div>
                    <span class="cart-price cart-column">$12.0</span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" value="1">
                        <button class="btn btn-danger" type="button">REMOVE</button>
                    </div>
                </div>
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <img class="cart-item-image" src="images/123 burger.jpg" width="100" height="100">
                        <span class="cart-item-title">Maharaja Chicken Burger</span>
                    </div>
                    <span class="cart-price cart-column">$10.5</span>
                    <div class="cart-quantity cart-column">
                        <input class="cart-quantity-input" type="number" value="1">
                        <button class="btn btn-danger" type="button">REMOVE</button>
                    </div>
                </div>
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">$22.5</span>
            </div>
            
                <a href="<?php echo SITEURL;?>confirmorder.php" button class="btn btn-primary btn-purchase" > PURCHASE</a> </button>
            

        </section>
        
    </body>
</html>