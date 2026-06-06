<?php 
include 'connection.php'; // Is file mein humne $db variable banaya tha
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUMA | Aesthetic Skincare</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
    <div class="page-transition-curtain">
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
            <h1 style="font-family:'Playfair Display'; font-size:3rem; color:#1a1a1a;">NUMA</h1>
        </div>
    </div>

    <div class="site-wrapper">
        <nav class="navbar">
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
                 <a href="index.php" style="text-decoration:none; color: inherit;">NUMA</a>
            </div>

            <div class="nav-right">
                <a href="journal.html" class="nav-link">JOURNAL</a>
                <?php 
                    $count = 0;
                    if(isset($_SESSION['cart'])) { $count = count($_SESSION['cart']); }
                ?>
                <a href="cart.php" class="nav-link">CART (<?php echo $count; ?>)</a>
            </div>
        </nav>

        <header class="hero">
            <div class="hero-image">
                <img src="4.jpg" alt="Model Face" style="width: 100%; height: 100%; object-fit: cover; object-position: center 20%;">
            </div>
            <div class="hero-overlay">
                <div class="headline-top">
                    <h1>Beauty, <span class="italic">curated with intention</span></h1>
                </div>
                <div class="oval-btn-container top-left">
                    <a href="skincare.php" class="oval-btn">Shop New Arrivals</a>
                </div>
                <div class="brand-name"><span>NUMA</span></div>
                <div class="hero-desc">
                    <p>Explore a handpicked edit of skincare,<br>makeup & wellness essentials — guided<br>by trust, not trends.</p>
                </div>
                <div class="hero-sub text-right">
                    <p>BROWSE A CURATED<br>RANGE OF SKINCARE FINDS</p>
                </div>
            </div>
        </header>

        <section class="content-section">
            <div class="content-wrapper">
                <h6 class="mini-title">EMPOWER YOUR SKIN CARE</h6>
                <h2 class="editorial-text">
                    The harmony between <span class="italic">powerful high-</span><br>
                    <span class="italic">performance ingredients</span> and exceptionally<br>
                    simple skincare routines
                </h2>
                <a href="skincare.php" class="oval-btn dark">Read More</a>
            </div>
        </section>

        <!-- BEST SELLERS SECTION (UPDATED FOR MONGODB) -->
        <section class="product-section">
            <h3 class="section-title">Curated Favourites</h3>
            <div class="product-grid">

                <?php
                // Check if MongoDB connection exists ($db is from connection.php)
                if(isset($db)) {
                    // MongoDB query: find products where category is 'skincare' with limit 3
                    $products = $db->products->find(
                        ['category' => 'skincare'], 
                        ['limit' => 3]
                    );

                    $found = false;
                    foreach ($products as $row) {
                        $found = true;
                    ?>
                        <div class="product-card">
                            <div class="p-image">
                                <!-- Image field name should match what you put in MongoDB Compass -->
                                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                            </div>
                            <div class="p-info">
                                <h4><?php echo $row['name']; ?></h4>
                                <p class="price">Rs. <?php echo $row['price']; ?></p>
                                
                                <form action="manage_cart.php" method="POST">
                                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                    <button type="submit" name="add_to_cart" class="add-btn">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    <?php
                    } 
                    
                    if (!$found) {
                        echo "<p style='text-align:center;'>No products found in MongoDB! Please add data in Compass.</p>";
                    }
                } else {
                    echo "<p style='text-align:center; color:red;'>Database connection variable \$db not found.</p>";
                }
                ?>

            </div>
        </section>

        <footer class="site-footer">
            <div class="footer-container">
                <div class="footer-col">
                    <h3>NUMA</h3>
                    <p>Clean beauty tailored to your unique skin needs. We believe in intentional skincare for every soul.</p>
                </div>
                <div class="footer-col">
                    <h4>SHOP</h4>
                    <ul>
                        <li><a href="skincare.php">Skincare</a></li>
                        <li><a href="body.php">Body Care</a></li>
                        <li><a href="sets.php">Sets & Gifts</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>SUPPORT</h4>
                    <ul>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="contact.php">Shipping Policy</a></li>
                        <li><a href="contact.php">Returns & Exchanges</a></li>
                    </ul>
                </div>
                <div class="footer-col newsletter">
                    <h4>STAY IN THE KNOW</h4>
                    <p style="margin-bottom: 15px; font-size: 0.8rem;">Subscribe to get special offers and skin tips.</p>
                    <form><input type="email" placeholder="Enter your email"><button type="submit">JOIN</button></form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 NUMA Skincare. Crafted with intention. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script>
        window.addEventListener('load', function() {
            setTimeout(function() { document.body.classList.add('reveal-page'); }, 800); 
        });

        const forms = document.querySelectorAll('form[action="manage_cart.php"]');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                if(!this.querySelector('button[name="remove_item"]')) {
                    e.preventDefault(); 
                    const formData = new FormData(this);
                    formData.append('add_to_cart', 'true'); 
                    fetch('manage_cart.php', { method: 'POST', body: formData })
                    .then(response => response.json())
                    .then(data => {
                        if(data.status === 'success') {
                            Swal.fire({
                                icon: 'success', title: 'Added!', text: data.message,
                                showConfirmButton: false, timer: 1500, toast: true,
                                position: 'top-end', background: '#fff', color: '#333'
                            });
                            const navLinks = document.querySelectorAll('.nav-link');
                            navLinks.forEach(link => {
                                if(link.innerText.includes('CART')) { link.innerText = `CART (${data.cart_count})`; }
                            });
                        } 
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>
</body>
</html>