<?php

class Sale
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT sales.sale_id,sales.barcode,sales.recipt_no,sales.description,sales.qty,sales.amount,sales.total,sales.date,users.username FROM sales JOIN users WHERE sales.user_id = users.user_id ORDER BY date;");
        $stmt->execute();
        $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sales;
    }

    public function insertSale($data, $user_id, $date, $recipt)
    {
        $stmt = $this->db->query("INSERT INTO sales (barcode,description,qty,amount,total,date,user_id,recipt_no) VALUES (:barcode,:description,:qty,:amount,:total,:date,:user_id,:recipt_no)");
        if ($stmt->execute(array(
            ':barcode' => $data->barcode,
            ':description' => $data->description,
            ':qty' => $data->qty,
            ':amount' => $data->amount,
            ':total' => $data->qty * $data->amount,
            ':date' => $date,
            ':user_id' => $user_id,
            ':recipt_no' => $recipt
        ))) {
            return true;
        } else {
            return false;
        }
    }
}
