<?php 
include 'connection.php'; 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sets & Gifts | NUMA Skincare</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .add-btn { cursor: pointer; transition: 0.3s; width: 100%; background: none; border: 1px solid #333; padding: 10px; text-transform: uppercase; font-size: 0.75rem; }
        .add-btn:hover { background-color: #1a1a1a !important; color: #fff !important; }
    </style>
</head>
<body>
    <div class="site-wrapper">
        <nav class="navbar">
            <div class="nav-left">
                <div class="dropdown">
                    <div class="nav-link drop-btn"><i class="ri-store-2-line"></i> PRODUCTS <i class="ri-arrow-down-s-line"></i></div>
                    <div class="dropdown-content">
                        <a href="skincare.php">Skincare</a>
                        <a href="body.php">Body Care</a>
                        <a href="sets.php" class="active-link">Sets & Gifts</a>
                    </div>
                </div>
                <a href="about.php" class="nav-link">ABOUT</a>
            </div>
            <div class="brand-center" style="position: absolute; left: 50%; transform: translateX(-50%);">
                <a href="index.php" style="font-family: 'Playfair Display', serif; font-size: 2rem; color: #1a1a1a; text-decoration: none; letter-spacing: 2px;">NUMA</a>
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

        <header class="hero" style="position: relative; height: 75vh; overflow: hidden; background-color: #f4f1ee; display: flex; align-items: center; justify-content: center;">
            <video autoplay muted loop playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1;">
                <source src="sets-bg.mp4" type="video/mp4">
            </video>
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.1); z-index: 2;"></div>
            <div class="hero-content" style="position: relative; z-index: 10; text-align: center; color: #1a1a1a;">
                <h1 style="font-size: 4rem; font-family: 'Playfair Display', serif; margin-bottom: 20px;">Curated <span style="font-style: italic;">Sets & Gifts</span></h1>
                <p style="font-size: 1.1rem; margin-bottom: 35px;">Complete routines packaged with care.</p>
                <a href="#bundles" style="padding: 16px 50px; background-color: #1a1a1a; color: #fff; text-decoration: none; letter-spacing: 2px;">SHOP SETS</a>
            </div>
        </header>

        <section class="product-section" id="bundles" style="padding: 50px;">
            <h3 class="section-title">Exclusive Bundles</h3>
            <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                <?php
                if(isset($db)) {
                    $products = $db->products->find(['category' => 'sets']);
                    $found = false;
                    foreach ($products as $row) {
                        $found = true;
                    ?>
                        <div class="product-card" style="background: #fff; padding: 20px; border-radius: 4px;">
                            <div class="p-image"><img src="<?php echo $row['image']; ?>" style="width: 100%; height: 350px; object-fit: cover;"></div>
                            <div class="p-info" style="margin-top: 15px;">
                                <h4 style="font-family: 'Playfair Display'; margin-bottom: 5px;"><?php echo $row['name']; ?></h4>
                                <p class="price" style="color: #666; margin-bottom: 15px;">Rs. <?php echo $row['price']; ?></p>
                                <form action="manage_cart.php" method="POST">
                                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                    <button type="submit" name="add_to_cart" class="add-btn">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    if (!$found) echo "<p style='text-align:center; grid-column: 1/-1;'>No Bundles found in MongoDB.</p>";
                }
                ?>
            </div>
        </section>

        <footer class="site-footer">
            <div class="footer-bottom"><p>&copy; 2024 NUMA Skincare. All rights reserved.</p></div>
        </footer>
    </div>

    <script>
        document.querySelectorAll('form[action="manage_cart.php"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                if(!this.querySelector('button[name="remove_item"]')) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    formData.append('add_to_cart', 'true'); 
                    fetch('manage_cart.php', { method: 'POST', body: formData })
                    .then(response => response.json())
                    .then(data => {
                        if(data.status === 'success') {
                            Swal.fire({ icon: 'success', title: 'Added!', text: data.message, showConfirmButton: false, timer: 1500, toast: true, position: 'top-end' });
                            document.querySelectorAll('.nav-link').forEach(link => { if(link.innerText.includes('CART')) link.innerText = `CART (${data.cart_count})`; });
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>