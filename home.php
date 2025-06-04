<?php

include_once "connect_db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIGb - Your One-Stop Shop</title> <link rel="stylesheet" href="index.css">
    
</head>
<body>
    <!-- Header -->
    <header>
        <a href="#" class="logo">BIG<span>b</span></a>
        
        <div class="search-bar">
            <input type="text" placeholder="Search for products...">
            <button>Search</button>
        </div>
        
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Special Offers</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </nav>
        
        <div class="user-actions">
            <a href="index.php" id="account-btn">Log Out</a>
            <a href="#" id="wishlist-btn">Wishlist</a>
            <a href="#" id="cart-btn">Cart <span class="count">0</span></a>
        </div>
    </header>
    
    <!-- Main Banner -->
    <section class="banner">
        <div class="banner-content">
            <h1>Welcome to <span>BIGb</span></h1>
            <p>Your one-stop shop for everything you need. Discover amazing deals and products across various categories.</p>
            <a href="#" class="btn">Shop Now</a>
        </div>
    </section>
    
    <!-- Main Content -->
    <div class="container">
        <!-- Categories Section -->
        <section>
            <h2 class="section-title">Browse Categories</h2>
            <div class="categories">
                <div class="category-card">
                    <div class="category-img">Electronics</div>
                    <div class="category-name">Electronics</div>
                </div>
                <div class="category-card">
                    <div class="category-img">Fashion</div>
                    <div class="category-name">Fashion</div>
                </div>
                <div class="category-card">
                    <div class="category-img">Home</div>
                    <div class="category-name">Home & Kitchen</div>
                </div>
                <div class="category-card">
                    <div class="category-img">Beauty</div>
                    <div class="category-name">Beauty</div>
                </div>
                <div class="category-card">
                    <div class="category-img">Sports</div>
                    <div class="category-name">Sports</div>
                </div>
            </div>
        </section>
        
        <!-- Special Offers Section -->
        <section>
            <h2 class="section-title">Special Offers</h2>
            <div class="special-offers">
                <div class="offer-card">
                    <div class="offer-content">
                        <div class="offer-title">Super Sale</div>
                        <div class="offer-subtitle">Up to 50% off on selected items</div>
                        <a href="#" class="btn btn-outline">Shop Now</a>
                    </div>
                </div>
                <div class="offer-card">
                    <div class="offer-content">
                        <div class="offer-title">New Arrivals</div>
                        <div class="offer-subtitle">Check out our latest products</div>
                        <a href="#" class="btn btn-outline">Explore</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Featured Products Section -->
        <section>
            <h2 class="section-title">Featured Products</h2>
            <div class="products">
                <div class="product-card">
                    <div class="product-img">Product Image</div>
                    <div class="product-info">
                        <div class="product-name">Wireless Headphones</div>
                        <div class="product-price">ugx1290.99</div>
                        <div class="product-rating">
                            <div class="rating-stars">★★★★☆</div>
                            <div>(42)</div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">Add to Cart</button>
                            <button class="wishlist">♡</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-img">Product Image</div>
                    <div class="product-info">
                        <div class="product-name">Smart Watch</div>
                        <div class="product-price">ugx1996.99</div>
                        <div class="product-rating">
                            <div class="rating-stars">★★★★★</div>
                            <div>(56)</div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">Add to Cart</button>
                            <button class="wishlist">♡</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-img">Product Image</div>
                    <div class="product-info">
                        <div class="product-name">Laptop Backpack</div>
                        <div class="product-price">ugx4900.99</div>
                        <div class="product-rating">
                            <div class="rating-stars">★★★★☆</div>
                            <div>(28)</div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">Add to Cart</button>
                            <button class="wishlist">♡</button>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-img">Product Image</div>
                    <div class="product-info">
                        <div class="product-name">Bluetooth Speaker</div>
                        <div class="product-price">ugx2279.99</div>
                        <div class="product-rating">
                            <div class="rating-stars">★★★★★</div>
                            <div>(37)</div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">Add to Cart</button>
                            <button class="wishlist">♡</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Features Section -->
        <section>
            <h2 class="section-title">Why Choose Us</h2>
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">🚚</div>
                    <div class="feature-title">Free Shipping</div>
                    <div class="feature-desc">On orders over $50</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">↩️</div>
                    <div class="feature-title">Easy Returns</div>
                    <div class="feature-desc">30-day return policy</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">🔒</div>
                    <div class="feature-title">Secure Checkout</div>
                    <div class="feature-desc">100% secure payment</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">💬</div>
                    <div class="feature-title">24/7 Support</div>
                    <div class="feature-desc">Chat with us anytime</div>
                </div>
            </div>
        </section>
    </div>
    
    <!-- Chat Widget -->
    <div class="chat-widget">
        💬
    </div>
    
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3 class="footer-title">About BIGb</h3>
                <p>BIGb is your one-stop shop for all your needs. We offer a wide range of products at competitive prices with excellent customer service.</p>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Special Offers</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Track Orders</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Customer Service</h3>
                <ul class="footer-links">
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Return Policy</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-section footer-contact">
                <h3 class="footer-title">Contact Us</h3>
                <p>Email: info@bigb.com</p>
                <p>Phone: +256 7820-37426</p>
                <p>Address: 123 Main St, Kabale City, Uganda</p>
                <div class="social-links">
                    <a href="www.facebook.com">FaceBook</a>
                    <a href="www.x.com">X</a>
                    <a href="www.instagram.com">InstaGram</a>
                    <a href="www.youtube.com">YouTube</a>
                </div>
            </div>
        </div>
        <div class="copyright">
            &copy; 2025 BIGb. All rights reserved.
        </div>
    </footer>
    <script src="home.js"></script>
</body>
</html>
