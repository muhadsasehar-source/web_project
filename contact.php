<?php include 'connection.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | NUMA</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>

    <div class="site-wrapper">
        <!-- NAVBAR (Same as your Index) -->
        <nav class="navbar about-nav-dark">
            <div class="nav-left">
                <a href="skincare.php" class="nav-link" style="color:#1a1a1a !important;">PRODUCTS</a>
                <a href="about.php" class="nav-link" style="color:#1a1a1a !important;">ABOUT</a>
            </div>
            <div class="brand-center">
                 <a href="index.php" style="text-decoration:none; color: #1a1a1a;">NUMA</a>
            </div>
            <div class="nav-right">
                <a href="contact.php" class="nav-link" style="color:#1a1a1a !important;">CONTACT</a>
                <?php $count = (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0; ?>
                <a href="cart.php" class="nav-link" style="color:#1a1a1a !important;">CART (<?php echo $count; ?>)</a>
            </div>
        </nav>

        <!-- 1. CONTACT FORM SECTION -->
        <section class="contact-section" style="padding: 150px 10% 80px; background:#fff;">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <h6 class="mini-title">Get in Touch</h6>
                <h2 class="serif-title" style="font-size: 3rem; margin-bottom: 40px;">How can we <span class="italic">help you?</span></h2>
                
                <form action="#" class="contact-form" style="display: grid; gap: 20px; text-align: left;">
                    <div style="display: flex; gap: 20px;">
                        <input type="text" placeholder="Full Name" style="flex:1; padding:15px; border:1px solid #ddd; outline:none;">
                        <input type="email" placeholder="Email Address" style="flex:1; padding:15px; border:1px solid #ddd; outline:none;">
                    </div>
                    <textarea placeholder="Your Message" rows="6" style="padding:15px; border:1px solid #ddd; outline:none; font-family:inherit;"></textarea>
                    <button type="submit" class="oval-btn dark" style="width: 200px; cursor: pointer;">Send Message</button>
                </form>
            </div>
        </section>

        <!-- 2. SUPPORT & RETURNS INFO (Simple Text) -->
        <section class="support-info" style="padding: 80px 10%; background: #F8F5F2; border-top: 1px solid #eee;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px;">
                <div>
                    <h4 style="font-family:'Playfair Display'; margin-bottom:15px;">Shipping Policy</h4>
                    <p style="font-size: 0.9rem; line-height: 1.6; color: #666;">We ship all orders within 2-3 business days. Free shipping on orders over Rs. 5000. Delivery across Pakistan takes 3-5 days.</p>
                </div>
                <div>
                    <h4 style="font-family:'Playfair Display'; margin-bottom:15px;">Returns & Exchanges</h4>
                    <p style="font-size: 0.9rem; line-height: 1.6; color: #666;">If you are not satisfied with your purchase, you can return it within 7 days of delivery. The product must be unused and in original packaging.</p>
                </div>
            </div>
        </section>

         <!-- FOOTER -->
        <footer class="site-footer">
            <div class="footer-container">
                <div class="footer-col">
                    <h3>NUMA</h3>
                    <p>Clean beauty tailored to your unique skin needs.</p>
                </div>
                <div class="footer-col">
                    <h4>SHOP</h4>
                    <ul>
                        <li><a href="skincare.php">Skincare</a></li>
                        <li><a href="body.php">Body Care</a></li>
                        <li><a href="sets.php">Sets</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>SUPPORT</h4>
                    <ul>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="#">Returns</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 NUMA Skincare. All rights reserved.</p>
            </div>
        </footer>

    </div>

</body>
</html>