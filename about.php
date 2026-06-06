<?php include 'connection.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | NUMA</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="about-page">

    <div class="site-wrapper">
        
        <!-- NAVBAR -->
        <!-- Menu Text ko Black (#1a1a1a) kiya hai taaki Beige background par dikhe -->
        <nav class="navbar about-nav-dark">
            <div class="nav-left">
                <div class="dropdown">
                    <div class="nav-link drop-btn" style="color: #1a1a1a !important;">
                        <i class="ri-store-2-line"></i> PRODUCTS <i class="ri-arrow-down-s-line"></i>
                    </div>
                    <div class="dropdown-content">
                        <a href="skincare.php">Skincare</a>
                        <a href="body.php">Body Care</a>
                        <a href="sets.php">Sets & Gifts</a>
                    </div>
                </div>
                <a href="about.php" class="nav-link" style="color: #1a1a1a !important;">ABOUT</a>
            </div>
            
            <div class="brand-center" style="position: absolute; left: 50%; transform: translateX(-50%);">
                 <a href="index.php" style="text-decoration:none; color: #1a1a1a !important;">NUMA</a>
            </div>

            <div class="nav-right">
                <a href="journal.html" class="nav-link" style="color: #1a1a1a !important;">JOURNAL</a>
                <?php $count = (isset($_SESSION['cart'])) ? count($_SESSION['cart']) : 0; ?>
                <a href="cart.php" class="nav-link" style="color: #1a1a1a !important;">CART (<?php echo $count; ?>)</a>
            </div>
        </nav>

        <!-- 1. HERO SECTION (UPDATED: Solid Beige Color - Clean Luxury Look) -->
        <section class="about-insp-hero" style="
            background-color: #f2f0eb!important; /* Premium Beige Color */
            background-image: none !important;     /* Image Hata Di Hai */
            height: 60vh;                          /* Height thodi decent rakhi hai */
            display: flex; 
            align-items: center; 
            justify-content: center;
            position: relative;
        ">
            <div class="hero-content" style="text-align: center;">
                <!-- Heading color Black kiya hai -->
                <h1 class="serif-xl" style="color:#1a1a1a !important; font-size: 4.5rem; letter-spacing: -1px; margin-bottom: 10px;">Our Essence</h1>
                <!-- Breadcrumbs color Grey -->
                
            </div>
        </section>

        <!-- 2. EFFICACY SECTION (Video + Story) -->
        <section class="brand-efficacy-section">
            <div class="efficacy-container">
                <div class="efficacy-video-box">
                    <video autoplay muted loop playsinline class="clinical-video">
                        <source src="about-bg.mp4" type="video/mp4">
                    </video>
                </div>

                <div class="efficacy-text">
                    <h6 class="mini-title">The Philosophy</h6>
                    <h2 class="serif-title" style="font-size: 2.8rem; margin-bottom: 25px;">
                        Curated with <br> <span class="italic">Intention.</span>
                    </h2>
                    <p>NUMA was born from the desire to create skincare that is as honest as it is effective. We bridge the gap between clinical results and soulful self-care.</p>
                    <p style="margin-top:15px;">Har formula ko bareeki se select kiya gaya hai taake aapki skin ko wo mile jiski usay asli zaroorat hai.</p>
                    
                    <div class="mini-stats" style="margin-top:30px; display:flex; gap:40px;">
                        <div>
                            <h3 style="font-family:'Playfair Display'; font-size:1.8rem;">12k+</h3>
                            <p style="font-size:0.7rem; color:#888; letter-spacing: 1px;">HAPPY USERS</p>
                        </div>
                        <div>
                            <h3 style="font-family:'Playfair Display'; font-size:1.8rem;">0%</h3>
                            <p style="font-size:0.7rem; color:#888; letter-spacing: 1px;">TOXINS</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. CALL TO ACTION (CTA) -->
        <section class="about-insp-cta">
            <div class="cta-overlay">
                <h6 class="mini-title" style="color:#fff;">Start Your Journey</h6>
                <h2 class="serif-xl" style="color:#fff; font-size: 3rem;">Ready To Help <br> Your Skin Glow?</h2>
                <a href="skincare.php" class="oval-btn cta-btn" style="margin-top:30px;">Shop New Arrivals</a>
            </div>
        </section>

        <!-- 4. FOOTER (Direct Code from Index) -->
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
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Returns</a></li>
                    </ul>
                </div>
                <div class="footer-col newsletter">
                    <h4>STAY IN THE KNOW</h4>
                    <form>
                        <input type="email" placeholder="Enter your email">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom" style="text-align:center; padding-top:40px; border-top:1px solid rgba(0,0,0,0.05); margin-top:40px;">
                <p>&copy; 2024 NUMA Skincare. All rights reserved.</p>
            </div>
        </footer>

    </div>
</body>
</html>