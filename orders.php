<?php
// models/Order.php - Order Model (Placeholder)

class Order {
    private $conn;
    private $table_name = "orders";

    public $id;
    public $user_id;
    public $order_date;
    public $total_amount;
    public $status; // e.g., pending, completed, cancelled

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new order (simplified)
    public function create($user_id, $total_amount, $cart_items) {
        // Start a transaction for atomicity
        $this->conn->begin_transaction();

        try {
            // Insert into orders table
            $query_order = "INSERT INTO " . $this->table_name . " (user_id, total_amount, status) VALUES (?, ?, 'pending')";
            $stmt_order = $this->conn->prepare($query_order);
            $stmt_order->bind_param("id", $user_id, $total_amount);

            if (!$stmt_order->execute()) {
                throw new Exception("Error creating order.");
            }

            $order_id = $this->conn->insert_id;

            // Insert into order_items table (assuming you have one)
            // This part is crucial for linking products to the order
            $query_order_item = "INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (?, ?, ?, ?)";
            $stmt_order_item = $this->conn->prepare($query_order_item);

            foreach ($cart_items as $item) {
                // Assuming $item has product_id, quantity, and price
                $stmt_order_item->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
                if (!$stmt_order_item->execute()) {
                    throw new Exception("Error adding order item.");
                }
            }

            $this->conn->commit();
            return $order_id;

        } catch (Exception $e) {
            $this->conn->rollback();
            error_log("Order creation failed: " . $e->getMessage());
            return false;
        }
    }

    // You would add methods to read user orders, update order status, etc.
}

?>
