<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Skincare | NUMA</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <!-- SWEETALERT CDN (Professional Popup ke liye zaroori hai) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* --- SPECIAL STYLES FOR THIS PAGE ONLY --- */
        body { background-color: #f2f0eb !important; }
        .site-wrapper { background-color: transparent !important; }
        
        .navbar .nav-link {
            color: #1a1a1a !important; font-weight: 700 !important; 
            text-shadow: none !important; font-size: 0.85rem;
            letter-spacing: 2px; transition: color 0.3s ease; cursor: pointer;
        }
        .navbar .nav-link:hover { color: #a67c52 !important; }
        .dropdown-content a { color: #333 !important; font-weight: 400 !important; }
        .brand-center a { color: #1a1a1a !important; font-weight: 600; }

        .shop-header {
            padding: 120px 20px 40px 20px; text-align: center;
            border-bottom: 1px solid #dcdcdc; margin: 0 50px 40px 50px;
        }

        .product-card {
            background-color: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.02); padding: 15px; border-radius: 4px; text-align: left;
        }

        .p-image { width: 100%; height: 350px; overflow: hidden; margin-bottom: 15px; }
        .p-image img { width: 100%; height: 100%; object-fit: cover; }

        .product-card .add-btn {
            background: none; border: 1px solid #333; padding: 8px 20px; 
            cursor: pointer; text-transform: uppercase; font-size: 0.7rem; 
            letter-spacing: 1px; transition: all 0.3s ease; color: #333; width: 100%;
        }
        .product-card .add-btn:hover {
            background-color: #1a1a1a !important; color: #fff !important; border-color: #1a1a1a !important;
        }
    </style>
</head>

<body>

    <div class="site-wrapper">
        
        <!-- NAVBAR -->
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
                <a href="index.php" style="font-family: 'Playfair Display', serif; font-size: 2rem; text-decoration: none; letter-spacing: 2px;">NUMA</a>
            </div>

            <div class="nav-right">
                <a href="journal.html" class="nav-link">JOURNAL</a>
                
                <!-- DYNAMIC CART COUNT -->
                <?php 
                    $count = 0;
                    if(isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                    }
                ?>
                <a href="cart.php" class="nav-link">CART (<?php echo $count; ?>)</a>
            </div>
        </nav>

        <!-- HEADER -->
        <header class="shop-header">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 3.5rem; color: #1a1a1a; margin-bottom: 10px;">The Skincare Collection</h1>
            <p style="font-family: 'Lato', sans-serif; color: #555; font-size: 1.1rem; letter-spacing: 0.5px;">Clean, effective, and tailored to your routine.</p>
        </header>

        <!-- PRODUCT GRID -->
        <section class="product-section" style="padding: 0 50px 100px 50px;">
            <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; max-width: 1200px; margin: 0 auto;">
                
                <!-- Product 1 -->
                <div class="product-card">
                    <div class="p-image">
                        <img src="hydrating glow.jpg" alt="Serum">
                    </div>
                    <div class="p-info">
                        <h4 style="font-family: 'Playfair Display', serif; font-size: 1.2rem; margin-bottom: 5px; color: #222;">Hydrating Glow Serum</h4>
                        <p class="price" style="color: #666; font-size: 0.9rem; margin-bottom: 10px;">RS.4500.00</p>
                        
                        <form action="manage_cart.php" method="POST">
                            <input type="hidden" name="name" value="Hydrating Glow Serum">
                            <input type="hidden" name="price" value="4500">
                            <button type="submit" name="add_to_cart" class="add-btn">Add to Cart</button>
                        </form>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <div class="p-image">
                        <img src="night repair.jpg" alt="Cream">
                    </div>
                    <div class="p-info">
                        <h4 style="font-family: 'Playfair Display', serif; font-size: 1.2rem; margin-bottom: 5px; color: #222;">Night Repair Cream</h4>
                        <p class="price" style="color: #666; font-size: 0.9rem; margin-bottom: 10px;">Rs.2800.00</p>
                        
                        <form action="manage_cart.php" method="POST">
                            <input type="hidden" name="name" value="Night Repair Cream">
                            <input type="hidden" name="price" value="2800">
                            <button type="submit" name="add_to_cart" class="add-btn">Add to Cart</button>
                        </form>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <div class="p-image">
                        <img src="gentle foam cleanser.jpg" alt="Cleanser">
                    </div>
                    <div class="p-info">
                        <h4 style="font-family: 'Playfair Display', serif; font-size: 1.2rem; margin-bottom: 5px; color: #222;">Gentle Foam Cleanser</h4>
                        <p class="price" style="color: #666; font-size: 0.9rem; margin-bottom: 10px;">Rs.2800.00</p>
                        
                        <form action="manage_cart.php" method="POST">
                            <input type="hidden" name="name" value="Gentle Foam Cleanser">
                            <input type="hidden" name="price" value="2800">
                            <button type="submit" name="add_to_cart" class="add-btn">Add to Cart</button>
                        </form>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-card">
                    <div class="p-image">
                        <img src="brightening serum.jpg" alt="Serum">
                    </div>
                    <div class="p-info">
                        <h4 style="font-family: 'Playfair Display', serif; font-size: 1.2rem; margin-bottom: 5px; color: #222;">Brightening Serum</h4>
                        <p class="price" style="color: #666; font-size: 0.9rem; margin-bottom: 10px;">Rs.5500.00</p>
                        
                        <form action="manage_cart.php" method="POST">
                            <input type="hidden" name="name" value="Brightening Serum">
                            <input type="hidden" name="price" value="5500">
                            <button type="submit" name="add_to_cart" class="add-btn">Add to Cart</button>
                        </form>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="product-card">
                    <div class="p-image">
                        <img src="eye cream.jpg" alt="Eye Cream">
                    </div>
                    <div class="p-info">
                        <h4 style="font-family: 'Playfair Display', serif; font-size: 1.2rem; margin-bottom: 5px; color: #222;">Brightening Eye Cream</h4>
                        <p class="price" style="color: #666; font-size: 0.9rem; margin-bottom: 10px;">Rs.3800.00</p>
                        
                        <form action="manage_cart.php" method="POST">
                            <input type="hidden" name="name" value="Brightening Eye Cream">
                            <input type="hidden" name="price" value="3800">
                            <button type="submit" name="add_to_cart" class="add-btn">Add to Cart</button>
                        </form>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="product-card">
                    <div class="p-image">
                        <img src="mineral sunscreen.jpg" alt="Sunscreen">
                    </div>
                    <div class="p-info">
                        <h4 style="font-family: 'Playfair Display', serif; font-size: 1.2rem; margin-bottom: 5px; color: #222;">Mineral Sunscreen SPF 50</h4>
                        <p class="price" style="color: #666; font-size: 0.9rem; margin-bottom: 10px;">Rs.3000.00</p>
                        
                        <form action="manage_cart.php" method="POST">
                            <input type="hidden" name="name" value="Mineral Sunscreen SPF 50">
                            <input type="hidden" name="price" value="3000">
                            <button type="submit" name="add_to_cart" class="add-btn">Add to Cart</button>
                        </form>
                    </div>
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

    <!-- AJAX SCRIPT (Refresh Roka, Popup Dikha, Cart Update kiya) -->
    <script>
        const forms = document.querySelectorAll('form[action="manage_cart.php"]');

        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                
                // Agar ye Add to cart button hai (Remove wala nahi)
                if(!this.querySelector('button[name="remove_item"]')) {
                    e.preventDefault(); // Sabse important: Page Reload Roka

                    const formData = new FormData(this);
                    formData.append('add_to_cart', 'true'); 

                    fetch('manage_cart.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        
                        if(data.status === 'success') {
                            // Success Popup
                            Swal.fire({
                                icon: 'success',
                                title: 'Added!',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500,
                                toast: true,
                                position: 'top-end',
                                background: '#fff',
                                color: '#333'
                            });

                            // Navbar Count Update
                            const navLinks = document.querySelectorAll('.nav-link');
                            navLinks.forEach(link => {
                                if(link.innerText.includes('CART')) {
                                    link.innerText = `CART (${data.cart_count})`;
                                }
                            });
                        } 
                        else {
                            // Already Added Popup
                            Swal.fire({
                                icon: 'info',
                                title: 'Info',
                                text: data.message,
                                timer: 2000,
                                toast: true,
                                position: 'top-end'
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