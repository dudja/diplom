<?php
include "ProductModel.php";

class OrderModel extends Model
{
    public $id;
    public $total;
    public $products_id;
    public $products_quantity;
    public $customers_first_name;
    public $customers_last_name;
    public $customers_company_name;

    public function addOrder() {
        // start transaction
        $this->db->beginTransaction();
            $sql = "INSERT INTO `customer` (first_name, last_name, company_name ) VALUES ('$this->customers_first_name', '$this->customers_last_name','$this->customers_company_name' )";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $customer_id = $this->db->lastInsertId();
            $total = $this->getTotal();

            $sql = "INSERT INTO `order` (customer_id,total ) VALUES ('$customer_id','$total')";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $order_id = $this->db->lastInsertId();

            for ($i=0;$i<count($this->products_id);$i++){
                $product_id = $this->products_id[$i];
                $product_qu = $this->products_quantity[$i];
                $sql = "INSERT INTO `order_product` (order_id,product_id,quantity) VALUES ('$order_id', '$product_id', '$product_qu')";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
            }
        $this->db->commit();

        // end transaction
    }

    private function getTotal() {
        $total = 0;
        $product = new ProductModel();
        for ($i=0;$i<count($this->products_id);$i++){
            $total += $this->products_quantity[$i] * $product->getProductById($this->products_id[$i])->cost;
        }
        return $total;
    }

    public function getOrders() {
        $sql = "SELECT customer.first_name as customers_first_name, 
            customer.last_name as customers_last_name, 
            customer.company_name as customers_company_name, 
            `total` as total,
             `date_creating` as date_creating
            FROM `order` 
            LEFT JOIN `customer` ON customer.id = order.customer_id";
        $result = array();
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       //     $result[$row['id']] = $row; // где то еще видел - убери
            $result[] = $row; // correct
        }
        return $result;
    }

}
