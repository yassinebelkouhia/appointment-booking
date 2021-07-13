<?php


class Login extends Controller
{

    public function __construct()
    {
        $this->log = $this->model("loginM");
    }



    public function checkRef()
    {
        $data = json_decode(file_get_contents("php://input"));



        if ($this->log->chechRef($data) > 0) {
            echo json_encode("logged");
        } else {
            echo json_encode(['invalid email or password']);
        }
    }
}
