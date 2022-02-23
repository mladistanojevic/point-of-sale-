<?php

class Api extends Controller
{

    public function __construct()
    {
        $this->productModel = $this->model('Product');
        $this->saleModel = $this->model('Sale');
    }

    public function getAll()
    {
        $products = $this->productModel->getAll();
        if ($products) {
            //????
            foreach ($products as $key => $row) {
                $products[$key]['description'] = strtoupper($row['description']);
                $products[$key]['image'] = crop($row['image']);
            }
            echo json_encode($products);
        }
    }
    public function search()
    {
        if (count($_POST) > 0 && isset($_POST['search'])) {
            $search = trim($_POST['search']);

            $results = $this->productModel->search($search);

            if ($results) {
                foreach ($results as $key => $row) {
                    $results[$key]['description'] = strtoupper($row['description']);
                    $results[$key]['image'] = crop($row['image']);
                }
                echo json_encode($results);
            }
        }
    }

    public function cartItems()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['items'])) {
            $items = json_decode($_POST['items']);
            $user_id = $_SESSION['user']->user_id;
            $date = date('Y-m-d H:i:s');
            $recipt = recipt(9);


            foreach ($items as $item) {

                $this->saleModel->insertSale($item, $user_id, $date, $recipt);
            }
        }
    }
}
