<?php
class Request
{
    public $method;

    public function __construct()
    {
        $this->method = $_SERVER["REQUEST_METHOD"];
        return $this;
    }

    public function json($array = array())
    {
        header("Content-Type:application/json");
        return json_encode($array);
    }

    public function error($message)
    {
        return [
            "title" => "Erro",
            "error" => true,
            "message" => $message,
            "type" => "error"
        ];
    }

    public function success($message)
    {
        return [
            "title" => "Sucesso",
            "success" => true,
            "message" => $message,
            "type" => "success"
        ];
    }

    public function redirect($route) {
        return header("Location: $route");
    }

    public function body($index = false) {
        $body = "";
        if(!empty($_POST))
        $body = (object) ($index ? $_POST[$index] : $_POST);
        elseif (!empty(file_get_contents("php://input"))) {
            $body = json_decode(file_get_contents("php://input"));
        }
        $body->class = "Request";
        $body->date = date("d/m/Y H:i:s");
        return $body;
    }
}
