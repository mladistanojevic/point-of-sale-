<?php

class Products extends Controller
{

    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }

    public function add()
    {

        $this->view('add');
    }
}
