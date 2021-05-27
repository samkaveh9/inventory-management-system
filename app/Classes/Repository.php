<?php

class Repository extends Main
{
    private $message;

    public function index()
    {
        if (!isset($_SESSION['name']))
            header("Location:" . ROOT_PATH);
        else {
            $result = $this->loadModel('repositories');
            $repositories = $result->all();
            $this->loadView('repository/index', [
                'title' => 'بخش انبار ها',
                'repositories' => $repositories,
                'message' => $this->message
            ]);
        }
    }

    public function create()
    {
        $newRepository = $this->loadModel('repositories');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['btn'])) {
                if (empty($_POST["name"])) {
                    $this->message = "فیلد نام انبار الزامیست";
                } else {
                    $name = htmlentities($_POST['name']);
                }
                if (empty($_POST["location"])) {
                    $this->message = "فیلد موقعیت انبار الزامیست";
                } else {
                    $location = htmlentities($_POST['location']);
                }
                if ($_POST['name'] and $_POST['location']) {
                    if ($newRepository->store($name, $location))
                        $this->message = "انبار جدید با موفقیت اضافه شد";
                    else
                        $this->message = "مشکلی رخ داده . دوباره تلاش کنید!!";
                }
            }
        }

        $this->loadView('repository/create', [
            'title' => 'افزودن انبار',
            'message' => $this->message
        ]);
    }

    public function edit($id)
    {
        $result = $this->loadModel('repositories');
        $editRepository = $result->edit($id);
        if ($editRepository) {
            $this->loadView('repository/edit', [
                'title' => 'ویرایش انبار',
                'repository' => $editRepository,
                'message' => $this->message
            ]);
        } else
            $this->message = "مشکلی رخ داده";
    }

    public function update($id)
    {
        $repository = $this->loadModel('repositories');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['btn'])) {
                if (empty($_POST["name"])) {
                    $this->message = "فیلد نام انبار الزامیست";
                }
                if (empty($_POST["location"])) {
                    $this->message = "فیلد موقعیت انبار الزامیست";
                }
                if ($_POST['name'] and $_POST['location']) {
                    if ($repository->update($id)) {
                        header('location:' . ROOT_PATH . 'repository');
                    } else
                        $this->message = "مشکلی رخ داده . دوباره تلاش کنید!!";
                }
            }
        }
    }


    public function delete($id)
    {
        $result = $this->loadModel('repositories');
        $deleteRepository = $result->delete($id);
        if ($deleteRepository) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else
            $this->message = "مشکلی رخ داده";
    }
}
