<?php

class Admin extends Controller
{

    public function __construct()
    {
        $this->productModel = $this->model('Product');
        $this->userModel = $this->model('User');
        $this->saleModel = $this->model('Sale');
    }

    public function index()
    {
        $tab = 'dashboard';
        $data = [
            'tab' => $tab
        ];
        $this->view('admin/index', $data);
    }

    public function products()
    {
        $tab = 'products';
        $products = $this->productModel->getAll();
        $data = [
            'tab' => $tab,
            'products' => $products
        ];
        $this->view('admin/index', $data);
    }

    public function users()
    {
        $tab = 'users';
        $users = $this->userModel->getAll($_SESSION['user']->user_id);
        $data = [
            'tab' => $tab,
            'users' => $users
        ];

        $this->view('admin/index', $data);
    }

    public function sales()
    {
        $tab = 'sales';
        $sales = $this->saleModel->getAll();
        $data = [
            'tab' => $tab,
            'sales' => $sales
        ];

        $this->view('admin/index', $data);
    }

    public function add()
    {

        if (!isLogged()) {
            header('location:' . URLROOT . '/login');
        }

        $data = [
            'descriptionError' => '',
            'barcodeError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data = [
                'description' => trim($_POST['description']),
                'barcode' => trim($_POST['barcode']),
                'qty' => trim($_POST['qty']),
                'amount' => trim($_POST['amount']),
                'user_id' => $_SESSION['user']->user_id,
                'image' => '',
                'date' => date('Y-m-d H:i:s'),
                'descriptionError' => '',
                'barcodeError' => ''
            ];


            //Validate description
            if (empty($data['description'])) {
                $data['descriptionError'] = "Describe product";
            }

            //Validate barcode
            if (empty($data['barcode'])) {
                $data['barcodeError'] = "Please add barcode for this product";
            }


            if (empty($data['descriptionError']) && empty($data['barcodeError'])) {
                $allowed[] = 'image/jpeg';
                $allowed[] = 'image/png';
                $allowed[] = 'image/jpg';
                //Check for files
                if (count($_FILES) > 0) {
                    if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {
                        $folder = 'uploads/';
                        if (!file_exists($folder)) {
                            mkdir($folder, 0777, true);
                        }
                        $destination = $folder . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                        $data['image'] = $destination;
                    }
                }

                if ($this->productModel->insert($data)) {
                    header('location:' . URLROOT . '/admin/products');
                } else {
                    die('Something went wrong!');
                }
            }
        }

        $this->view('admin/product-add', $data);
    }

    public function edit($product_id)
    {

        if (!isLogged()) {
            header('location:' . URLROOT . '/login');
        }

        $row = $this->productModel->getProductById($product_id);
        $data = [
            'row' => $row,
            'descriptionError' => '',
            'barcodeError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'row' => $row,
                'description' => trim($_POST['description']),
                'barcode' => trim($_POST['barcode']),
                'qty' => trim($_POST['qty']),
                'amount' => trim($_POST['amount']),
                'image' => $row['image'],
                'user_id' => $_SESSION['user']->user_id,
                'product_id' => $product_id,
                'descriptionError' => '',
                'barcodeError' => ''
            ];

            //Validate description
            if (empty($data['description'])) {
                $data['descriptionError'] = "Enter description for this product!";
            }

            //Validate barcode
            if (empty($data['barcode'])) {
                $data['barcodeError'] = "Barcode is required!";
            }

            if (empty($data['descriptionError']) && empty($data['barcodeError'])) {
                $allowed[] = 'image/jpeg';
                $allowed[] = 'image/png';
                $allowed[] = 'image/jpg';
                //Check for files
                if (count($_FILES) > 0) {
                    if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {
                        $folder = 'uploads/';
                        if (!file_exists($folder)) {
                            mkdir($folder, 0777, true);
                        }
                        $destination = $folder . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                        $data['image'] = $destination;
                    }
                }

                if ($this->productModel->update($data)) {
                    header('location:' . URLROOT . '/admin/products');
                } else {
                    die('Something went wrong!');
                }
            }
        }

        $this->view('admin/product-edit', $data);
    }

    public function delete($product_id)
    {
        if (!isLogged()) {
            header('location:' . URLROOT . '/login');
        }

        $product = $this->productModel->getProductById($product_id);

        if (!$product) {
            header('location:' . URLROOT . '/admin/products');
        }

        if ($this->productModel->delete($product['product_id'])) {
            header('location:' . URLROOT . '/admin/products');
        } else {
            die('Something went wrong!');
        }
    }
}
