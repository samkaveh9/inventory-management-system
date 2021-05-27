<?php

class Product extends Main
{
    private $message;

    public function index()
    {
        if (!isset($_SESSION['name']))
            header("Location:" . ROOT_PATH);
        else {
            $result = $this->loadModel('products');
            $products = $result->all();
            $this->loadView('product/index', [
                'title' => 'بخش محصولات',
                'products' => $products,
                'message' => $this->message
            ]);
        }
    }

    public function create()
    {
        $newproduct = $this->loadModel('products');
        $result = $this->loadModel('repositories');
        $repositories = $result->all();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['btn'])) {
                if (empty($_POST["title"])) {
                    $this->message = "فیلد عنوان محصول الزامیست";
                } else {
                    $title = htmlentities($_POST['title']);
                }
                if (empty($_POST["content"])) {
                    $this->message = "فیلد توضیحات محصول الزامیست";
                } else {
                    $content = htmlentities($_POST['content']);
                }
                if ($_POST['title'] and $_POST['content']) {
                    if ($newproduct->store($title, $content)) {
                        $this->message = "محصول جدید با موفقیت اضافه شد";
                    } else
                        $this->message = "مشکلی رخ داده . دوباره تلاش کنید!!";
                }
            }
        }

        $this->loadView('product/create', [
            'title' => 'افزودن محصول جدید',
            'repositories' => $repositories,
            'message' => $this->message
        ]);
    }


    public function edit($id)
    {

        $result = $this->loadModel('products');
        $editProduct = $result->edit($id);
        if ($editProduct) {
            $this->loadView('product/edit', [
                'title' => 'ویرایش محصول',
                'product' => $editProduct,
                'message' => $this->message
            ]);
        } else
            $this->message = "مشکلی رخ داده";
    }

    public function update($id)
    {
        $product = $this->loadModel('products');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['btn'])) {
                if (empty($_POST["title"])) {
                    $this->message = "فیلد نام محصول الزامیست";
                }
                if (empty($_POST["content"])) {
                    $this->message = "فیلد موقعیت محصول الزامیست";
                }
                if ($_POST['title'] and $_POST['content']) {
                    if ($product->update($id)) {
                        header('location:' . ROOT_PATH . 'product');
                    } else
                        $this->message = "مشکلی رخ داده . دوباره تلاش کنید!!";
                }
            }
        }
    }

    public function delete($id)
    {
        $result = $this->loadModel('products');
        $deleteProduct = $result->delete($id);
        if ($deleteProduct) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else
            $this->message = "مشکلی رخ داده";
    }

    public function report()
    {
        if (!isset($_SESSION['name']))
            header("Location:" . ROOT_PATH);
        else {
            $this->loadView('product/report', [
                'title' => 'بخش گزارش محصولات',
                'products' => $this->reports(),
                'message' => $this->message
            ]);
        }
    }

    public function statistics()
    {
        if (!isset($_SESSION['name']))
            header("Location:" . ROOT_PATH);
        else {
            $result = $this->loadModel('products');
            $products = $result->statistics();
            $this->loadView('product/statistics', [
                'title' => 'بخش محصولات',
                'products' => $products,
                'message' => $this->message
            ]);
        }
    }

    public function reports()
    {
        $result = $this->loadModel('products');
        $reports = $result->report();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['btn'])) {
                if ($reports)
                    return $reports;
                else
                    return false;
            }
        }
    }
}
