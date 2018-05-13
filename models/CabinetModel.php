<?php

class CabinetModel extends Model
{
    public $login;
    public $password;

    public function checkUser()
    {

        $sql = "SELECT * FROM user WHERE login = :login AND password = :password";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $this->login, PDO::PARAM_STR);
        $stmt->bindValue(":password", $this->password, PDO::PARAM_STR);
        $stmt->execute();

        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($resultat)) {
            return true;
        } else {
            return false;
        }

    }

    public function getOrdersCount() {
        $sql = "SELECT COUNT(*) FROM `order`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res != null? $res : 0;
    }


    public function getProductsCount() {
        $sql = "SELECT COUNT(*) FROM product";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res != null? $res : 0;
    }

    public function getCustomersCount() {
        $sql = "SELECT COUNT(*) FROM customer";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchColumn();
        return $res != null? $res : 0;
    }

    public function getOrders() {
        $sql = "SELECT
					order.id as id,
					order.total as total,
					customer.id,
					customer.name
				FROM order
				LEFT JOIN customer ON customer.id = customer.name
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
