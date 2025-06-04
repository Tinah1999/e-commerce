<?php
// controllers/CartController.php - Cart Controller

class CartController {
    public static function addToCart($product_id, $quantity = 1) {
        global $conn; // Access the global database connection

        if (!isset($product_id) || !is_numeric($product_id) || $quantity < 1) {
            // Invalid input
            $_SESSION['error_message'] = "Invalid product or quantity.";
            header("Location: " . $_SERVER['HTTP_REFERER'] ?? '/products'); // Redirect back
            exit();
        }

        $product = new Product($conn);
        $product->id = $product_id;

        if (!$product->readOne()) {
            // Product not found
            $_SESSION['error_message'] = "Product not found.";
            header("Location: " . $_SERVER['HTTP_REFERER'] ?? '/products');
            exit();
        }

        // Initialize cart in session if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if product already in cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity
            ];
        }

        $_SESSION['success_message'] = "Product added to cart!";
        header("Location: /cart"); // Redirect to cart page
        exit();
    }

    public static function removeFromCart($product_id) {
        if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
            $_SESSION['success_message'] = "Product removed from cart.";
        } else {
            $_SESSION['error_message'] = "Product not found in cart.";
        }
        header("Location: /cart"); // Redirect to cart page
        exit();
    }

    public static function showCart() {
        // Get cart items from session
        $cart_items = $_SESSION['cart'] ?? [];
        include __DIR__ . '/../views/cart.php';
    }

    public static function getCartTotal() {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
}

?>
