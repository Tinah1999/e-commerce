<?php
// models/Product.php - Product Model

class Product {
    private $conn;
    private $table_name = "products";

    public $id;
    public $name;
    public $description;
    public $price;
    public $image; // Placeholder for image path/URL

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all products
    public function readAll() {
        $query = "SELECT id, name, description, price, image FROM " . $this->table_name . " ORDER BY name ASC";
        $result = $this->conn->query($query);
        return $result;
    }

    // Read single product by ID
    public function readOne() {
        $query = "SELECT id, name, description, price, image FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->price = $row['price'];
            $this->image = $row['image'];
            return true;
        }
        return false;
    }

    // You would add methods for create, update, delete products here
    // public function create() { ... }
    // public function update() { ... }
    // public function delete() { ... }
}

?>
