<?php

class ProductModel extends Model
{
    public $id;
    public $name;
    public $cost;

    public function addProduct() {
        if ($this->name != null && $this->cost != null) {
            $sql = "INSERT INTO product (name, cost) VALUES ('$this->name', $this->cost)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        }
    }

    public function getProductById($id){
        $sql = "SELECT
					id,
					name,
					cost
				FROM product
				WHERE product.id = $id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $product = new ProductModel();
        $product->name = $result["name"];
        $product->cost = $result["cost"];
        $product->id = $result["id"];
        return $product;
    }

    public function getProducts() {
        $sql = "SELECT
					id,
					name,
					cost
				FROM product
				";
        $result = array();
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }

        return $result;
    }

}
