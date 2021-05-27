<?php

class Router
{
    private $class, $method, $params, $url, $object;

    public function __construct()
    {
        $this->setUrl();
        $this->setClass();
        $this->setMethod();
        $this->setParams();
        
        $class_exist = __DIR__.DIRECTORY_SEPARATOR.'Classes'.DIRECTORY_SEPARATOR.$this->class.'.php';
        if ($class_exist) {
            require_once($class_exist);
            $this->object = new $this->class;
            if (method_exists($this->object, $this->method)) {
                call_user_func_array(array($this->object, $this->method), $this->params);
            }
        }
    }

    public function setUrl()
    {
        if (isset($_GET['url']))
            $this->url = rtrim($_GET['url'], '/');
        else
            $this->url = 'login/index';
        return $this->url;
    }

    public function setClass()
    {
        $this->class = explode('/', $this->url)[0];
        return $this->class;
    }

    public function setMethod()
    {
        if (isset(explode('/', $this->url)[1])) {
            $this->method = explode('/', $this->url)[1];
        } else {
            $this->method = "index";
        }
        return $this->method;
    }

    public function setParams()
    {
        $this->params = array_slice(explode('/', $this->url), 2);
        return $this->params;
    }
}
