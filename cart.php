<?php 
session_start(); 
include 'connection.php'; // MongoDB connection include kar di
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | NUMA Skincare</title>
    <link rel="stylesheet" href="style.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <style>
        body { background-color: #f2f0eb; }
        
        /* Navbar overlap fix */
        .cart-container-modern {
            max-width: 800px;
            margin: 0 auto;
            padding: 160px 20px 50px 20px; 
        }
        
        /* Quantity Button Style */
        .qty-btn {
            background: none; border: none; cursor: pointer;
            color: #555; font-size: 0.9rem; padding: 0 5px;
        }
        .qty-btn:hover { color: #000; }
    </style>
</head>
<body>

    <div class="site-wrapper">
        
        <!-- NAVBAR -->
        <nav class="navbar" style="background-color: #bfaea0;">
            <div class="nav-left">
                <div class="dropdown">
                    <div class="nav-link drop-btn">
                        <i class="ri-store-2-line"></i> PRODUCTS <i class="ri-arrow-down-s-line"></i>
                    </div>
                    <div class="dropdown-content">
                        <a href="skincare.php">Skincare</a>
                        <a href="body.php">Body Care</a>
                        <a href="sets.php">Sets & Gifts</a>
                    </div>
                </div>
                <a href="about.php" class="nav-link">ABOUT</a>
            </div>
            
            <div class="brand-center" style="position: absolute; left: 50%; transform: translateX(-50%);">
                <a href="index.php" style="font-family: 'Playfair Display', serif; font-size: 2rem; text-decoration: none; color: #1a1a1a; letter-spacing: 2px;">NUMA</a>
            </div>

            <div class="nav-right">
                <a href="journal.html" class="nav-link">JOURNAL</a>
                <?php 
                    $count = 0;
                    if(isset($_SESSION['cart'])) { $count = count($_SESSION['cart']); }
                ?>
                <a href="cart.php" class="nav-link active-link">CART (<?php echo $count; ?>)</a>
            </div>
        </nav>

        <!-- MODERN CART SECTION -->
        <div class="cart-container-modern">
            <h1 style="font-family: 'Playfair Display', serif; text-align: center; margin-bottom: 40px; font-size: 2.5rem;">Shopping Bag</h1>
            
            <?php 
            $total = 0;
            if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                
                foreach($_SESSION['cart'] as $key => $value) {
                    
                    // Total Price Logic (Price * Quantity)
                    $total += (int)$value['price'] * (int)$value['quantity']; 
                    
                    // Image Logic (Matching your assets)
                    $imgSrc = "Homepage2.jpg"; 
                    if(stripos($value['name'], 'serum') !== false) $imgSrc = "hydrating glow.jpg";
                    else if(stripos($value['name'], 'cream') !== false) $imgSrc = "night repair.jpg";
                    else if(stripos($value['name'], 'cleanser') !== false) $imgSrc = "gentle foam cleanser.jpg";
                    else if(stripos($value['name'], 'scrub') !== false) $imgSrc = "coffee scrub.jpg";
                    else if(stripos($value['name'], 'oil') !== false) $imgSrc = "glow body oil.jpg";
                    else if(stripos($value['name'], 'lotion') !== false) $imgSrc = "shea butter.jpg";
            ?>
            
                <!-- START: Single Cart Card -->
                <div class="cart-card">
                    <div class="cart-card-img">
                        <img src="<?php echo $imgSrc; ?>" alt="<?php echo $value['name']; ?>">
                    </div>

                    <div class="cart-card-details">
                        <h4><?php echo $value['name']; ?></h4>
                        <span class="sub-text">Size: Full Size</span>
                        <span class="price">Rs. <?php echo $value['price']; ?></span>
                    </div>

                    <div class="cart-card-actions">
                        <!-- Delete Icon -->
                        <form action="manage_cart.php" method="POST">
                            <button name="remove_item" class="delete-icon-btn">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                            <input type="hidden" name="Item_Name" value="<?php echo $value['name']; ?>">
                        </form>

                        <!-- Quantity Logic -->
                        <div class="qty-pill">
                            <form action="manage_cart.php" method="POST" style="display:inline;">
                                <button name="mod_quantity" class="qty-btn">
                                    <i class="ri-subtract-line"></i>
                                </button>
                                <input type="hidden" name="Item_Name" value="<?php echo $value['name']; ?>">
                                <input type="hidden" name="quantity_op" value="decrease">
                            </form>

                            <span style="margin: 0 10px; font-weight:bold;"><?php echo $value['quantity']; ?></span>

                            <form action="manage_cart.php" method="POST" style="display:inline;">
                                <button name="mod_quantity" class="qty-btn">
                                    <i class="ri-add-line"></i>
                                </button>
                                <input type="hidden" name="Item_Name" value="<?php echo $value['name']; ?>">
                                <input type="hidden" name="quantity_op" value="increase">
                            </form>
                        </div>
                    </div>
                </div>
            <?php 
                } 
            } else {
                echo "<p style='text-align:center; padding: 50px; font-size: 1.2rem;'>Your bag is currently empty.</p>";
            }
            ?>

            <!-- BOTTOM TOTAL & CHECKOUT -->
            <?php if($total > 0): ?>
            <div class="cart-bottom-summary">
                <span class="cart-total-display">Total: Rs. <?php echo $total; ?></span>
                
                <a href="checkout.php" style="text-decoration:none;">
                    <button class="oval-btn dark" style="width: 100%; max-width: 300px; padding: 15px; font-size: 1rem;">
                        Proceed to Checkout
                    </button>
                </a>
            </div>
            <?php else: ?>
                <div style="text-align:center;">
                    <a href="skincare.php" class="oval-btn dark">Start Shopping</a>
                </div>
            <?php endif; ?>

        </div>
        
        <footer class="site-footer" style="margin-top: 50px;">
            <div class="footer-bottom">
                <p>&copy; 2024 NUMA Skincare. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>