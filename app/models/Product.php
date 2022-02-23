<?php

class Product
{

    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert($data)
    {
        $stmt = $this->db->query("INSERT INTO products (description,barcode,qty,amount,user_id,date,image) VALUES (:description,:barcode,:qty,:amount,:user_id,:date,:image)");
        if ($stmt->execute(array(
            ':description' => $data['description'],
            ':barcode' => $data['barcode'],
            ':qty' => $data['qty'],
            ':amount' => $data['amount'],
            ':user_id' => $data['user_id'],
            ':date' => $data['date'],
            ':image' => $data['image']
        ))) {
            return true;
        }

        return false;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY product_id DESC");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getProductById($id)
    {
        $stmt = $this->db->query("SELECT * FROM products WHERE product_id = :product_id");
        $stmt->execute(array(
            ':product_id' => $id
        ));
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function update($data)
    {
        $stmt = $this->db->query("UPDATE products SET description = :description, barcode = :barcode, qty = :qty, amount = :amount, image = :image WHERE product_id = :product_id");
        if ($stmt->execute(array(
            ':description' => $data['description'],
            ':barcode' => $data['barcode'],
            ':qty' => $data['qty'],
            ':amount' => $data['amount'],
            ':image' => $data['image'],
            ':product_id' => $data['product_id']
        ))) {
            return true;
        }

        return false;
    }

    public function delete($product_id)
    {
        $stmt = $this->db->query("DELETE FROM products WHERE product_id = :product_id");
        if ($stmt->execute(array(
            ':product_id' => $product_id
        ))) {
            return true;
        } else {
            return false;
        }
    }

    public function search($search)
    {
        $stmt = $this->db->query("SELECT * FROM products WHERE description LIKE '%$search%' ORDER BY product_id DESC LIMIT 10 OFFSET 0 ");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}
