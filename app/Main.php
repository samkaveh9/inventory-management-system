<?php

class Main
{
    public function loadModel($model)
    {
        $modelData = __DIR__.DIRECTORY_SEPARATOR.'..'. DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.$model.'.php';
        if (file_exists($modelData)){
            require_once($modelData);
            return new $model();
        }else
            die('model not found..');
    }

    public function loadView($view ,array $data=null)
    {
        $viewPage = __DIR__.DIRECTORY_SEPARATOR.'..'. DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$view.'.php';
        $common = __DIR__.DIRECTORY_SEPARATOR.'..'. DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR;
        if (file_exists($viewPage)){
            require_once($common.'header.php');
            require_once($viewPage);
            require_once($common.'footer.php');
        }else
            die('view not found..');
    }
}