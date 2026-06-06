<?php 
session_start(); 
include 'connection.php'; 

// Agar cart khali hai to wapis bhej do
if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<script>alert('Cart is empty!'); window.location.href='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | NUMA Skincare</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: 'Lato', sans-serif;
            background-color: #fff;
            color: #333;
        }

        /* --- MINIMAL NAVBAR --- */
        .checkout-nav {
            padding: 20px 40px;
            border-bottom: 1px solid #eee;
            text-align: center;
            background: #fff;
        }
        .checkout-nav a {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #1a1a1a;
            text-decoration: none;
            letter-spacing: 2px;
            font-weight: 600;
        }

        /* --- MAIN LAYOUT --- */
        .checkout-container {
            display: flex;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            min-height: 90vh;
        }

        /* Left Side: Form */
        .form-section {
            flex: 1.5;
            padding: 50px;
            border-right: 1px solid #f0f0f0;
        }

        /* Right Side: Summary */
        .summary-section {
            flex: 1;
            background-color: #f2f0eb; /* Brand Beige Color */
            padding: 50px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 30px;
            font-size: 1.8rem;
            color: #1a1a1a;
        }

        /* --- FORM STYLING --- */
        .form-group { margin-bottom: 25px; }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.85rem;
            font-weight: 700;
            color: #555;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            font-family: 'Lato', sans-serif;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #a67c52;
        }

        .place-order-btn {
            width: 100%;
            background-color: #1a1a1a;
            color: #fff;
            padding: 18px;
            border: none;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: background 0.3s;
            border-radius: 50px; /* Oval Shape */
            margin-top: 20px;
        }
        
        .place-order-btn:hover { background-color: #333; }

        /* --- SUMMARY ITEMS STYLING --- */
        .summary-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .item-img {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 15px;
            background: #fff;
            border: 1px solid #ddd;
            position: relative;
        }
        
        .item-img img { width: 100%; height: 100%; object-fit: cover; }
        
        .item-badge {
            position: absolute;
            top: -5px; right: -5px;
            background: #a67c52;
            color: #fff;
            width: 20px; height: 20px;
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex; align-items: center; justify-content: center;
        }

        .item-details h4 {
            font-size: 0.95rem;
            margin-bottom: 4px;
            font-weight: 600;
        }
        .item-details p { font-size: 0.85rem; color: #666; }
        .item-price { margin-left: auto; font-weight: bold; }

        .divider { border-top: 1px solid #ddd; margin: 20px 0; }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 1rem;
        }
        
        .grand-total {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 20px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .checkout-container { flex-direction: column-reverse; }
            .form-section { border-right: none; }
        }
    </style>
</head>
<body>

    <!-- Minimal Header -->
    <nav class="checkout-nav">
        <a href="index.php">NUMA</a>
    </nav>

    <div class="checkout-container">
        
        <!-- LEFT: Billing Form -->
        <div class="form-section">
            <h2>Shipping Details</h2>
            
            <form action="purchase.php" method="POST">
                
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" required placeholder="e.g. Sarah Khan">
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone_no" required placeholder="0300-xxxxxxx">
                </div>

                <div class="form-group">
                    <label>Shipping Address</label>
                    <input type="text" name="address" required placeholder="House No, Street, City">
                </div>

                <div class="form-group">
                    <label>Payment Method</label>
                    <select name="pay_mode">
                        <option value="COD">Cash On Delivery (COD)</option>
                    </select>
                </div>

                <button type="submit" name="purchase" class="place-order-btn">Complete Order</button>
            </form>
            
            <p style="margin-top: 20px; font-size: 0.9rem; color:#666; text-align:center;">
                <i class="ri-lock-line"></i> Guaranteed Safe Checkout
            </p>
        </div>

        <!-- RIGHT: Order Summary -->
        <div class="summary-section">
            <h2>Your Order</h2>
            
            <div class="order-items">
                <?php 
                $grand_total = 0;
                if(isset($_SESSION['cart'])) {
                    foreach($_SESSION['cart'] as $key => $value) {
                        // Calculate Total Logic (Price * Qty)
                        $sub_total = $value['price'] * $value['quantity'];
                        $grand_total += $sub_total;

                        // Image Logic (Same as Cart)
                        $imgSrc = "Homepage2.jpg"; 
                        if(stripos($value['name'], 'serum') !== false) $imgSrc = "hydrating glow.jpg";
                        else if(stripos($value['name'], 'cream') !== false) $imgSrc = "night repair.jpg";
                        else if(stripos($value['name'], 'cleanser') !== false) $imgSrc = "gentle foam cleanser.jpg";
                        else if(stripos($value['name'], 'scrub') !== false) $imgSrc = "coffee scrub.jpg";
                        else if(stripos($value['name'], 'oil') !== false) $imgSrc = "glow body oil.jpg";
                        else if(stripos($value['name'], 'lotion') !== false) $imgSrc = "shea butter.jpg";
                ?>
                
                <!-- Single Item -->
                <div class="summary-item">
                    <div class="item-img">
                        <img src="<?php echo $imgSrc; ?>" alt="Product">
                        <!-- Qty Badge -->
                        <div class="item-badge"><?php echo $value['quantity']; ?></div>
                    </div>
                    <div class="item-details">
                        <h4><?php echo $value['name']; ?></h4>
                        <p>Qty: <?php echo $value['quantity']; ?></p>
                    </div>
                    <div class="item-price">Rs. <?php echo $sub_total; ?></div>
                </div>

                <?php 
                    } // Loop End
                }
                ?>
            </div>

            <div class="divider"></div>

            <div class="total-row">
                <span>Subtotal</span>
                <span>Rs. <?php echo $grand_total; ?></span>
            </div>
            <div class="total-row">
                <span>Shipping</span>
                <span>Free</span>
            </div>

            <div class="divider"></div>

            <div class="total-row grand-total">
                <span>Total</span>
                <span>Rs. <?php echo $grand_total; ?></span>
            </div>
        </div>

    </div>

</body>
</html>